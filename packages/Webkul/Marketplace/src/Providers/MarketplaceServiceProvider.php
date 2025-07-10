<?php

namespace Webkul\Marketplace\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Webkul\Marketplace\Console\Commands\InstallMarketplace;
use Webkul\Marketplace\Console\Commands\MarketplaceFaker;
use Webkul\Marketplace\Console\Commands\MarketplaceVersion;
use Webkul\Marketplace\Http\Middleware\Locale;
use Webkul\Marketplace\Http\Middleware\Marketplace;
use Webkul\Marketplace\Http\Middleware\Seller;

class MarketplaceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            dirname(__DIR__).'/Config/admin/system.php',
            'core'
        );

        $this->mergeConfigFrom(
            dirname(__DIR__).'/Config/admin/acl.php',
            'acl'
        );

        $this->mergeConfigFrom(
            dirname(__DIR__).'/Config/seller/acl.php',
            'marketplace_acl'
        );

        $this->mergeConfigFrom(
            dirname(__DIR__).'/Config/seller/menu.php',
            'marketplace_menu.seller'
        );

        $this->mergeConfigFrom(
            dirname(__DIR__).'/Config/bagisto-vite.php',
            'bagisto-vite.viters'
        );

        $this->mergeConfigFrom(
            dirname(__DIR__).'/Config/response-cache.php',
            'responsecache.replacers'
        );

        $this->mergeAuthConfigs();
    }

    /**
     * Merge Auth Configs.
     */
    public function mergeAuthConfigs(): void
    {
        foreach (['guards', 'providers', 'passwords'] as $key) {
            $this->mergeConfigFrom(
                dirname(__DIR__).'/Config/seller/auth/'.$key.'.php',
                'auth.'.$key
            );
        }
    }

    /**
     * Bootstrap services.
     */
    public function boot(Router $router): void
    {
        include __DIR__.'/../Http/helpers.php';

        $router->aliasMiddleware('seller', Seller::class);

        $router->aliasMiddleware('seller.locale', Locale::class);

        $router->aliasMiddleware('marketplace', Marketplace::class);

        Route::middleware('web')->group(__DIR__.'/../Routes/web.php');

        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');

        $this->loadRoutesFrom(__DIR__.'/../Routes/breadcrumbs.php');

        $this->loadViewsFrom(__DIR__.'/../Resources/views', 'marketplace');

        Blade::anonymousComponentPath(__DIR__.'/../Resources/views/components', 'marketplace');

        $this->loadTranslationsFrom(__DIR__.'/../Resources/lang', 'marketplace');

        $this->registerCommands();

        $this->registerProviders();

        $this->publishAssets();

        /**
         * Checks if the `core_config` table exists.
         * This is necessary because if someone installs Bagisto and the marketplace module simultaneously,
         * it may cause an error due to the `core_config` table not being available during the installation process.
         */
        if (
            Schema::hasTable('core_config')
            && core()->getConfigData('marketplace.settings.general.status')
        ) {
            $this->mergeConfigFrom(
                dirname(__DIR__).'/Config/admin/menu.php',
                'menu.admin'
            );
        }

        /**
         * Calls the `MarketplaceManager` class to bind the classes to the container.
         */
        new MarketplaceManager($this->app);
    }

    /**
     * Register the commands.
     */
    protected function registerCommands(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallMarketplace::class,
                MarketplaceFaker::class,
                MarketplaceVersion::class,
            ]);
        }
    }

    /**
     * Register the providers.
     */
    protected function registerProviders(): void
    {
        $this->app->register(ModuleServiceProvider::class);

        $this->app->register(EventServiceProvider::class);
    }

    /**
     * Publish the assets.
     */
    protected function publishAssets(): void
    {
        $this->publishes([
            __DIR__.'/../../publishable/storage' => storage_path('app/public'),
        ]);

        $this->publishes([
            __DIR__.'/../../publishable/build' => public_path('themes/marketplace/build'),
        ], 'public');

        $this->publishes([
            __DIR__.'/../Resources/views/components/dropdown/index.blade.php' => resource_path('themes/default/views/components/dropdown/index.blade.php'),

            __DIR__.'/../Resources/views/components/datagrid/index.blade.php' => resource_path('themes/default/views/components/datagrid/index.blade.php'),

            __DIR__.'/../Resources/views/admin/shipments' => resource_path('admin-themes/default/views/sales/shipments'),

            __DIR__.'/../Resources/views/admin/products/edit' => resource_path('admin-themes/default/views/catalog/products/edit'),

            __DIR__.'/../Resources/views/admin/settings/channels' => resource_path('admin-themes/default/views/settings/channels'),
        ]);
    }
}
