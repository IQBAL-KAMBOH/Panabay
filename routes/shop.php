<?php

use App\Http\Controllers\Shop\Payment\KoraPayController;

// Add after existing routes
Route::get('korapay/redirect', [KoraPayController::class, 'redirect'])->name('korapay.redirect');
Route::get('korapay/callback', [KoraPayController::class, 'callback'])->name('korapay.callback');