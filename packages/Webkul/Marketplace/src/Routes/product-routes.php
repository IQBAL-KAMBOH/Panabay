<?php

use Illuminate\Support\Facades\Route;
use Webkul\Marketplace\Http\Controllers\Seller\Products\AssignProductController;
use Webkul\Marketplace\Http\Controllers\Seller\Products\ProductController;

/**
 * ----------------------------------------------
 * All the product routes will be defined here
 * ----------------------------------------------
 */
Route::prefix('products')->group(function () {
    Route::name('products.')
        ->controller(ProductController::class)
        ->group(function () {
            Route::get('', 'index')->name('index');

            Route::get('create', 'create')->name('create');

            Route::get('search', 'search')->name('search');

            Route::get('search-simple', 'searchSimple')->name('search_simple');

            Route::post('create', 'store')->name('store');

            Route::get('edit/{id}', 'edit')->name('edit');

            Route::put('edit/{id}', 'update')->name('update');

            Route::delete('edit/{id}', 'destroy')->name('delete');

            Route::post('mass-delete', 'massDestroy')->name('mass_delete');

            Route::post('upload-file/{id}', 'uploadLink')->name('upload_link');

            Route::post('upload-sample/{id}', 'uploadSample')->name('upload_sample');
        });

    Route::prefix('assign')
        ->name('products.assign.')
        ->controller(AssignProductController::class)
        ->group(function () {
            Route::get('{id?}', 'create')->name('create');

            Route::get('edit/{id}', 'edit')->name('edit');

            Route::post('{id?}', 'store')->name('store');

            Route::put('{id}', 'update')->name('update');

            Route::post('upload-file/{id}', 'uploadLink')->name('upload_link');

            Route::post('upload-sample/{id}', 'uploadSample')->name('upload_sample');
        });
});
