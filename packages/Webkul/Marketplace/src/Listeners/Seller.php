<?php

namespace Webkul\Marketplace\Listeners;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Webkul\Marketplace\Jobs\InventoryIndex as InventoryIndexJob;
use Webkul\Marketplace\Jobs\InventorySource as InventorySourceJob;
use Webkul\Marketplace\Jobs\ProductIndex as ProductIndexJob;
use Webkul\Marketplace\Mail\NewSellerNotification;
use Webkul\Marketplace\Mail\SellerApprovalNotification;
use Webkul\Marketplace\Mail\SellerUpdateNotification;
use Webkul\Marketplace\Mail\SellerWelcomeNotification;

class Seller
{
    /**
     * Handle seller create event.
     */
    public function afterCreate($seller): void
    {
        if ($this->hasParent($seller)) {
            return;
        }

        $this->queueMail(new NewSellerNotification($seller), core()->getAdminEmailDetails());

        $this->queueMail(new SellerWelcomeNotification($seller));

        $seller->is_approved && $this->queueMail(new SellerApprovalNotification($seller));

        $this->dispatchJob(fn () => InventorySourceJob::dispatch($seller));
    }

    /**
     * Handle seller update event.
     */
    public function afterUpdate($seller): void
    {
        if ($this->hasParent($seller)) {
            return;
        }

        $this->queueMail(new SellerUpdateNotification($seller));

        $this->syncInventorySourcesWithChannels($seller);

        /**
         * If the seller is approved, we need to reindex the products.
         */
        if (
            $seller->wasChanged('is_approved')
            && core()->getConfigData('catalog.products.search.engine') === 'elastic'
            && core()->getConfigData('catalog.products.search.storefront_mode') === 'elastic'
        ) {
            $this->dispatchJob(fn () => ProductIndexJob::dispatch($seller, $seller->is_approved));
        }
    }

    /**
     * Sync seller inventory sources with channels.
     */
    private function syncInventorySourcesWithChannels($seller): void
    {
        $seller->load(['inventory_sources', 'channels']);

        if (
            $seller->inventory_sources->isEmpty()
            || $seller->channels->isEmpty()
        ) {
            return;
        }

        $inventorySourceIds = $seller->inventory_sources->pluck('id')->toArray();

        DB::table('channel_inventory_sources')
            ->whereIn('inventory_source_id', $inventorySourceIds)
            ->delete();

        foreach ($seller->channels as $channel) {
            $channel->inventory_sources()->attach($inventorySourceIds);
        }

        $this->dispatchJob(fn () => InventoryIndexJob::dispatch($seller));
    }

    /**
     * Queue a mail and silently handle failures.
     */
    private function queueMail($mailable, $admin = null): void
    {
        try {
            if ($admin) {
                Mail::to($admin['email'])->send($mailable);
            } else {
                Mail::queue($mailable);
            }
        } catch (Exception $e) {
        }
    }

    /**
     * Dispatch a job and silently handle failures.
     */
    private function dispatchJob(callable $job): void
    {
        try {
            $job();
        } catch (Exception $e) {
        }
    }

    /**
     * Check if the seller is a child.
     */
    private function hasParent($seller): bool
    {
        return ! is_null($seller->parent_id);
    }
}
