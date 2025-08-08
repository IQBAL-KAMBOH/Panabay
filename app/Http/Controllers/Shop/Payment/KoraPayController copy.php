<?php

namespace App\Http\Controllers\Shop\Payment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Webkul\Checkout\Facades\Cart;
use App\Http\Controllers\Controller;
use Webkul\Sales\Repositories\OrderRepository;
use Webkul\Checkout\Models\Cart as CartModel;

class KoraPayController extends Controller
{
    /**
     * OrderRepository instance
     *
     * @var \Webkul\Sales\Repositories\OrderRepository
     */
    protected $orderRepository;

    /**
     * KoraPay API base URL.
     *
     * @var string
     */
    protected $apiBaseUrl = 'https://api.korapay.com/merchant/api/v1';

    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\Sales\Repositories\OrderRepository  $orderRepository
     * @return void
     */
    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    /**
     * Redirects to the KoraPay mobile money initiation process.
     *
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    // In App\Http\Controllers\Shop\Payment\KoraPayController.php

    public function redirect()
    {
        $cart = Cart::getCart();
        $secretKey = core()->getConfigData('sales.payment_methods.korapay.secret_key');

        if (!$secretKey) {
            session()->flash('error', 'KoraPay credentials are not configured. Please contact support.');
            return redirect()->route('shop.checkout.cart.index');
        }

        $reference = 'KPAY-' . uniqid();
        session()->put('korapay_cart_id', $cart->id);

        try {
            $params = [
                'amount' => (float) $cart->grand_total,
                'currency' => core()->getConfigData('sales.payment_methods.korapay.currency') ?? 'GHS',
                'reference' => $reference,
                'description' => 'Payment for Cart #' . $cart->id,
                'notification_url' => route('korapay.webhook'),
                'redirect_url' => route('korapay.callback'),
                'customer' => [
                    'email' => $cart->billing_address->email,
                    'name' => $cart->billing_address->first_name . ' ' . $cart->billing_address->last_name,
                ],
                'merchant_bears_cost' => (bool) (core()->getConfigData('sales.payment_methods.korapay.merchant_bears_cost') ?? false),
                'mobile_money' => [
                    'number' => '254700000000'
                ],
                'metadata' => [
                    'cart_id' => $cart->id,
                    'customer_id' => $cart->customer_id,
                ]
            ];

            // **DEBUGGING STEP: Log the parameters being sent**
            Log::info('KoraPay Payment Request:', $params);

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $secretKey,
                'Content-Type' => 'application/json',
            ])->post($this->apiBaseUrl . '/charges/mobile-money', $params);

            $responseData = $response->json();

            // **DEBUGGING STEP: Log the full response from KoraPay**
            Log::info('KoraPay Payment Response:', [
                'status_code' => $response->status(),
                'body' => $responseData
            ]);

            if ($response->successful() && isset($responseData['status']) && $responseData['status'] === true) {
                $transactionData = $responseData['data'];
                session()->put('korapay_transaction_reference', $transactionData['transaction_reference']);

                return view('shop::checkout.onepage.korapay-mobile', [
                    'transaction' => $transactionData
                ]);
            }

            // Provide a more specific error message if available
            $error = $responseData['message'] ?? 'Failed to initialize KoraPay payment. Please check the logs for more details.';
            session()->flash('error', $error);
            return redirect()->route('shop.checkout.cart.index');
        } catch (\Exception $e) {
            Log::error('KoraPay Exception: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);
            session()->flash('error', 'Payment error: ' . $e->getMessage());
            return redirect()->route('shop.checkout.cart.index');
        }
    }

    /**
     * Authorize a payment using an OTP.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */

    // In App\Http\Controllers\Shop\Payment\KoraPayController.php

