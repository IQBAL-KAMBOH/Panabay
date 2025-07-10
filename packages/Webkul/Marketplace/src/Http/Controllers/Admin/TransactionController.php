<?php

namespace Webkul\Marketplace\Http\Controllers\Admin;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Webkul\Marketplace\DataGrids\Admin\TransactionDataGrid;
use Webkul\Marketplace\Repositories\TransactionRepository;

class TransactionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(protected TransactionRepository $transactionRepository) {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View|JsonResponse
    {
        if ($request->ajax()) {
            return datagrid(TransactionDataGrid::class)->process();
        }

        return view('marketplace::admin.transactions.index');
    }

    /**
     * Show the view for the specified resource.
     */
    public function view(int $id): View
    {
        $transaction = $this->transactionRepository->with('order')->find($id);

        return view('marketplace::admin.transactions.view')
            ->with('transaction', $transaction);
    }
}
