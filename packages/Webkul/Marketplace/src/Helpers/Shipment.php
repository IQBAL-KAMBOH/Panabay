<?php

namespace Webkul\Marketplace\Helpers;

use Illuminate\Database\Eloquent\Collection;
use Webkul\Sales\Contracts\Order;

class Shipment
{
    /**
     * Get all inventory sources for the order.
     */
    public function getAllInventorySources(Order $order): Collection
    {
        $sellerIds = $order->items
            ->pluck('additional.seller_info.seller_id')
            ->filter()
            ->unique()
            ->values()
            ->toArray();

        $hasAdminProducts = $order->items->contains(function ($item) {
            return empty($item['additional']['seller_info']['seller_id']);
        });

        return $order->channel
            ->inventory_sources()
            ->where(function ($query) use ($sellerIds, $hasAdminProducts) {
                if (! empty($sellerIds)) {
                    $query->whereIn('vendor_id', $sellerIds);
                }

                if ($hasAdminProducts) {
                    $query->orWhereNull('vendor_id');
                }
            })
            ->distinct()
            ->get();
    }
}
