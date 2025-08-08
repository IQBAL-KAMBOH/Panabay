<?php

namespace App\Http\Controllers\Shop\Payment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Webkul\Checkout\Facades\Cart;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Controller;
use Webkul\Sales\Repositories\OrderRepository;
use Webkul\Checkout\Models\Cart as CartModel;
use Webkul\Sales\Repositories\InvoiceRepository;
use Webkul\Sales\Transformers\OrderResource;

class KoraPayController extends Controller
{
    protected $orderRepository;
    protected $invoiceRepository;
    protected $apiBaseUrl = 'https://api.korapay.com/merchant/api/v1';

    public function __construct(
        OrderRepository $orderRepository,
        InvoiceRepository $invoiceRepository
    ) {
        $this->orderRepository = $orderRepository;
        $this->invoiceRepository = $invoiceRepository;
    }

    /**
     * Initialize payment
     */
    public function redirect($method = 'mobile')
    {
        $cart = Cart::getCart();
        $secretKey = core()->getConfigData('sales.payment_methods.korapay.secret_key');

        if (!$secretKey) {
            session()->flash('error', 'Payment configuration error. Please contact support.');
            return redirect()->route('shop.checkout.cart.index');
        }

        $reference = 'KPAY-' . uniqid();
        session()->put('korapay_cart_id', $cart->id);

        try {
            $params = [
                'amount' => (float) $cart->grand_total,
                'currency' => core()->getConfigData('sales.payment_methods.korapay.currency') ?? 'GHS',
                'reference' => $reference,
                'notification_url' => route('korapay.webhook'),
                'redirect_url' => route('korapay.callback'),
                'customer' => [
                    'email' => $cart->billing_address->email,
                    'name' => $cart->billing_address->first_name . ' ' . $cart->billing_address->last_name,
                ],
                'merchant_bears_cost' => (bool) (core()->getConfigData('sales.payment_methods.korapay.merchant_bears_cost') ?? false),
                'metadata' => [
                    'cart_id' => $cart->id,
                    'customer_id' => $cart->customer_id,
                ]
            ];

            // Add payment method specific parameters
            // if ($method === 'card') {
            //     $params['payment_channels'] = ['card'];
            // }

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $secretKey,
                'Content-Type' => 'application/json',
            ])->withOptions([
                'curl' => [
                    CURLOPT_SSLVERSION => CURL_SSLVERSION_TLSv1_2
                ]
            ])->post($this->apiBaseUrl . '/charges/initialize', $params);

            $responseData = $response->json();

            if ($response->successful() && $responseData['status'] === true) {
                session()->put('korapay_transaction_reference', $responseData['data']['reference']);
                return redirect()->to($responseData['data']['checkout_url']);
            }

