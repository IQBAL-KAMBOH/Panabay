<?php

use Illuminate\Support\Facades\Route;
use Vendor\KoraPay\Http\Controllers\Shop\KoraPayController;

Route::group(['middleware' => ['web', 'theme', 'locale', 'currency']], function () {

    // 1. The initial redirect from Bagisto checkout
    Route::get('/korapay/redirect', [KoraPayController::class, 'redirect'])->name('korapay.redirect');

    // 2. The callback URL KoraPay sends the customer back to
    Route::get('/korapay/callback', [KoraPayController::class, 'handleCallback'])->name('korapay.callback');

    // 3. The webhook URL for server-to-server notifications
    Route::post('/korapay/webhook', [KoraPayController::class, 'handleWebhook'])->name('korapay.webhook');

});