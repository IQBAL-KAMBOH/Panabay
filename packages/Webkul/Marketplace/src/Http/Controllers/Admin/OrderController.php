<?php

namespace Webkul\Marketplace\Http\Controllers\Admin;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Webkul\Marketplace\DataGrids\Admin\OrderDataGrid;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View|JsonResponse
    {
        if ($request->ajax()) {
            return datagrid(OrderDataGrid::class)->process();
        }

        return view('marketplace::admin.orders.index');
    }
}
