<?php

namespace Webkul\Marketplace\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Webkul\Marketplace\Contracts\Shipment as ShipmentContract;
use Webkul\Sales\Models\ShipmentProxy;

class Shipment extends Model implements ShipmentContract
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'marketplace_shipments';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    /**
     * Get the order that belongs to the item.
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(OrderProxy::modelClass(), 'marketplace_order_id');
    }

    /**
     * Get the shipment that belongs to the shipment.
     */
    public function shipment(): BelongsTo
    {
        return $this->belongsTo(ShipmentProxy::modelClass());
    }

    /**
     * Get the shipment items record associated with the shipment.
     */
    public function items(): HasMany
    {
        return $this->hasMany(ShipmentItemProxy::modelClass(), 'marketplace_shipment_id');
    }
}
