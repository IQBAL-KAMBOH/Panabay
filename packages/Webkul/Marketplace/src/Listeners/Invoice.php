<?php

namespace Webkul\Marketplace\Listeners;

use Webkul\Marketplace\Repositories\InvoiceRepository;

class Invoice
{
    /**
     * After invoice save event.
     */
    public function afterSave($invoice)
    {
        app(InvoiceRepository::class)->create(['invoice' => $invoice]);
    }
}
