<?php

namespace Vendor\KoraPay\Payment;

use Webkul\Payment\Payment\Payment;

class KoraPay extends Payment
{
    /**
     * This is Requirement #1: Define the unique code.
     */
    protected $code = 'korapay';

    /**
     * This is Requirement #2: Fulfill the abstract contract.
     * For a redirect flow, this points to our server first.
     */
    public function getRedirectUrl(): string
    {
        return route('korapay.redirect');
    }

    /**
     * This is Optional but good practice. By defining it here, you
     * are being explicit. If you remove this method, your class
     * will simply use the default one from the parent Payment class,
     * which does the exact same thing.
     */
    public function isAvailable(): bool
    {
        return $this->getConfigData('active');
    }
}