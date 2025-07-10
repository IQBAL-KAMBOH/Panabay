<?php

namespace Webkul\Marketplace\Facades;

use Illuminate\Support\Facades\Facade;
use Webkul\Marketplace\Extension as MarketplaceExtension;

class Extension extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return MarketplaceExtension::class;
    }
}
