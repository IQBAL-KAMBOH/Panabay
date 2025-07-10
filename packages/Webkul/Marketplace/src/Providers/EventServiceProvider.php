<?php

namespace Webkul\Marketplace\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Schema;
use Webkul\Marketplace\Listeners\Cart;
use Webkul\Marketplace\Listeners\Configuration;
use Webkul\Marketplace\Listeners\InventorySource;
use Webkul\Marketplace\Listeners\Invoice;
use Webkul\Marketplace\Listeners\Order;
use Webkul\Marketplace\Listeners\Product;
use Webkul\Marketplace\Listeners\Refund;
use Webkul\Marketplace\Listeners\Seller;
use Webkul\Marketplace\Listeners\Shipment;
use Webkul\Marketplace\Listeners\Transaction;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event handler mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'marketplace.seller.create.after' => [
            [Seller::class, 'afterCreate'],
        ],

        'marketplace.seller.update.after' => [
            [Seller::class, 'afterUpdate'],
        ],

        'catalog.product.update.after' => [
            [Product::class, 'afterUpdate'],
        ],

        'marketplace.product.update.after' => [
            [Product::class, 'afterSellerProductUpdate'],
        ],

        'marketplace.assign-product.create.after' => [
            [Product::class, 'afterAssignProductUpdateOrCreate'],
        ],

        'marketplace.assign-product.update.after' => [
            [Product::class, 'afterAssignProductUpdateOrCreate'],
        ],

        'checkout.cart.collect.totals.before' => [
            [Cart::class, 'beforeCollectTotals'],
        ],

        'checkout.order.save.after' => [
            [Order::class, 'afterSave'],
        ],

        'sales.order.cancel.after' => [
            [Order::class, 'afterCancel'],
        ],

        'marketplace.sales.order.save.after' => [
            [Order::class, 'sendNewOrderMail'],
        ],

        'marketplace.sales.transaction.create.after' => [
            [Transaction::class, 'afterCreate'],
        ],

        'sales.invoice.save.after' => [
            [Invoice::class, 'afterSave'],
        ],

        'sales.shipment.save.after' => [
            [Shipment::class, 'afterSave'],
        ],

        'sales.refund.save.after' => [
            [Refund::class, 'afterSave'],
        ],

        'core.configuration.save.after' => [
            [Configuration::class, 'afterSave'],
        ],

        'inventory.inventory_source.create.after' => [
            [InventorySource::class, 'afterCreate'],
        ],
    ];

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $templates = [
            [
                'event'    => 'bagisto.shop.layout.head.before',
                'template' => 'marketplace::components.shop.layouts.header.style',
            ], [
                'event'    => 'bagisto.admin.layout.head.before',
                'template' => 'marketplace::components.admin.layouts.header.style',
            ], [
                'event'    => 'bagisto.shop.products.view.additional_actions.after',
                'template' => 'marketplace::shop.products.product-sellers',
            ], [
                'event'    => 'bagisto.shop.products.view.after',
                'template' => 'marketplace::shop.products.top-selling',
            ], [
                'event'    => 'bagisto.shop.components.layouts.header.desktop.bottom.mini_cart.after',
                'template' => 'marketplace::components.shop.layouts.header.sell',
            ], [
                'event'    => 'bagisto.shop.components.layouts.header.mobile.mini_cart.after',
                'template' => 'marketplace::components.shop.layouts.header.sell',
            ], [
                'event'    => 'bagisto.shop.components.layouts.header.desktop.bottom.profile_dropdown.links.before',
                'template' => 'marketplace::components.shop.layouts.header.profile',
            ], [
                'event'    => 'bagisto.shop.components.layouts.header.desktop.bottom.customers_action.before',
                'template' => 'marketplace::components.shop.layouts.header.profile',
            ], [
                'event'    => 'bagisto.shop.components.layouts.header.mobile.drawer.categories.before',
                'template' => 'marketplace::components.shop.layouts.header.profile',
            ], [
                'event'    => 'bagisto.shop.checkout.cart.breadcrumbs.after',
                'template' => 'marketplace::shop.checkout.cart.error',
            ],
        ];

        /**
         * Checks if the `core_config` table exists.
         * This is necessary because if someone installs Bagisto and the marketplace module simultaneously,
         * it may cause an error due to the `core_config` table not being available during the installation process.
         */
        if (
            Schema::hasTable('core_config')
            && core()->getConfigData('marketplace.settings.general.status')
        ) {
            foreach ($templates as $template) {
                Event::listen(current($template), fn ($e) => $e->addTemplate(end($template)));
            }
        }
    }
}
