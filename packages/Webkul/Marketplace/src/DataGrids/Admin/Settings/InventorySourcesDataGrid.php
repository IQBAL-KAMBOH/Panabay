<?php

namespace Webkul\Marketplace\DataGrids\Admin\Settings;

use Webkul\Admin\DataGrids\Settings\InventorySourcesDataGrid as DataGrid;

class InventorySourcesDataGrid extends DataGrid
{
    /**
     * Prepare query builder.
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function prepareQueryBuilder()
    {
        return parent::prepareQueryBuilder()->whereNull('vendor_id');
    }
}
