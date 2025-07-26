<?php

return [
    [
        'key'    => 'sales.payment_methods.korapay',
        'name'   => 'Kora Pay',
        'sort'   => 5,
        'info'   => 'Configure Kora Pay for Card and Mobile Money payments.', // <-- ADD THIS LINE
        'fields' => [
            [
                'name'          => 'title',
                'title'         => 'Title',
                'type'          => 'text',
                'validation'    => 'required',
                'channel_based' => false,
                'locale_based'  => true,
            ], [
                'name'          => 'description',
                'title'         => 'Description',
                'type'          => 'textarea',
                'channel_based' => false,
                'locale_based'  => true,
            ],  [
                'name'          => 'public_key',
                'title'         => 'API Public Key',
                'type'          => 'text',
                'validation'    => 'required',
            ],  [
                'name'          => 'secret_key',
                'title'         => 'API Secret Key',
                'type'          => 'password',
                'validation'    => 'required',
            ], [
                'name'          => 'sandbox',
                'title'         => 'Sandbox Mode',
                'type'          => 'boolean',
                'default'       => true,
            ], [
                'name'          => 'active',
                'title'         => 'Status',
                'type'          => 'boolean',
                'validation'    => 'required',
            ]
        ]
    ]
];