<?php

use Illuminate\Support\Facades\Route;
use Webkul\Marketplace\Http\Controllers\Seller\CommunicationController;
use Webkul\Marketplace\Http\Controllers\Seller\CustomerController;
use Webkul\Marketplace\Http\Controllers\Seller\DashboardController;
use Webkul\Marketplace\Http\Controllers\Seller\ExtensionController;
use Webkul\Marketplace\Http\Controllers\Seller\MegaSearchController;
use Webkul\Marketplace\Http\Controllers\Seller\ProductReviewController;
use Webkul\Marketplace\Http\Controllers\Seller\ProfileController;
use Webkul\Marketplace\Http\Controllers\Seller\SellerReviewController;
use Webkul\Marketplace\Http\Controllers\Seller\SessionController;

Route::prefix('logout')
    ->name('session.')
    ->controller(SessionController::class)
    ->group(function () {
        Route::delete('', 'destroy')->name('destroy');
    });

/**
 * ----------------------------------------------
 * All the mega search routes will be defined here
 * ----------------------------------------------
 */
Route::prefix('mega-search')
    ->name('mega_search.')
    ->controller(MegaSearchController::class)
    ->group(function () {
        Route::get('products', 'products')->name('products');

        Route::get('orders', 'orders')->name('orders');

        Route::get('customers', 'customers')->name('customers');
    });

/**
 * ----------------------------------------------
 * All the dashboard routes will be defined here
 * ----------------------------------------------
 */
Route::prefix('dashboard')
    ->name('dashboard.')
    ->controller(DashboardController::class)
    ->group(function () {
        Route::get('', 'index')->name('index');

        Route::get('stats', 'stats')->name('stats');
    });

/**
 * ----------------------------------------------
 * All the profile routes will be defined here
 * ----------------------------------------------
 */
Route::prefix('profile')
    ->name('profile.')
    ->controller(ProfileController::class)
    ->group(function () {
        Route::get('', 'index')->name('index');

        Route::get('edit', 'edit')->name('edit');

        Route::put('{id}', 'update')->name('update');
    });

/**
 * ----------------------------------------------
 * All the product review routes will be defined here
 * ----------------------------------------------
 */
Route::prefix('product-reviews')
    ->name('product_reviews.')
    ->controller(ProductReviewController::class)
    ->group(function () {
        Route::get('', 'index')->name('index');

        Route::post('mass-update', 'massUpdate')->name('mass_update');
    });

/**
 * ----------------------------------------------
 * All the customer routes will be defined here
 * ----------------------------------------------
 */
Route::prefix('customers')
    ->name('customers.')
    ->controller(CustomerController::class)
    ->group(function () {
        Route::get('', 'index')->name('index');
    });

/**
 * ----------------------------------------------
 * All the seller review routes will be defined here
 * ----------------------------------------------
 */
Route::prefix('seller-reviews')
    ->name('seller_reviews.')
    ->controller(SellerReviewController::class)
    ->group(function () {
        Route::get('', 'index')->name('index');
    });

/**
 * ----------------------------------------------
 * All the communication routes will be defined here
 * ----------------------------------------------
 */
Route::prefix('communication')
    ->name('communication.')
    ->controller(CommunicationController::class)
    ->group(function () {
        Route::get('', 'index')->name('index');

        Route::post('send-message', 'sendMessage')->name('send_message');

        Route::get('messages', 'messages')->name('messages');
    });

/**
 * -----------------------------------------------
 * All the extension routes will be defined here
 * -----------------------------------------------
 */
Route::prefix('extensions')
    ->name('extensions.')
    ->controller(ExtensionController::class)
    ->group(function () {
        Route::get('', 'index')->name('index');
    });
