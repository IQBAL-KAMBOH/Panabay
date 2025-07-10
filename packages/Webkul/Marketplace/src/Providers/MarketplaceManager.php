<?php

namespace Webkul\Marketplace\Providers;

use Illuminate\Foundation\Application;
use Webkul\Admin\DataGrids\Settings\InventorySourcesDataGrid as BaseInventorySourcesDataGrid;
use Webkul\Admin\Http\Controllers\Settings\InventorySourceController as BaseInventorySourceController;
use Webkul\Checkout\Cart as BaseCart;
use Webkul\Checkout\Contracts\CartItem as CartItemContract;
use Webkul\Core\Contracts\Visit as VisitContract;
use Webkul\Core\Repositories\ChannelRepository as BaseChannelRepository;
use Webkul\Marketplace\Cart;
use Webkul\Marketplace\DataGrids\Admin\Settings\InventorySourcesDataGrid;
use Webkul\Marketplace\Helpers\Indexers\Inventory;
use Webkul\Marketplace\Http\Controllers\Admin\Settings\InventorySourceController;
use Webkul\Marketplace\Models\Checkout\CartItem;
use Webkul\Marketplace\Models\Core\Visit;
use Webkul\Marketplace\Models\Product\Product;
use Webkul\Marketplace\Models\Product\ProductOrderedInventory;
use Webkul\Marketplace\Observers\ProductReviewObserver;
use Webkul\Marketplace\Repositories\Core\ChannelRepository;
use Webkul\Marketplace\Repositories\Product\ProductRepository;
use Webkul\Marketplace\Repositories\Sales\OrderItemRepository;
use Webkul\Marketplace\Repositories\Sales\RefundItemRepository;
use Webkul\Marketplace\Repositories\Sales\ShipmentItemRepository;
use Webkul\Marketplace\Repositories\Sales\ShipmentRepository;
use Webkul\Marketplace\Types\Downloadable as DownloadableProductType;
use Webkul\Marketplace\Types\Grouped as GroupedProductType;
use Webkul\Marketplace\Types\Simple as SimpleProductType;
use Webkul\Product\Contracts\Product as ProductContract;
use Webkul\Product\Contracts\ProductOrderedInventory as ProductOrderedInventoryContract;
use Webkul\Product\Helpers\Indexers\Inventory as BaseInventory;
use Webkul\Product\Models\ProductReview;
use Webkul\Product\Repositories\ProductRepository as BaseProductRepository;
use Webkul\Product\Type\Downloadable as BaseDownloadableProductType;
use Webkul\Product\Type\Grouped as BaseGroupedProductType;
use Webkul\Product\Type\Simple as BaseSimpleProductType;
use Webkul\Sales\Repositories\OrderItemRepository as BaseOrderItemRepository;
use Webkul\Sales\Repositories\RefundItemRepository as BaseRefundItemRepository;
use Webkul\Sales\Repositories\ShipmentItemRepository as BaseShipmentItemRepository;
use Webkul\Sales\Repositories\ShipmentRepository as BaseShipmentRepository;

final class MarketplaceManager
{
    /**
     * Constructor to bind classes to the container
     *
     * @return void
     */
    public function __construct(private Application $app)
    {
        $this->registerMarketplaceModels();

        $this->registerMarketplaceRepositories();

        $this->registerMarketplaceDataGrids();

        $this->registerMarketplaceControllers();

        $this->registerMarketplaceCart();

        $this->registerMarketplaceHelpers();

        $this->registerMarketplaceProductTypes();

        $this->registerMarketplaceObservers();
    }

    /**
     * Register the marketplace models.
     */
    private function registerMarketplaceModels(): void
    {
        $this->app->concord->registerModel(VisitContract::class, Visit::class);

        $this->app->concord->registerModel(ProductContract::class, Product::class);

        $this->app->concord->registerModel(CartItemContract::class, CartItem::class);

        $this->app->concord->registerModel(ProductOrderedInventoryContract::class, ProductOrderedInventory::class);
    }

    /**
     * Register the marketplace repositories.
     */
    private function registerMarketplaceRepositories(): void
    {
        $this->app->bind(BaseChannelRepository::class, ChannelRepository::class);

        $this->app->bind(BaseProductRepository::class, ProductRepository::class);

        $this->app->bind(BaseOrderItemRepository::class, OrderItemRepository::class);

        $this->app->bind(BaseShipmentRepository::class, ShipmentRepository::class);

        $this->app->bind(BaseShipmentItemRepository::class, ShipmentItemRepository::class);

        $this->app->bind(BaseRefundItemRepository::class, RefundItemRepository::class);
    }

    /**
     * Register the marketplace data grids.
     */
    private function registerMarketplaceDataGrids(): void
    {
        $this->app->bind(BaseInventorySourcesDataGrid::class, InventorySourcesDataGrid::class);
    }

    /**
     * Register the marketplace controllers.
     */
    private function registerMarketplaceControllers(): void
    {
        $this->app->bind(BaseInventorySourceController::class, InventorySourceController::class);
    }

    /**
     * Register the marketplace cart.
     */
    private function registerMarketplaceCart(): void
    {
        $this->app->bind(BaseCart::class, Cart::class);
    }

    /**
     * Register the marketplace helpers.
     */
    private function registerMarketplaceHelpers(): void
    {
        $this->app->bind(BaseInventory::class, Inventory::class);
    }

    /**
     * Register the marketplace product types.
     */
    private function registerMarketplaceProductTypes(): void
    {
        $this->app->bind(BaseSimpleProductType::class, SimpleProductType::class);

        $this->app->bind(BaseDownloadableProductType::class, DownloadableProductType::class);

        $this->app->bind(BaseGroupedProductType::class, GroupedProductType::class);
    }

    /**
     * Register the marketplace observers.
     */
    private function registerMarketplaceObservers(): void
    {
        ProductReview::observe(ProductReviewObserver::class);
    }
}
