<?php

namespace Webkul\Marketplace\DataGrids\Seller;

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
        return DB::table('inventory_sources')
            ->where('vendor_id', seller()->id());
    }

    /**
     * Prepare columns.
     */
    public function prepareColumns(): void
    {
        $this->addColumn([
            'index'      => 'id',
            'label'      => trans('marketplace::app.seller.settings.inventory-sources.index.datagrid.id'),
            'type'       => 'integer',
            'filterable' => true,
            'sortable'   => true,
        ]);

        $this->addColumn([
            'index'      => 'code',
            'label'      => trans('marketplace::app.seller.settings.inventory-sources.index.datagrid.code'),
            'type'       => 'string',
            'searchable' => true,
            'filterable' => true,
            'sortable'   => true,
        ]);

        $this->addColumn([
            'index'      => 'name',
            'label'      => trans('marketplace::app.seller.settings.inventory-sources.index.datagrid.name'),
            'type'       => 'string',
            'searchable' => true,
            'filterable' => true,
            'sortable'   => true,
        ]);

        $this->addColumn([
            'index'      => 'priority',
            'label'      => trans('marketplace::app.seller.settings.inventory-sources.index.datagrid.priority'),
            'type'       => 'integer',
            'searchable' => true,
            'filterable' => true,
            'sortable'   => true,
        ]);

        $this->addColumn([
            'index'      => 'status',
            'label'      => trans('marketplace::app.seller.settings.inventory-sources.index.datagrid.status'),
            'type'       => 'boolean',
            'searchable' => true,
            'filterable' => true,
            'sortable'   => true,
            'closure'    => function ($row) {
                switch ($row->status) {
                    case Status::ACTIVE->value:
                        return '<p class="label-active">'.trans('marketplace::app.seller.settings.inventory-sources.index.datagrid.active').'</p>';

                    case Status::DISABLE->value:
                        return '<p class="label-info">'.trans('marketplace::app.seller.settings.inventory-sources.index.datagrid.inactive').'</p>';
                }
            },
        ]);
    }

    /**
     * Prepare actions.
     */
    public function prepareActions(): void
    {
        if (seller()->hasPermission('settings.inventory_sources.edit')) {
            $this->addAction([
                'icon'   => 'icon-arrow-right',
                'title'  => trans('marketplace::app.seller.settings.inventory-sources.index.datagrid.edit'),
                'method' => 'GET',
                'url'    => function ($row) {
                    return route('seller.settings.inventory_sources.edit', $row->id);
                },
            ]);
        }

        if (seller()->hasPermission('settings.inventory_sources.delete')) {
            $this->addAction([
                'icon'   => 'mp-delete-icon',
                'title'  => trans('marketplace::app.seller.settings.inventory-sources.index.datagrid.delete'),
                'method' => 'DELETE',
                'url'    => function ($row) {
                    return route('seller.settings.inventory_sources.delete', $row->id);
                },
            ]);
        }
    }
}
