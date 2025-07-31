<?php

return [
    'cashondelivery'  => [
        'code'        => 'cashondelivery',
        'title'       => 'Cash On Delivery',
        'description' => 'Cash On Delivery',
        'class'       => 'Webkul\Payment\Payment\CashOnDelivery',
        'active'      => true,
        'sort'        => 1,
    ],

    'moneytransfer'   => [
        'code'        => 'moneytransfer',
        'title'       => 'Money Transfer',
        'description' => 'Money Transfer',
        'class'       => 'Webkul\Payment\Payment\MoneyTransfer',
        'active'      => true,
        'sort'        => 2,
    ],
      'korapay' => [
        'code'        => 'korapay',
        'title'       => 'Pay with KoraPay (Card or Mobile Money)',
        'description' => 'Secure online payments via Kora Pay',
        'class'       => 'Webkul\Payment\Payment\KoraPay', // Ensure this class exists
        'active'      => true, // Set to false to disable by default
        'sort'        => 3, // Display position
    ],

];
