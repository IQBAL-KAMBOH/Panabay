<?php

namespace Webkul\Marketplace\Listeners;

use Exception;
use Illuminate\Support\Facades\Mail;
use Webkul\Marketplace\Mail\NewOrderNotification;
use Webkul\Marketplace\Repositories\OrderRepository;

class Order
{
    /**
     * Create a new repository instance.
     *
     * @return void
     */
    public function __construct(protected OrderRepository $orderRepository) {}

    /**
     * After sales order save event
     */
    public function afterSave($order)
    {
        $this->orderRepository->create(['order' => $order]);
    }

    /**
     * After sales order cancel event
     */
    public function afterCancel($order)
    {
        $this->orderRepository->cancel(['order' => $order]);
    }

    /**
     * Send new order mail to seller
     */
    public function sendNewOrderMail($order)
    {
        try {
            Mail::queue(new NewOrderNotification($order));
        } catch (Exception $e) {
        }
    }
}
