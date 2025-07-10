<?php

use Illuminate\Support\Facades\Route;
use Webkul\Marketplace\Http\Controllers\Seller\Reporting\CustomerController;
use Webkul\Marketplace\Http\Controllers\Seller\Reporting\ProductController;
use Webkul\Marketplace\Http\Controllers\Seller\Reporting\SaleController;

/**
 * ----------------------------------------------
 * All the reporting routes will be defined here
 * ----------------------------------------------
 */
Route::prefix('reporting')->group(function () {
    Route::prefix('customers')
        ->name('reporting.customers.')
        ->controller(CustomerController::class)
        ->group(function () {
            Route::get('', 'index')->name('index');

            Route::get('stats', 'stats')->name('stats');

            Route::get('export', 'export')->name('export');

            Route::get('view', 'view')->name('view');

            Route::get('view/stats', 'viewStats')->name('view.stats');
        });

    Route::prefix('products')
        ->name('reporting.products.')
        ->controller(ProductController::class)
        ->group(function () {
            Route::get('', 'index')->name('index');

            Route::get('stats', 'stats')->name('stats');

            Route::get('export', 'export')->name('export');

            Route::get('view', 'view')->name('view');

            Route::get('view/stats', 'viewStats')->name('view.stats');
        });

    Route::prefix('sales')
        ->name('reporting.sales.')
        ->controller(SaleController::class)
        ->group(function () {
            Route::get('', 'index')->name('index');

            Route::get('stats', 'stats')->name('stats');

            Route::get('export', 'export')->name('export');

            Route::get('view', 'view')->name('view');

            Route::get('view/stats', 'viewStats')->name('view.stats');
        });
});
