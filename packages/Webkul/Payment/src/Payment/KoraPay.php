<?php

namespace Webkul\Payment\Payment;

class KoraPay extends Payment
{
    protected $code = 'korapay';

    public function getRedirectUrl()
    {
        return route('korapay.redirect');
    }

    public function getFormFields()
    {
        return [
            'merchant_id' => [
                'name' => 'merchant_id',
                'label' => 'Merchant ID',
                'type' => 'text',
                'validation' => 'required',
            ],
            'secret_key' => [
                'name' => 'secret_key',
                'label' => 'Secret Key',
                'type' => 'password',
                'validation' => 'required',
            ],
            'active' => [
                'name' => 'active',
                'label' => 'Status',
                'type' => 'boolean',
                'options' => [
                    ['value' => 0, 'label' => 'Inactive'],
                    ['value' => 1, 'label' => 'Active'],
                ],
            ],
        ];
    }
}