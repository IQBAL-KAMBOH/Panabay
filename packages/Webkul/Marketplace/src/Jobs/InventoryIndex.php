<?php

namespace Webkul\Marketplace\Jobs;

use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Webkul\Marketplace\Helpers\Indexers\Inventory as InventoryIndexer;

class InventoryIndex implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(protected ?object $seller) {}

    /**
     * Execute the job.
     */
    public function handle(InventoryIndexer $inventoryIndexer): void
    {
        $inventoryIndexer->reIndexAll($this->seller);
    }
}
