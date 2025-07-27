<?php

return [
    'korapay' => [
        'code'          => 'korapay',
        'title'         => 'KoraPay',
        'description'   => 'Pay with Card or Mobile Money via KoraPay',
        'class'         => 'Vendor\KoraPay\Payment\KoraPay', // Make sure this class exists!
        'active'        => true,
        'sort'          => 5,
    ],
];