<?php

namespace Webkul\Marketplace\Listeners;

use Spatie\ResponseCache\Facades\ResponseCache;
use Webkul\Marketplace\Jobs\ProductIndex as ProductIndexJob;

class Configuration
{
    /**
     * After marketplace configuration save event.
     */
    public function afterSave()
    {
        if (
            request()->route()->getName() != 'admin.configuration.store'
            || ! $data = request()->get('marketplace')
        ) {
            return;
        }

        ResponseCache::forget('marketplace');

        if (
            core()->getConfigData('catalog.products.search.engine') == 'elastic'
            && core()->getConfigData('catalog.products.search.storefront_mode') == 'elastic'
        ) {
            ProductIndexJob::dispatch(reIndex: data_get($data, 'settings.general.status'));
        }
    }
}