    /**
     * Redirects the user to KoraPay's hosted page for card payment.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirectCard()
    {
        $cart = Cart::getCart();
        $secretKey = core()->getConfigData('sales.payment_methods.korapay.secret_key');

        if (!$secretKey) {
            session()->flash('error', 'KoraPay credentials are not configured. Please contact support.');
            return redirect()->route('shop.checkout.cart.index');
        }

        $reference = 'KPAY-' . uniqid();

        // Store reference and cart_id for verification in callback/webhook
        session()->put('korapay_reference', $reference);
        session()->put('korapay_cart_id', $cart->id);

        try {
            // NOTE: The endpoint for initializing a charge that provides a redirect URL might be different.
            // I am assuming a common endpoint like '/charges/initialize'.
            // **Please verify this endpoint from the KoraPay Card API documentation.**
            // A common payload for card payments:
            $params = [
                'amount'          => (float) $cart->grand_total,
                'currency'        => core()->getConfigData('sales.payment_methods.korapay.currency') ?? 'GHS',
                'reference'       => $reference,
                'narration'       => 'Payment for Cart #' . $cart->id, // 'narration' is often used instead of 'description'
                'redirect_url'    => route('korapay.callback'),
                'notification_url' => route('korapay.webhook'),
                'customer'        => [
                    'email' => $cart->billing_address->email,
                    'name'  => $cart->billing_address->first_name . ' ' . $cart->billing_address->last_name,
                ],
                // This key tells KoraPay to include 'card' as a payment option on the hosted page.
                // The exact key name might be 'channels' or 'payment_methods'. Please check docs.
                'payment_channels' => ['card'],
                'metadata' => [
                    'cart_id'     => $cart->id,
                    'customer_id' => $cart->customer_id,
                ]
            ];

            Log::info('KoraPay Card Payment Request:', $params);

            // **IMPORTANT**: Use the correct endpoint for initiating a transaction that returns a checkout URL.
            // This is a likely candidate, but you must confirm from the docs.
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $secretKey,
                'Content-Type'  => 'application/json',
            ])->post($this->apiBaseUrl . '/charges/initialize', $params);

            $responseData = $response->json();
            Log::info('KoraPay Card Payment Response:', ['status' => $response->status(), 'body' => $responseData]);

            // A successful response for card payments will contain a redirect URL.
            if ($response->successful() && isset($responseData['data']['checkout_url'])) {
                // Store the transaction reference from KoraPay for later verification
                session()->put('korapay_transaction_reference', $responseData['data']['transaction_reference']);

                // Redirect the user to the secure payment page
                return redirect()->away($responseData['data']['checkout_url']);
            }

            $error = $responseData['message'] ?? 'Failed to initialize KoraPay card payment.';
            session()->flash('error', $error);
            return redirect()->route('shop.checkout.cart.index');
        } catch (\Exception $e) {
            Log::error('KoraPay Card Initialization Exception: ' . $e->getMessage());
            session()->flash('error', 'An unexpected error occurred. Please contact support.');
            return redirect()->route('shop.checkout.cart.index');
        }
    }
    public function authorizePayment(Request $request)
    {
        $request->validate(['token' => 'required|string|min:4']);

        $secretKey = core()->getConfigData('sales.payment_methods.korapay.secret_key');
        $transactionReference = session()->get('korapay_transaction_reference');

        if (!$transactionReference) {
            return response()->json(['status' => 'error', 'message' => 'Session expired. Please start over.'], 400);
        }

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $secretKey,
            'Content-Type' => 'application/json',
        ])->post($this->apiBaseUrl . '/charges/mobile-money/authorize', [
            'reference' => $transactionReference,
            'token' => $request->token,
        ]);

        $responseData = $response->json();

        if ($response->successful() && isset($responseData['status']) && $responseData['status'] === true) {
            return response()->json([
                'status'  => 'success',
                'message' => $responseData['message'],
                'data'    => $responseData['data'],
            ]);
        }

        return response()->json([
            'status'  => 'error',
            'message' => $responseData['message'] ?? 'Invalid OTP or an error occurred.',
        ], $response->status());
    }

    /**
     * Handles the redirect from KoraPay after a payment attempt.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function callback(Request $request)
    {
        $reference = $request->query('reference') ?? session()->get('korapay_transaction_reference');

        if (!$reference) {
            session()->flash('error', 'Payment reference not found. Unable to verify status.');
            return redirect()->route('shop.checkout.cart.index');
        }

        try {
            if ($this->verifyPayment($reference)) {
                // The order is created by the webhook. Here, we just confirm to the user.
                // We find the cart and deactivate it to prevent re-use.
                $cartId = session()->get('korapay_cart_id');
                if ($cartId) {
                    Cart::deActivateCart($cartId);
                }

                // Clear session data
                session()->forget(['korapay_transaction_reference', 'korapay_cart_id']);

                return redirect()->route('shop.checkout.onepage.success');
            }

            session()->flash('error', 'KoraPay payment failed or was cancelled.');
            return redirect()->route('shop.checkout.cart.index');
        } catch (\Exception $e) {
            Log::error('KoraPay Callback Verification Error: ' . $e->getMessage());
            session()->flash('error', 'An error occurred while verifying your payment. Please contact support.');
            return redirect()->route('shop.checkout.cart.index');
        }
    }

    /**
     * Handles incoming webhooks from KoraPay.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function webhook(Request $request)
    {
        $payload = $request->getContent();
        $signature = $request->header('x-korapay-signature');
        $webhookSecret = core()->getConfigData('sales.payment_methods.korapay.webhook_secret'); // It's better to use a dedicated webhook secret

        $computedSignature = hash_hmac('sha256', $payload, $webhookSecret);

        if (!hash_equals($signature, $computedSignature)) {
            Log::error('KoraPay Webhook: Invalid signature.');
            return response()->json(['status' => 'error', 'message' => 'Invalid signature'], 401);
        }

        $event = json_decode($payload, true);

        if (isset($event['event']) && $event['event'] === 'charge.success') {
            $this->processSuccessfulPayment($event['data']);
        }

        return response()->json(['status' => 'success']);
    }

    /**
     * Checks the status of a payment for AJAX polling.
     *
     * @param string $reference The transaction reference.
     * @return \Illuminate\Http\JsonResponse
     */
    public function paymentStatus($reference)
    {
        return response()->json([
            'status' => $this->verifyPayment($reference) ? 'success' : 'pending'
        ]);
    }

