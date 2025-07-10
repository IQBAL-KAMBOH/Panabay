<?php

namespace Webkul\Marketplace\DataGrids\Seller;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Webkul\DataGrid\DataGrid;

class TransactionDataGrid extends DataGrid
{
    /**
     * Prepare query builder.
     */
    public function prepareQueryBuilder(): Builder
    {
        return DB::table('marketplace_transactions')
            ->select('marketplace_transactions.*')
            ->where('marketplace_seller_id', seller()->id());
    }

    /**
     * Prepare columns.
     */
    public function prepareColumns(): void
    {
        $this->addColumn([
            'index'           => 'id',
            'label'           => trans('marketplace::app.seller.transactions.index.datagrid.id'),
            'type'            => 'integer',
            'filterable'      => true,
            'filterable_type' => 'number',
            'searchable'      => false,
            'sortable'        => true,
        ]);

        $this->addColumn([
            'index'      => 'transaction_id',
            'label'      => trans('marketplace::app.seller.transactions.index.datagrid.transaction-id'),
            'type'       => 'string',
            'filterable' => true,
            'sortable'   => false,
            'searchable' => true,
        ]);

        $this->addColumn([
            'index'      => 'comment',
            'label'      => trans('marketplace::app.seller.transactions.index.datagrid.comment'),
            'type'       => 'string',
            'filterable' => true,
            'sortable'   => false,
            'searchable' => true,
        ]);

        $this->addColumn([
            'index'           => 'base_total',
            'label'           => trans('marketplace::app.seller.transactions.index.datagrid.total'),
            'type'            => 'string',
            'filterable'      => true,
            'filterable_type' => 'price',
            'searchable'      => true,
            'sortable'        => true,
            'closure'         => function ($row) {
                return core()->formatBasePrice($row->base_total);
            },
        ]);
    }

    /**
     * Prepare actions.
     */
    public function prepareActions(): void
    {
        if (seller()->hasPermission('transactions.view')) {
            $this->addAction([
                'icon'   => 'mp-eye-icon',
                'method' => 'GET',
                'title'  => 'View',
                'url'    => function ($row) {
                    return route('seller.transactions.view', $row->id);
                },
            ]);
        }
    }
}
