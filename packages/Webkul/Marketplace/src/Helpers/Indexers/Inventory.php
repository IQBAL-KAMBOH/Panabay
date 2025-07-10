<?php

namespace Webkul\Marketplace\Helpers\Indexers;

use Webkul\Marketplace\Repositories\ProductRepository;
use Webkul\Product\Contracts\Product;
use Webkul\Product\Helpers\Indexers\Inventory as BaseInventory;

class Inventory extends BaseInventory
{
    /**
     * Default batch size
     */
    protected const BATCH_SIZE = 100;

    /**
     * Vendor ID
     *
     * @var int
     */
    protected $vendorId = 0;

    /**
     * Reindex all products
     *
     * @param  object  $seller
     * @return void
     */
    public function reIndexAll($seller)
    {
        while (true) {
            $paginator = $this->productRepository->scopeQuery(function ($query) use ($seller) {
                return $query
                    ->join('marketplace_products', 'products.id', '=', 'marketplace_products.product_id')
                    ->select('products.*')
                    ->distinct()
                    ->where('marketplace_products.marketplace_seller_id', $seller->id);
            })
                ->with([
                    'inventories',
                    'ordered_inventories',
                    'inventory_indices',
                ])
                ->whereIn('type', ['simple', 'virtual'])
                ->cursorPaginate(self::BATCH_SIZE);

            $this->reindexBatch($paginator->items());

            if (! $cursor = $paginator->nextCursor()) {
                break;
            }

            request()->query->add(['cursor' => $cursor->encode()]);
        }

        request()->query->remove('cursor');
    }

    /**
     * Reindex products by batch size
     *
     * @return void
     */
    public function reindexBatch($products)
    {
        $newIndices = [];

        foreach ($products as $product) {
            $this->setProduct($product);

            /**
             * Get all the seller products (owner and assigned)
             */
            $sellerProducts = app(ProductRepository::class)
                ->where('product_id', $product->id)
                ->get();

            /**
             * Set the vendor ID to the owner (is_owner = 1)
             * This is the default vendor ID for the product
             */
            $this->vendorId = data_get($sellerProducts->where('is_owner', 1)->first(), 'marketplace_seller_id', 0);

            /**
             * Get all the seller ids for the assigned sellers (is_owner = 0)
             * This is used to update the inventory indices for all the assigned sellers
             */
            $assignedSellerIds = $sellerProducts
                ->where('is_owner', 0)
                ->pluck('marketplace_seller_id');

            /**
             * If there are any assigned sellers, we need to update the inventory indices for all the sellers
             * including the admin (owner) that id will be 0
             * If there are no assigned sellers, we only need to update the inventory indices for the admin (owner)
             * or the vendor ID that is set above
             */
            $vendorIds = $assignedSellerIds->isNotEmpty()
                ? $assignedSellerIds->merge([0])
                : [$this->vendorId];

            foreach ($vendorIds as $vendorId) {
                $this->vendorId = $vendorId;

                $this->updateOrCreateInventoryIndices($product, $newIndices);
            }
        }

        $this->productInventoryIndexRepository->insert($newIndices);
    }

    /**
     * Returns product remaining quantity
     *
     * @return int
     */
    public function getQuantity()
    {
        $channelInventorySourceIds = $this->channel->inventory_sources->where('status', 1)->pluck('id');

        $qty = 0;

        foreach ($this->product->inventories->where('vendor_id', $this->vendorId) as $inventory) {
            if (is_numeric($channelInventorySourceIds->search($inventory->inventory_source_id))) {
                $qty += $inventory->qty;
            }
        }

        $orderedInventory = $this->product->ordered_inventories
            ->where('vendor_id', $this->vendorId)
            ->where('channel_id', $this->channel->id)
            ->first();

        if ($orderedInventory) {
            $qty -= $orderedInventory->qty;
        }

        return $qty;
    }

    /**
     * Update or Create inventory Indices.
     *
     * @return void
     */
    public function updateOrCreateInventoryIndices(Product $product, array &$newIndices)
    {
        foreach ($this->getChannels() as $channel) {
            $this->setChannel($channel);

            $channelIndex = $product->inventory_indices
                ->where('channel_id', $channel->id)
                ->where('product_id', $product->id)
                ->where('vendor_id', $this->vendorId)
                ->first();

            $newIndex = $this->getIndices();

            data_set($newIndex, 'vendor_id', $this->vendorId);

            if ($channelIndex) {
                $oldIndex = collect($channelIndex->toArray())
                    ->except('id', 'created_at', 'updated_at')
                    ->toArray();

                $isIndexChanged = $this->isIndexChanged(
                    $oldIndex,
                    $newIndex
                );

                if ($isIndexChanged) {
                    $this->productInventoryIndexRepository->update($newIndex, $channelIndex->id);
                }
            } else {
                $newIndices[] = $newIndex;
            }
        }
    }
}
