<?php

use Illuminate\Support\Facades\Route;
use Vendor\KoraPay\Http\Controllers\Shop\KoraPayController;

Route::group(['middleware' => ['web', 'theme', 'locale', 'currency'], 'prefix' => 'korapay'], function () {
    Route::get('', [KoraPayController::class, 'index'])->name('shop.korapay.index');
});


// Use a group to ensure the 'shop' middleware is applied
Route::group(['middleware' => ['web', 'theme', 'locale', 'currency']], function () {

    // Route for the AJAX call to save a pending order
    Route::post('/korapay/save-order', [KoraPayController::class, 'saveOrder'])->name('korapay.save-order');

    // The webhook route MUST be exempted from CSRF protection
    Route::post('/korapay/webhook', [KoraPayController::class, 'webhook'])->name('korapay.webhook');
});