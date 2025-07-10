<?php

namespace Webkul\Marketplace\Jobs;

use Faker\Factory;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Webkul\Inventory\Repositories\InventorySourceRepository;

class InventorySource implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(protected object $seller) {}

    /**
     * Execute the job.
     */
    public function handle(InventorySourceRepository $inventorySourceRepository): void
    {
        $faker = Factory::create($this->seller->locale ?? 'en_US');

        $inventorySource = $inventorySourceRepository->create([
            'city'           => $faker->city,
            'code'           => 'vendor'.preg_replace('/[^a-zA-Z0-9]/', '', $this->seller->url),
            'contact_email'  => $faker->email,
            'contact_name'   => $faker->name,
            'contact_number' => $faker->unique()->numerify('##########'),
            'country'        => $faker->country,
            'name'           => $faker->company,
            'postcode'       => $faker->postcode,
            'state'          => $faker->state,
            'status'         => 1,
            'street'         => $faker->address,
            'vendor_id'      => $this->seller->id,
        ]);

        $sellerChannel = $this->seller->channels()->first();

        $sellerChannel && $sellerChannel->inventory_sources()->attach($inventorySource->id);
    }
}
