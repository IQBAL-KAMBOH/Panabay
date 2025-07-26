<?php

use Illuminate\Support\Facades\Route;
use Vendor\KoraPay\Http\Controllers\Admin\KoraPayController;

Route::group(['middleware' => ['web', 'admin'], 'prefix' => 'admin/korapay'], function () {
    Route::controller(KoraPayController::class)->group(function () {
        Route::get('', 'index')->name('admin.korapay.index');
    });
});