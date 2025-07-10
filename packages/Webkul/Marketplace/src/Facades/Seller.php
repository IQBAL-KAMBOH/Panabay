<?php

namespace Webkul\Marketplace\Facades;

use Illuminate\Support\Facades\Facade;
use Webkul\Marketplace\Seller as MarketplaceSeller;

class Seller extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return MarketplaceSeller::class;
    }
}
