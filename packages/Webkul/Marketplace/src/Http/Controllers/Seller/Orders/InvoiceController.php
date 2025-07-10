<?php

namespace Webkul\Marketplace\Http\Controllers\Seller\Orders;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Event;
use Webkul\Core\Traits\PDFHandler;
use Webkul\Marketplace\Http\Controllers\Seller\Controller;
use Webkul\Marketplace\Repositories\InvoiceRepository;
use Webkul\Marketplace\Repositories\OrderRepository;
use Webkul\Sales\Repositories\InvoiceRepository as BaseInvoiceRepository;

class InvoiceController extends Controller
{
    use PDFHandler;

    /**
     * Create a new controller instance.
     */
    public function __construct(
        protected BaseInvoiceRepository $baseInvoiceRepository,
        protected InvoiceRepository $invoiceRepository,
        protected OrderRepository $orderRepository
    ) {}

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request, int $orderId)
    {
        $sellerOrder = $this->orderRepository->findOneWhere([
            'order_id'              => $orderId,
            'marketplace_seller_id' => seller()->id(),
        ]);

        if (! $sellerOrder->canInvoice()) {
            return back()->withError(trans('marketplace::app.seller.orders.invoices.permission-error'));
        }

        $request->validate([
            'invoice.items.*' => ['required', 'numeric', 'min:0'],
        ]);

        $data = $request->input();

        $haveProductToInvoice = false;

        foreach ($data['invoice']['items'] as $qty) {
            if ($qty) {
                $haveProductToInvoice = true;

                break;
            }
        }

        if (! $haveProductToInvoice) {
            return back()->withError(trans('marketplace::app.seller.orders.invoices.qty-error'));
        }

        Event::dispatch('marketplace.seller.account.orders.invoice.create.before', $orderId);

        $invoice = $this->baseInvoiceRepository->create(array_merge($data, ['order_id' => $orderId]));

        Event::dispatch('marketplace.seller.account.orders.invoice.create.after', $invoice);

        return back()->withSuccess(trans('marketplace::app.seller.orders.invoices.invoice-success'));
    }

    /**
     * Print and download the for the specified resource.
     *
     * @return Response
     */
    public function print(int $id)
    {
        $invoice = $this->invoiceRepository->findOrFail($id);

        return $this->downloadPDF(
            view('marketplace::seller.orders.view.invoices.pdf', compact('invoice'))->render(),
            'invoice-'.$invoice->created_at->format('d-m-Y').'.pdf'
        );
    }
}
