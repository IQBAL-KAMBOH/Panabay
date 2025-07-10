<?php

namespace Webkul\Marketplace\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Webkul\Marketplace\Contracts\OrderItem as OrderItemContract;
use Webkul\Sales\Models\OrderItemProxy;

class OrderItem extends Model implements OrderItemContract
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'marketplace_order_items';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['_token'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the item that belongs to the item.
     */
    public function item(): BelongsTo
    {
        return $this->belongsTo(OrderItemProxy::modelClass(), 'order_item_id');
    }

    /**
     * Get the order that belongs to the item.
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(OrderProxy::modelClass(), 'marketplace_order_id');
    }

    /**
     * Get the product that belongs to the item.
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(ProductProxy::modelClass(), 'marketplace_product_id');
    }

    /**
     * Get the child item record associated with the order item.
     */
    public function child(): HasOne
    {
        return $this->hasOne(OrderItemProxy::modelClass(), 'parent_id');
    }

    /**
     * Get the children items.
     */
    public function children(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id');
    }
}
