<?php

namespace Vendor\KoraPay\Payment;

use Webkul\Payment\Payment\Payment;

class KoraPay extends Payment
{
    /**
     * Payment method code.
     * This must match the code we defined in the service provider.
     *
     * @var string
     */
    protected $code = 'korapay';

    /**
     * Returns the payment method view.
     * This tells Bagisto to render our custom blade template which contains the JavaScript for the modal.
     * This is the correct method for a JS-based integration.
     *
     * @return string
     */
    public function getPaymentView(): string
    {
        return 'korapay::shop.checkout.korapay-view';
    }
}