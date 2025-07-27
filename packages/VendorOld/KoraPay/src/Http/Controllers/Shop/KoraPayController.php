<?php

namespace Vendor\KoraPay\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Webkul\Checkout\Facades\Cart;
use Webkul\Sales\Repositories\OrderRepository;

class KoraPayController extends Controller
{
    protected $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    /**
     * 1. Redirects customer to a KoraPay checkout URL.
     * This is called after the customer clicks "Place Order".
     */
    public function redirect()
    {
        // Get the pending order from the session (Bagisto places it here)
        $order = $this->orderRepository->findOneWhere(['cart_id' => Cart::getCart()->id]);

        if (!$order) {
            // Handle error, maybe redirect back to cart
            session()->flash('error', 'Order not found. Please try again.');
            return redirect()->route('shop.checkout.cart.index');
        }

        // Prepare data for the KoraPay API call
        $payload = [
            'amount'       => (int) ($order->grand_total * 100), // Amount in kobo/cents
            'currency'     => $order->order_currency_code,
            'reference'    => 'order_' . $order->id . '_' . time(), // A unique reference
            'redirect_url' => route('korapay.callback'), // Where KoraPay sends the user back
            'notification_url' => route('korapay.webhook'),
            'customer'     => [
                'email' => $order->customer_email,
                'name'  => $order->customer_full_name,
            ],
        ];

        // Make the secure server-to-server API call
        try {
            $response = Http::withToken(core()->getConfigData('sales.payment_methods.korapay.secret_key'))
                ->post('https://api.korapay.com/merchant/api/v1/charges/initialize', $payload);

            $responseData = $response->json();

            if ($response->successful() && isset($responseData['data']['checkout_url'])) {
                // Redirect the customer to KoraPay's checkout page
                return redirect()->away($responseData['data']['checkout_url']);
            } else {
                // Handle API error
                session()->flash('error', $responseData['message'] ?? 'Could not connect to KoraPay. Please try again.');
                return redirect()->route('shop.checkout.cart.index');
            }
        } catch (\Exception $e) {
            // Handle connection error
            session()->flash('error', 'Payment gateway connection error.');
            return redirect()->route('shop.checkout.cart.index');
        }
    }

    /**
     * 2. Handles the redirect back from KoraPay after payment attempt.
     */
    public function handleCallback(Request $request)
    {
        $transactionReference = $request->query('reference');

        if (!$transactionReference) {
            session()->flash('error', 'Invalid payment response.');
            return redirect()->route('shop.checkout.cart.index');
        }

        // Verify the transaction with KoraPay's server
        try {
            $response = Http::withToken(core()->getConfigData('sales.payment_methods.korapay.secret_key'))
                ->get("https://api.korapay.com/merchant/api/v1/charges/{$transactionReference}");

            $responseData = $response->json();

            if ($response->successful() && $responseData['data']['status'] === 'success') {
                // Payment is verified and successful
                $orderId = explode('_', $responseData['data']['reference'])[1];
                $order = $this->orderRepository->find($orderId);

                if ($order) {
                    $this->orderRepository->update(['status' => 'processing'], $order->id);
                    // You can add invoice creation logic here if needed
                }

                // Deactivate cart and redirect to Bagisto's success page
                Cart::deactivateCart();
                session()->flash('order', $order);
                return redirect()->route('shop.checkout.onepage.success');
            } else {
                // Payment failed or is pending
                session()->flash('error', 'Payment failed or was not completed. Please try again.');
                return redirect()->route('shop.checkout.cart.index');
            }

        } catch (\Exception $e) {
            session()->flash('error', 'Error verifying payment.');
            return redirect()->route('shop.checkout.cart.index');
        }
    }

    /**
     * 3. Handles incoming webhooks from KoraPay (server-to-server).
     */
    public function handleWebhook(Request $request)
    {
        // Add webhook signature verification here for security

        $event = $request->input('event');
        $data = $request->input('data');

        if ($event === 'charge.success') {
            $orderId = explode('_', $data['reference'])[1] ?? null;
            $order = $this->orderRepository->find($orderId);

            if ($order && $order->status === 'pending') {
                $this->orderRepository->update(['status' => 'processing'], $order->id);
            }
        }

        return response()->json(['status' => 'received']);
    }
}