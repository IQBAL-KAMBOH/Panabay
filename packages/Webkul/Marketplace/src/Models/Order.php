<?php

namespace Webkul\Marketplace\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Webkul\Marketplace\Contracts\Order as OrderContract;
use Webkul\Sales\Models\OrderProxy;

class Order extends Model implements OrderContract
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'marketplace_orders';

    /**
     *  The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['_token'];

    /**
     * Define the status label.
     *
     * @var array
     */
    protected $statusLabel = [
        'pending'         => 'Pending',
        'pending_payment' => 'Pending Payment',
        'payment_request' => 'Payment Requested',
        'processing'      => 'Processing',
        'completed'       => 'Completed',
        'canceled'        => 'Canceled',
        'closed'          => 'Closed',
        'fraud'           => 'Fraud',
    ];

    /**
     * Returns the status label from status code
     */
    public function statusLabel(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->statusLabel[$this->status],
        );
    }

    /**
     * Return seller's base total due amount.
     */
    public function baseTotalDue(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->base_grand_total - $this->base_shipping_amount - $this->base_grand_total_invoiced + $this->base_shipping_invoiced,
        );
    }

    /**
     * Return seller's total due amount.
     */
    public function totalDue(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->grand_total - $this->shipping_amount - $this->grand_total_invoiced + $this->shipping_invoiced,
        );
    }

    /**
     * Get the seller that belongs to the order.
     */
    public function seller(): BelongsTo
    {
        return $this->belongsTo(SellerProxy::modelClass(), 'marketplace_seller_id');
    }

    /**
     * Get the order that belongs to the order.
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(OrderProxy::modelClass());
    }

    /**
     * Get the order items record associated with the order.
     */
    public function items(): HasMany
    {
        return $this->hasMany(OrderItemProxy::modelClass(), 'marketplace_order_id')
            ->whereNull('parent_id');
    }

    /**
     * Get the order shipments record associated with the order.
     */
    public function shipments(): HasMany
    {
        return $this->hasMany(ShipmentProxy::modelClass(), 'marketplace_order_id');
    }

    /**
     * Get the order invoices record associated with the order.
     */
    public function invoices(): HasMany
    {
        return $this->hasMany(InvoiceProxy::modelClass(), 'marketplace_order_id');
    }

    /**
     * Get the order Refunds record associated with the order.
     */
    public function refunds(): HasMany
    {
        return $this->hasMany(RefundProxy::modelClass(), 'marketplace_order_id');
    }

    /**
     * Get the transactions items record associated with the order.
     */
    public function transactions(): HasMany
    {
        return $this->hasMany(TransactionProxy::modelClass(), 'marketplace_order_id');
    }

    /**
     * Checks if new shipment is allow or not
     */
    public function canShip(): bool
    {
        if ($this->status == 'fraud') {
            return false;
        }

        foreach ($this->items as $sellerOrderItem) {
            if ($sellerOrderItem->item->qty_to_ship > 0) {
                return true;
            }
        }

        return false;
    }

    /**
     * Checks if new invoice is allow or not
     */
    public function canInvoice(): bool
    {
        if ($this->status == 'fraud') {
            return false;
        }

        foreach ($this->items as $sellerOrderItem) {
            if ($sellerOrderItem->item->qty_to_invoice > 0) {
                return true;
            }
        }

        return false;
    }

    /**
     * Checks if order could can canceled on not
     */
    public function canCancel(): bool
    {
        if ($this->status == 'fraud') {
            return false;
        }

        foreach ($this->items as $sellerOrderItem) {
            if ($sellerOrderItem->item->qty_to_cancel > 0) {
                return true;
            }
        }

        return false;
    }
}
