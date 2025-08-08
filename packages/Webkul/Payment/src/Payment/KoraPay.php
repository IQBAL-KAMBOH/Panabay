<?php

namespace Webkul\Payment\Payment;

use Illuminate\Support\Facades\Storage;

class KoraPay extends Payment
{
    protected $code = 'korapay';

    public function getRedirectUrl()
    {
        // return route('korapay.mock.success');
        return route('korapay.redirect');
    }
    public function getPaymentMethodView()
    {
        // We will create this view file next.
        // It will contain the HTML for selecting Card or Mobile Money.
        return 'shop::checkout.onepage.korapay';
    }
    public function getImage()
    {
        $url = $this->getConfigData('image');

        return $url ? Storage::url($url) : bagisto_asset('images/Kora-dark.svg', 'shop');
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
            'currency' => [
                'name' => 'currency',
                'label' => 'Currency',
                'type' => 'select',
                'options' => [
                    ['value' => 'NGN', 'label' => 'NGN - Nigerian Naira'],
                    ['value' => 'GHS', 'label' => 'GHS - Ghanaian Cedi'],
                    ['value' => 'KES', 'label' => 'KES - Kenyan Shilling'],
                ],
                'validation' => 'required',
            ],
            'merchant_bears_cost' => [
                'name' => 'merchant_bears_cost',
                'label' => 'Merchant Bears Cost',
                'type' => 'boolean',
                'options' => [
                    ['value' => 1, 'label' => 'Yes'],
                    ['value' => 0, 'label' => 'No'],
                ],
            ],
        ];
    }
}
