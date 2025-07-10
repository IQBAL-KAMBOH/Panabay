<?php

namespace Webkul\Marketplace\Listeners;

use Webkul\Marketplace\Repositories\SellerRepository;

class InventorySource
{
    /**
     * Create a new customer event listener instance.
     */
    public function __construct(protected SellerRepository $sellerRepository) {}

    /**
     * After create event.
     */
    public function afterCreate($inventorySource): void
    {
        if (is_null($inventorySource->vendor_id)) {
            return;
        }

        $seller = $this->sellerRepository->with('channels')->find($inventorySource->vendor_id);

        foreach ($seller->channels as $channel) {
            $channel->inventory_sources()->attach([$inventorySource->id]);
        }
    }
}
