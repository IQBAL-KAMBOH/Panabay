<?php

namespace Webkul\Marketplace\DataGrids\Seller;

use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Webkul\DataGrid\DataGrid;

class BookingDataGrid extends DataGrid
{
    /**
     * Prepare query builder.
     */
    public function prepareQueryBuilder(): Builder
    {
        $queryBuilder = DB::table('bookings')
            ->leftJoin(
                'marketplace_order_items',
                'marketplace_order_items.order_item_id',
                '=',
                'bookings.order_item_id'
            )
            ->leftJoin(
                'marketplace_orders',
                'marketplace_orders.id',
                '=',
                'marketplace_order_items.marketplace_order_id'
            )
            ->select(
                'bookings.*',
                'marketplace_orders.order_id',
            )
            ->where('marketplace_orders.marketplace_seller_id', seller()->id);

        $this->addFilter('id', 'bookings.id');
        $this->addFilter('order_id', 'marketplace_orders.id');
        $this->addFilter('qty', 'bookings.qty');
        $this->addFilter('created_at', 'bookings.created_at');

        return $queryBuilder;
    }

    /**
     * Prepare columns.
     */
    public function prepareColumns(): void
    {
        $this->addColumn([
            'index'      => 'id',
            'label'      => trans('marketplace::app.seller.bookings.index.datagrid.id'),
            'type'       => 'string',
            'searchable' => false,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'order_id',
            'label'      => trans('marketplace::app.seller.bookings.index.datagrid.order-id'),
            'type'       => 'string',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'qty',
            'label'      => trans('marketplace::app.seller.bookings.index.datagrid.qty'),
            'type'       => 'string',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'           => 'from',
            'label'           => trans('marketplace::app.seller.bookings.index.datagrid.from'),
            'type'            => 'datetime',
            'searchable'      => true,
            'sortable'        => true,
            'filterable'      => true,
            'filterable_type' => 'datetime_range',
            'closure'         => function ($value) {
                return Carbon::createFromTimestamp($value->from)->format('d M, Y H:i A');
            },
        ]);

        $this->addColumn([
            'index'           => 'to',
            'label'           => trans('marketplace::app.seller.bookings.index.datagrid.to'),
            'type'            => 'datetime',
            'searchable'      => true,
            'sortable'        => true,
            'filterable'      => true,
            'filterable_type' => 'datetime_range',
            'closure'         => function ($value) {
                return Carbon::createFromTimestamp($value->to)->format('d M, Y H:i A');
            },
        ]);
    }

    /**
     * Prepare actions.
     */
    public function prepareActions(): void
    {
        if (seller()->hasPermission('orders.view')) {
            $this->addAction([
                'icon'   => 'icon-arrow-right',
                'title'  => trans('marketplace::app.seller.bookings.index.datagrid.view'),
                'method' => 'GET',
                'url'    => function ($row) {
                    return route('seller.orders.view', $row->order_id);
                },
            ]);
        }
    }
}
