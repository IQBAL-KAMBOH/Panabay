<?php

namespace Webkul\Marketplace\Http\Controllers\Admin;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Webkul\Marketplace\DataGrids\Admin\PaymentRequestDataGrid;
use Webkul\Marketplace\Repositories\TransactionRepository;

class PaymentRequestController extends Controller
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
            return datagrid(PaymentRequestDataGrid::class)->process();
        }

        return view('marketplace::admin.payment-request.index');
    }

    /**
     * Update the order for payment and sends mails to admin.
     */
    public function pay(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'order_id'              => ['required'],
            'marketplace_seller_id' => ['required'],
            'comment'               => ['required'],
        ]);

        $this->transactionRepository->paySeller($validated);

        return new JsonResponse([
            'message' => trans('marketplace::app.admin.payment-request.index.payment-success'),
        ]);
    }
}
