<?php

namespace Webkul\Marketplace\Listeners;

use Webkul\Marketplace\Repositories\RefundRepository;

class Refund
{
    /**
     * After save event for refund.
     */
    public function afterSave($refund)
    {
        app(RefundRepository::class)->create($refund);
    }
}