            $error = $responseData['message'] ?? 'Payment initialization failed';
            session()->flash('error', $error);
            return redirect()->route('shop.checkout.cart.index');
        } catch (\Exception $e) {
            Log::error("KoraPay  Error: " . $e->getMessage());
            session()->flash('error', 'Payment processing error. Please try again.');
            return redirect()->route('shop.checkout.cart.index');
        }
    }

     private function getTransaction($reference)
    {
        $secretKey = core()->getConfigData('sales.payment_methods.korapay.secret_key');

        $maxRetries = 3;
        $retryDelay = 1000; // milliseconds

        for ($attempt = 1; $attempt <= $maxRetries; $attempt++) {
            try {
                $response = Http::withHeaders([
                    'Authorization' => 'Bearer ' . $secretKey,
                ])->withOptions([
                    'curl' => [
                        CURLOPT_SSLVERSION => CURL_SSLVERSION_TLSv1_2,
                        CURLOPT_TIMEOUT => 30,
                    ],
                    'verify' => true, // Ensure SSL verification is enabled
                ])->get($this->apiBaseUrl . '/charges/' . $reference);

                $responseData = $response->json();

                if ($response->successful() && isset($responseData['status'])) {
                    return $responseData['status'] === true
                        ? $responseData['data']
                        : null;
                }

            } catch (\Exception $e) {
                Log::warning("KoraPay Transaction Fetch Attempt {$attempt}/{$maxRetries} failed: " . $e->getMessage());

                // If it's the last attempt, log the full error
                if ($attempt === $maxRetries) {
                    Log::error('KoraPay Transaction Fetch Error: ' . $e->getMessage());
                    return null;
                }

                // Wait before retrying (in microseconds)
                usleep($retryDelay * 1000);
                $retryDelay *= 2; // Exponential backoff
            }
        }

        return null;
    }

    /**
     * Handle payment callback with fallback to webhook data
     */
    public function callback(Request $request)
    {
        $reference = $request->query('reference') ?? session()->get('korapay_transaction_reference');
        $cartId = session()->get('korapay_cart_id');

        if (!$reference || !$cartId) {
            session()->flash('error', 'Invalid payment session. Please restart checkout.');
            return redirect()->route('shop.checkout.cart.index');
        }

        // First check if order exists (webhook might have created it)
        if ($order = $this->orderRepository->findOneByField('cart_id', $cartId)) {
            Cart::deActivateCart($cartId);
            session()->forget(['korapay_transaction_reference', 'korapay_cart_id']);
            return redirect()->route('shop.checkout.onepage.success');
        }

        try {
            // Try to get transaction details
            $transaction = $this->getTransaction($reference);

            if ($transaction && $transaction['status'] === 'success') {
                $this->processSuccessfulPayment($transaction);
                Cart::deActivateCart($cartId);
                session()->forget(['korapay_transaction_reference', 'korapay_cart_id']);
                return redirect()->route('shop.checkout.onepage.success');
            }

            // If we couldn't verify but have a reference, show pending status
            if ($reference) {
                session()->flash('info', 'Your payment is being processed. We\'ll notify you when completed.');
                return redirect()->route('shop.checkout.onepage.success');
            }

            session()->flash('error', 'Payment not confirmed. Please check your payment status.');
            return redirect()->route('shop.checkout.cart.index');

        } catch (\Exception $e) {
            Log::error('KoraPay Callback Error: ' . $e->getMessage());
            session()->flash('error', 'Payment verification failed. Contact support for assistance.');
            return redirect()->route('shop.checkout.cart.index');
        }
    }

    /**
     * Handle payment webhooks
     */
    public function webhook(Request $request)
    {
        // Validate webhook signature
        $signature = $request->header('x-korapay-signature');
        $computedSignature = hash_hmac(
            'sha256',
            $request->getContent(),
            core()->getConfigData('sales.payment_methods.korapay.webhook_secret')
        );

        if (!hash_equals($signature, $computedSignature)) {
            Log::error('KoraPay Webhook: Invalid signature');
            return response()->json(['status' => 'invalid signature'], 401);
        }

        $event = $request->json()->all();
        if ($event['event'] === 'charge.success') {
            $this->processSuccessfulPayment($event['data']);
        }

        return response()->json(['status' => 'success']);
    }


    /**
     * Process successful payments with locking mechanism
     */
    private function processSuccessfulPayment($transaction)
    {
        $cartId = $transaction['metadata']['cart_id'] ?? null;

        if (!$cartId) {
            Log::error('KoraPay Webhook: Missing cart ID', $transaction);
            return;
        }

        // Create a lock for this cart ID to prevent duplicate processing
        $lock = Cache::lock('kora_order_' . $cartId, 10);

        try {
            if ($lock->get()) {
                // Check if order already exists
                if ($this->orderRepository->findOneByField('cart_id', $cartId)) {
                    Log::info("KoraPay: Order already exists for cart {$cartId}");
                    return;
                }

                $cart = CartModel::find($cartId);
                if (!$cart) {
                    Log::error("KoraPay Webhook: Cart not found - {$cartId}");
                    return;
                }

                // Create order data
                $orderData = (new OrderResource($cart))->jsonSerialize();

                // Add payment information
                $orderData['payment'] = [
                    'method' => 'korapay',
                    'additional' => [
                        'transaction_reference' => $transaction['reference'],
                        'amount' => $transaction['amount'],
                        'currency' => $transaction['currency'],
                    ]
                ];

                // Create the order
                $order = $this->orderRepository->create($orderData);
                Log::info("KoraPay: Order created for cart {$cartId}");

                // Create and pay invoice
                $this->createPaidInvoice($order, $transaction['reference']);

            }
        } catch (\Exception $e) {
            Log::error("KoraPay Order Error - Cart {$cartId}: " . $e->getMessage());
        } finally {
            optional($lock)->release();
        }
    }

    /**
     * Create and pay invoice for the order
     */
    protected function createPaidInvoice($order, $transactionId)
    {
        if (!$order->canInvoice()) {
            Log::warning("KoraPay: Cannot create invoice for order {$order->id}");
            return;
        }

        try {
            // Prepare invoice data with items
            $invoiceData = $this->prepareInvoiceData($order);

            // Add the transaction ID to the main invoice data array
            $invoiceData['transaction_id'] = $transactionId;

            // Create the invoice with items and transaction ID
            $invoice = $this->invoiceRepository->create($invoiceData);

            // Set state to paid as the payment is already confirmed by KoraPay
            $invoice->state = 'paid';
            $invoice->save();

            // Update order status to processing
            $this->orderRepository->updateOrderStatus($order, 'processing');

            Log::info("KoraPay: Invoice created (ID: {$invoice->id}) and paid for order {$order->id}");

        } catch (\Exception $e) {
            Log::error("KoraPay Invoice Error - Order {$order->id}: " . $e->getMessage());
        }
    }

    /**
     * Prepares order's invoice data for creation.
     *
     * @param  \Webkul\Sales\Models\Order  $order
     * @return array
     */
    protected function prepareInvoiceData($order)
    {
        $invoiceData = ['order_id' => $order->id];

        foreach ($order->items as $item) {
            if ($item->qty_to_invoice > 0) {
                $invoiceData['invoice']['items'][$item->id] = $item->qty_to_invoice;
            }
        }

        return $invoiceData;
    }
}