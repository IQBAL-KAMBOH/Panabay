<?php

namespace Webkul\Marketplace\DataGrids\Admin;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Webkul\DataGrid\DataGrid;
use Webkul\Marketplace\Enums\Status;

class InventorySourcesDataGrid extends DataGrid
{
    /**
     * Prepare query builder.
     */
    public function prepareQueryBuilder(): Builder
    {
        $queryBuilder = DB::table('inventory_sources')
            ->select(
                'inventory_sources.*',
                'marketplace_sellers.name as seller_name',
                'marketplace_sellers.shop_title',
                'marketplace_sellers.url as shop_url',
            )
            ->join(
                'marketplace_sellers',
                'inventory_sources.vendor_id',
                'marketplace_sellers.id'
            );

        $this->addFilter('id', 'inventory_sources.id');
        $this->addFilter('name', 'inventory_sources.name');
        $this->addFilter('seller_name', 'marketplace_sellers.name');

        return $queryBuilder;
    }

    /**
     * Prepare columns.
     */
    public function prepareColumns(): void
    {
        $this->addColumn([
            'index'      => 'id',
            'label'      => trans('marketplace::app.admin.inventory-sources.index.datagrid.id'),
            'type'       => 'integer',
            'filterable' => true,
            'sortable'   => true,
        ]);

        $this->addColumn([
            'index'      => 'code',
            'label'      => trans('marketplace::app.admin.inventory-sources.index.datagrid.code'),
            'type'       => 'string',
            'searchable' => true,
            'filterable' => true,
            'sortable'   => true,
        ]);

        $this->addColumn([
            'index'      => 'name',
            'label'      => trans('marketplace::app.admin.inventory-sources.index.datagrid.name'),
            'type'       => 'string',
            'searchable' => true,
            'filterable' => true,
            'sortable'   => true,
        ]);

        $this->addColumn([
            'index'      => 'seller_name',
            'label'      => trans('marketplace::app.admin.inventory-sources.index.datagrid.seller-name'),
            'type'       => 'string',
            'searchable' => true,
            'filterable' => true,
            'sortable'   => true,
        ]);

        $this->addColumn([
            'index'      => 'shop_title',
            'label'      => trans('marketplace::app.admin.inventory-sources.index.datagrid.shop-title'),
            'type'       => 'string',
            'searchable' => true,
            'filterable' => true,
            'sortable'   => true,
        ]);

        $this->addColumn([
            'index'      => 'status',
            'label'      => trans('marketplace::app.admin.inventory-sources.index.datagrid.status'),
            'type'       => 'boolean',
            'searchable' => true,
            'filterable' => true,
            'sortable'   => true,
            'closure'    => function ($row) {
                switch ($row->status) {
                    case Status::ACTIVE->value:
                        return '<p class="label-active">'.trans('marketplace::app.admin.inventory-sources.index.datagrid.active').'</p>';

                    case Status::DISABLE->value:
                        return '<p class="label-info">'.trans('marketplace::app.admin.inventory-sources.index.datagrid.inactive').'</p>';
                }
            },
        ]);
    }

    /**
     * Prepare actions.
     */
    public function prepareActions(): void
    {
        if (bouncer()->hasPermission('marketplace.inventory_sources.view')) {
            $this->addAction([
                'icon'   => 'icon-sort-right',
                'title'  => trans('marketplace::app.admin.inventory-sources.index.datagrid.edit'),
                'method' => 'GET',
                'url'    => function ($row) {
                    return route('admin.marketplace.inventory_sources.view', $row->id);
                },
            ]);
        }
    }
}
