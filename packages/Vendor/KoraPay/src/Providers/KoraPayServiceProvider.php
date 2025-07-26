<?php

namespace Vendor\KoraPay\Providers;

use Illuminate\Support\ServiceProvider;

class KoraPayServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    // Add this to your boot() method
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/shop-routes.php');
        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'korapay'); // <-- ADD THIS LINE
    }

    /**
     * Register services.
     *
     * @return void
     */
    // In KoraPayServiceProvider.php
    public function register()
    {
        $this->mergeConfigFrom(dirname(__DIR__) . '/Config/system.php', 'core');
    }

    /**
     * Register package config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->mergeConfigFrom(
            dirname(__DIR__) . '/Config/system.php',
            'core'
        );

        // This is the crucial part that replaces the old config/paymentmethods.php file
        config()->set('payment_methods.korapay', [
            'code'          => 'korapay',
            'title'         => 'Kora Pay (Card, MoMo)',
            'description'   => 'Pay with Credit/Debit Card or Mobile Money via Kora Pay',
            'class'         => 'Vendor\KoraPay\Payment\KoraPay', // The class we are creating
            'active'        => true,
            'sort'          => 5
        ]);
    }
}
