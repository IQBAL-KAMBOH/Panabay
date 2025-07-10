<?php

namespace Webkul\Marketplace\Listeners;

use Illuminate\Support\Facades\Mail;
use Webkul\Marketplace\Mail\PaymentRequestCompleteNotification;

class Transaction
{
    /**
     * After the transaction is created
     */
    public function afterCreate($transaction)
    {
        try {
            Mail::queue(new PaymentRequestCompleteNotification($transaction->order));
        } catch (\Exception $e) {
        }
    }
}
