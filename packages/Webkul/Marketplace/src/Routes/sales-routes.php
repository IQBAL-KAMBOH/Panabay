<?php

use Illuminate\Support\Facades\Route;
use Webkul\Marketplace\Http\Controllers\Seller\BookingController;
use Webkul\Marketplace\Http\Controllers\Seller\Orders\InvoiceController;
use Webkul\Marketplace\Http\Controllers\Seller\Orders\OrderController;
use Webkul\Marketplace\Http\Controllers\Seller\Orders\PaymentRequestController;
use Webkul\Marketplace\Http\Controllers\Seller\Orders\ShipmentController;
use Webkul\Marketplace\Http\Controllers\Seller\TransactionController;

/**
 * ----------------------------------------------
 * All the order routes will be defined here
 * ----------------------------------------------
 */
Route::prefix('orders')->group(function () {
    Route::name('orders.')
        ->controller(OrderController::class)
        ->group(function () {
            Route::get('', 'index')->name('index');

            Route::get('view/{order_id}', 'view')->name('view');

            Route::get('cancel/{order_id}', 'cancel')->name('cancel');
        });

    Route::prefix('invoices')
        ->name('invoices.')
        ->controller(InvoiceController::class)
        ->group(function () {
            Route::post('create/{id}', 'store')->name('store');

            Route::get('print/{id}', 'print')->name('print');
        });

    Route::prefix('shipments')
        ->name('shipments.')
        ->controller(ShipmentController::class)
        ->group(function () {
            Route::post('create/{id}', 'store')->name('store');
        });

    Route::prefix('payment-request')
        ->name('payment.')
        ->controller(PaymentRequestController::class)
        ->group(function () {
            Route::get('{id}', 'requestPayment')->name('request');
        });
});

/**
 * ----------------------------------------------
 * All the booking routes will be defined here
 * ----------------------------------------------
 */
Route::prefix('bookings')
    ->name('bookings.')
    ->controller(BookingController::class)
    ->group(function () {
        Route::get('', 'index')->name('index');
    });

/**
 * ----------------------------------------------
 * All the transaction routes will be defined here
 * ----------------------------------------------
 */
Route::prefix('transactions')
    ->name('transactions.')
    ->controller(TransactionController::class)
    ->group(function () {
        Route::get('', 'index')->name('index');

        Route::get('view/{id}', 'view')->name('view');

        Route::get('print/{id}', 'print')->name('print');
    });