    /**
     * Verifies the payment status with KoraPay.
     *
     * @param string $reference The transaction reference.
     * @return bool
     */
    private function verifyPayment($reference)
    {
        $secretKey = core()->getConfigData('sales.payment_methods.korapay.secret_key');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $secretKey,
        ])->get($this->apiBaseUrl . '/charges/' . $reference);

        $responseData = $response->json();

        return $response->successful()
            && isset($responseData['status'], $responseData['data']['status'])
            && $responseData['status'] === true
            && $responseData['data']['status'] === 'success';
    }

    /**
     * Processes a successful payment notification from a webhook.
     * This is the single source of truth for creating an order.
     *
     * @param array $transaction
     * @return void
     */
    private function processSuccessfulPayment($transaction)
    {
        $cartId = $transaction['metadata']['cart_id'] ?? null;

        if (!$cartId) {
            Log::error('KoraPay Webhook: Cart ID not found in metadata', $transaction);
            return;
        }

        // Check if an order has already been created for this cart to prevent duplicates.
        $order = $this->orderRepository->findOneByField('cart_id', $cartId);
        if ($order) {
            Log::info('KoraPay Webhook: Order already exists for cart ID: ' . $cartId);
            return;
        }

        $cart = CartModel::find($cartId);
        if (!$cart) {
            Log::error('KoraPay Webhook: Cart not found for ID: ' . $cartId);
            return;
        }

        // Prepare order data from cart
        $orderData = Cart::prepareDataForOrder();

        // Add payment information to the order
        $orderData['payment']['method'] = 'korapay';
        $orderData['payment']['additional'] = [
            'transaction_reference' => $transaction['reference'],
            'amount' => $transaction['amount'],
            'currency' => $transaction['currency'],
        ];

        // Create the order
        $order = $this->orderRepository->create($orderData);

        // Deactivate the cart
        Cart::deActivateCart($cartId);

        Log::info('KoraPay Webhook: Order created successfully.', [
            'order_id' => $order->id,
            'transaction_reference' => $transaction['reference']
        ]);
    }
}
