<?php

namespace Webkul\Marketplace\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Webkul\Marketplace\Contracts\Refund as RefundContract;
use Webkul\Sales\Models\RefundProxy;

class Refund extends Model implements RefundContract
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'marketplace_refunds';

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
     * Get the Refund.
     */
    public function refund(): BelongsTo
    {
        return $this->belongsTo(RefundProxy::modelClass(), 'refund_id');
    }

    /**
     * Get the Refund items record.
     */
    public function items(): HasMany
    {
        return $this->hasMany(RefundItemProxy::modelClass(), 'marketplace_refund_id');
    }

    /**
     * Get the order that belongs to the refund.
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(OrderProxy::modelClass(), 'marketplace_order_id');
    }
}
