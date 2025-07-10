<?php

namespace Webkul\Marketplace\Repositories\Core;

use Webkul\Core\Repositories\ChannelRepository as BaseChannelRepository;
use Webkul\Inventory\Repositories\InventorySourceRepository;

class ChannelRepository extends BaseChannelRepository
{
    /**
     * Update.
     *
     * @param  int  $id
     * @return \Webkul\Core\Contracts\Channel
     */
    public function update(array $data, $id)
    {
        $channel = $this->findOrFail($id);

        $channel->update($data);

        $channel->locales()->sync($data['locales']);

        $channel->currencies()->sync($data['currencies']);

        /*
        | ----------------------------------------------
        | Marketplace section starts here
        | ----------------------------------------------
        */

        $adminInventorySourceIds = $this->getAdminInventorySourceIds();

        if (! empty($adminInventorySourceIds)) {
            $channel->inventory_sources()->detach($adminInventorySourceIds);
        }

        if (! empty($data['inventory_sources'])) {
            $channel->inventory_sources()->attach($data['inventory_sources']);
        }

        /**
         * ----------------------------------------------
         * Marketplace section ends here
         * ----------------------------------------------
         */
        $this->uploadImages($data, $channel);

        $this->uploadImages($data, $channel, 'favicon');

        return $channel;
    }

    /**
     * Get admin inventory source ids.
     */
    protected function getAdminInventorySourceIds(): array
    {
        return app(InventorySourceRepository::class)
            ->whereNull('vendor_id')
            ->pluck('id')
            ->toArray();
    }
}
