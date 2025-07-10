<?php

use Illuminate\Support\Facades\Route;
use Webkul\Marketplace\Http\Controllers\Seller\Settings\GeneralController;
use Webkul\Marketplace\Http\Controllers\Seller\Settings\InventorySourceController;
use Webkul\Marketplace\Http\Controllers\Seller\Settings\RoleController;
use Webkul\Marketplace\Http\Controllers\Seller\Settings\UserController;

/**
 * ----------------------------------------------
 * All the settings routes will be defined here
 * ----------------------------------------------
 */
Route::prefix('settings')->group(function () {
    /**
     * ----------------------------------------------
     * All the general settings routes will be defined here
     * ----------------------------------------------
     */
    Route::prefix('general')
        ->name('settings.general.')
        ->controller(GeneralController::class)
        ->group(function () {
            Route::get('', 'index')->name('index');

            Route::put('', 'update')->name('update');
        });

    /**
     * ----------------------------------------------
     * All the user routes will be defined here
     * ----------------------------------------------
     */
    Route::prefix('users')
        ->name('settings.users.')
        ->controller(UserController::class)
        ->group(function () {
            Route::get('', 'index')->name('index');

            Route::post('', 'store')->name('store');

            Route::get('edit/{id}', 'edit')->name('edit');

            Route::put('edit', 'update')->name('update');

            Route::delete('edit/{id}', 'destroy')->name('delete');
        });

    /**
     * ----------------------------------------------
     * All the role routes will be defined here
     * ----------------------------------------------
     */
    Route::prefix('roles')
        ->name('settings.roles.')
        ->controller(RoleController::class)
        ->group(function () {
            Route::get('', 'index')->name('index');

            Route::get('create', 'create')->name('create');

            Route::post('create', 'store')->name('store');

            Route::get('edit/{id}', 'edit')->name('edit');

            Route::put('edit/{id}', 'update')->name('update');

            Route::delete('edit/{id}', 'destroy')->name('delete');
        });

    /**
     * ----------------------------------------------
     * All the inventory routes will be defined here
     * ----------------------------------------------
     */
    Route::prefix('inventory-sources')
        ->name('settings.inventory_sources.')
        ->controller(InventorySourceController::class)
        ->group(function () {
            Route::get('', 'index')->name('index');

            Route::get('create', 'create')->name('create');

            Route::post('create', 'store')->name('store');

            Route::get('edit/{id}', 'edit')->name('edit');

            Route::put('edit/{id}', 'update')->name('update');

            Route::delete('edit/{id}', 'destroy')->name('delete');
        });
});
