<?php

namespace Vendor\KoraPay\Http\Controllers\Shop;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Webkul\Checkout\Facades\Cart;
use Webkul\Sales\Repositories\OrderRepository;

class KoraPayController
{
    public function __construct(protected OrderRepository $orderRepository)
    {
    }

    /**
     * Called via AJAX from the onSuccess JS callback.
     * Creates an order with a 'pending_payment' status.
     */
    public function saveOrder(Request $request)
    {
        if (! Cart::getCart() || ! Cart::getCart()->items->count()) {
            return response()->json(['success' => false, 'message' => 'Your cart is empty.'], 400);
        }

        // Prepare the order data
        $data = Cart::prepareDataForOrder();

        // Set the payment method and a 'pending_payment' status
        $data['payment']['method_title'] = core()->getConfigData('sales.payment_methods.korapay.title');
        $data['status'] = 'pending_payment';

        // Create the order
        $order = $this->orderRepository->create($data);

        // Add the KoraPay reference to the order for tracking
        $this->orderRepository->update(
            ['additional' => ['korapay_reference' => $request->input('reference')]],
            $order->id
        );

        Cart::deactivateCart();

        return response()->json([
            'success' => true,
            'redirect_url' => route('shop.checkout.onepage.success')
        ]);
    }

    /**
     * Handles the webhook notification from Kora Pay.
     * This is the real confirmation.
     */
    public function webhook(Request $request)
    {
        // You should implement webhook signature verification here for security.
        // Check KoraPay docs for a 'x-korapay-signature' header or similar.

        $event = $request->all();
        Log::info('KoraPay Webhook Received:', $event);

        // Check if it's a successful charge event
        if (isset($event['event']) && $event['event'] === 'charge.success') {
            $reference = $event['data']['payment_reference']; // The original reference you sent

            // Find the order using the reference
            $order = $this->orderRepository->findOneByField('additional->korapay_reference', $reference);

            if ($order && $order->status === 'pending_payment') {
                // Update the order status to 'processing'
                $this->orderRepository->update(['status' => 'processing'], $order->id);

                // Create the invoice for the order
                $this->orderRepository->update(['status' => 'processing'], $order->id);
                if ($order->canInvoice()) {
                    app('Webkul\Sales\Repositories\InvoiceRepository')->create($this->prepareInvoiceData($order));
                }

                // Send order confirmation email
                try {
                    app('Webkul\Sales\Helpers\Order')->sendNewOrderMail($order);
                } catch (\Exception $e) {
                    Log::error('KoraPay: New Order email failed to send for order ' . $order->id, ['error' => $e->getMessage()]);
                }
            }
        }

        // Respond to Kora Pay so they know you received it.
        return response()->json(['status' => 'success'], 200);
    }

    /**
     * Prepares invoice data for the order.
     */
    protected function prepareInvoiceData($order)
    {
        $invoiceData = ['order_id' => $order->id];
        foreach ($order->items as $item) {
            $invoiceData['invoice']['items'][$item->id] = $item->qty_to_invoice;
        }
        return $invoiceData;
    }
}