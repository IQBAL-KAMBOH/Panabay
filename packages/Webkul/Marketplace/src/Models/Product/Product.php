<?php

namespace Webkul\Marketplace\Models\Product;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Webkul\Core\Models\Visit;
use Webkul\Marketplace\Models\Product as MarketplaceProduct;
use Webkul\Product\Models\Product as BaseProduct;

class Product extends BaseProduct
{
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'type',
        'attribute_family_id',
        'sku',
        'parent_id',
        'additional',
    ];

    /**
     * Delete the visits when the product is deleted.
     */
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($product) {
            $product->visits()->delete();
        });
    }

    /**
     * Get the marketplace products that belongs to the product.
     */
    public function mp_products(): HasMany
    {
        return $this->hasMany(MarketplaceProduct::class);
    }

    /**
     * Get inventory source quantity.
     */
    public function mp_inventory_source_qty($inventorySourceId): int
    {
        return $this->inventories()
            ->where('inventory_source_id', $inventorySourceId)
            ->where('vendor_id', seller()->id())
            ->sum('qty');
    }

    /**
     * Get the visits for the product.
     */
    public function visits(): HasMany
    {
        $instance = new Visit;

        $relation = new HasMany(
            $instance->newQuery(),
            $this,
            "{$instance->getTable()}.visitable_id",
            $this->getKeyName()
        );

        return $relation->where('visitable_type', get_parent_class($this));
    }
}
