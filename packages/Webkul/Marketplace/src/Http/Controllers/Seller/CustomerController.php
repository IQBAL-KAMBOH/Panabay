<?php

namespace Webkul\Marketplace\Http\Controllers\Seller;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Webkul\Marketplace\DataGrids\Seller\CustomerDataGrid;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View|JsonResponse
    {
        if ($request->ajax()) {
            return datagrid(CustomerDataGrid::class)->process();
        }

        return view('marketplace::seller.customers.index');
    }
}
