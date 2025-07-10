<?php

namespace Webkul\Marketplace\DataGrids\Seller;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Webkul\DataGrid\DataGrid;

class RoleDataGrid extends DataGrid
{
    /**
     * Prepare query builder.
     */
    public function prepareQueryBuilder(): Builder
    {
        return DB::table('marketplace_roles')
            ->select('id', 'name', 'permission_type')
            ->where('marketplace_seller_id', seller()->id());
    }

    /**
     * Add Columns.
     */
    public function prepareColumns(): void
    {
        $this->addColumn([
            'index'      => 'id',
            'label'      => trans('marketplace::app.seller.settings.roles.index.datagrid.id'),
            'type'       => 'integer',
            'filterable' => true,
            'sortable'   => true,
        ]);

        $this->addColumn([
            'index'      => 'name',
            'label'      => trans('marketplace::app.seller.settings.roles.index.datagrid.name'),
            'type'       => 'string',
            'searchable' => true,
            'filterable' => true,
            'sortable'   => true,
        ]);

        $this->addColumn([
            'index'              => 'permission_type',
            'label'              => trans('marketplace::app.seller.settings.roles.index.datagrid.permission-type'),
            'type'               => 'string',
            'searchable'         => true,
            'filterable'         => true,
            'filterable_type'    => 'dropdown',
            'filterable_options' => [
                [
                    'label' => trans('marketplace::app.seller.settings.roles.index.datagrid.custom'),
                    'value' => 'custom',
                ],
                [
                    'label' => trans('marketplace::app.seller.settings.roles.index.datagrid.all'),
                    'value' => 'all',
                ],
            ],
            'sortable'   => true,
        ]);
    }

    /**
     * Prepare actions.
     */
    public function prepareActions(): void
    {
        if (seller()->hasPermission('roles.edit')) {
            $this->addAction([
                'icon'   => 'icon-arrow-right',
                'title'  => trans('marketplace::app.seller.settings.roles.index.datagrid.edit'),
                'method' => 'GET',
                'url'    => function ($row) {
                    return route('seller.settings.roles.edit', $row->id);
                },
            ]);
        }

        if (seller()->hasPermission('roles.delete')) {
            $this->addAction([
                'icon'   => 'mp-delete-icon',
                'title'  => trans('marketplace::app.seller.settings.roles.index.datagrid.delete'),
                'method' => 'DELETE',
                'url'    => function ($row) {
                    return route('seller.settings.roles.delete', $row->id);
                },
            ]);
        }
    }
}
