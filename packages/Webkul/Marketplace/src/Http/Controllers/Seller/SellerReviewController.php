<?php

namespace Webkul\Marketplace\Http\Controllers\Seller;

use Illuminate\Http\Request;
use Webkul\Marketplace\DataGrids\Seller\SellerReviewDataGrid;

class SellerReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return datagrid(SellerReviewDataGrid::class)->process();
        }

        return view('marketplace::seller.seller-reviews.index');
    }
}
