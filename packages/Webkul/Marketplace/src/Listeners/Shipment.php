<?php

namespace Webkul\Marketplace\Listeners;

use Webkul\Marketplace\Repositories\ShipmentRepository;

class Shipment
{
    /**
     * After sales shipment creation, create marketplace shipment
     */
    public function afterSave($shipment)
    {
        app(ShipmentRepository::class)->create(['shipment' => $shipment]);
    }
}
