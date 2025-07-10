<?php

use Illuminate\Support\Facades\Route;

/**
 * Admin routes.
 */
require 'admin-routes.php';

/**
 * Shop routes.
 */
require 'shop-routes.php';

/**
 * Auth routes.
 */
require 'auth-routes.php';

/**
 * Seller routes.
 */
Route::prefix('seller')
    ->name('seller.')
    ->middleware(['theme', 'marketplace', 'seller', 'seller.locale'])
    ->group(function () {
        require 'product-routes.php';

        require 'reporting-routes.php';

        require 'rest-routes.php';

        require 'sales-routes.php';

        require 'settings-routes.php';
    });
