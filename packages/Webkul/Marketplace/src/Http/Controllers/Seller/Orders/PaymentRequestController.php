<?php

namespace Webkul\Marketplace\Http\Controllers\Seller\Orders;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Webkul\Marketplace\Enums\Payout;
use Webkul\Marketplace\Http\Controllers\Seller\Controller;
use Webkul\Marketplace\Mail\PaymentRequestNotification;
use Webkul\Marketplace\Repositories\OrderRepository;

class PaymentRequestController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(protected OrderRepository $orderRepository) {}

    /**
     * Update the order for payment and sends mails to admin.
     *
     * @return Response
     */
    public function requestPayment(int $id)
    {
        $order = $this->orderRepository->where([
            ['marketplace_seller_id', seller()->id()],
            ['id', $id],
        ])->firstOrFail();

        if (! in_array($order->seller_payout_status, [
            Payout::STATUS_PAID->value,
            Payout::STATUS_REFUNDED->value,
            Payout::STATUS_REQUESTED->value,
        ])) {
            $order->update(['seller_payout_status' => Payout::STATUS_REQUESTED->value]);

            try {
                Mail::to(core()->getAdminEmailDetails()['email'])
                    ->send(new PaymentRequestNotification($order));
            } catch (\Exception $e) {
                report($e);
            }

            return back()->withSuccess(trans('marketplace::app.seller.orders.index.payment-req-success'));
        }

        return back();
    }
}
