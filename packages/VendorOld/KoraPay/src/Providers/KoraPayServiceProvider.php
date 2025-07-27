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
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/shop-routes.php');
        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'korapay');
        $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'korapay');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        // This ensures the registerConfig method below is always called.
        $this->registerConfig();
    }

    /**
     * Register package config.
     *
     * @return void
     */
    protected function registerConfig(): void
    {
        // This is the line that merges your payment method definition.
        // It looks for a file at `packages/Vendor/KoraPay/src/Config/paymentmethods.php`
        // and merges it into Bagisto's main 'paymentmethods' config array.
        $this->mergeConfigFrom(
            dirname(__DIR__) . '/Config/paymentmethods.php', 'paymentmethods'
        );

        // This line merges your admin panel fields.
        $this->mergeConfigFrom(
            dirname(__DIR__) . '/Config/system.php', 'core'
        );
    }
}