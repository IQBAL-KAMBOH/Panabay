<?php

namespace Webkul\Marketplace\Repositories;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\Str;
use Webkul\Core\Eloquent\Repository;
use Webkul\Marketplace\Contracts\Transaction;
use Webkul\Marketplace\Enums\Payout;

class TransactionRepository extends Repository
{
    /**
     * Specify Model class name
     */
    public function model(): string
    {
        return Transaction::class;
    }

    /**
     * Pay seller
     *
     * @return bool
     */
    public function paySeller(array $data)
    {
        $sellerOrder = app(OrderRepository::class)->findOneWhere([
            'order_id'              => $data['order_id'],
            'marketplace_seller_id' => $data['marketplace_seller_id'],
        ]);

        if (! $sellerOrder) {
            session()->flash('error', trans('marketplace::app.admin.orders.order-not-exist'));

            return;
        }

        $totalPaid = $this->scopeQuery(function ($query) use ($sellerOrder) {
            return $query->where('marketplace_transactions.marketplace_seller_id', $sellerOrder->marketplace_seller_id)
                ->where('marketplace_transactions.marketplace_order_id', $sellerOrder->id);
        })->sum('base_total');

        $amount = $sellerOrder->base_seller_total_invoiced - $totalPaid;

        if (! $amount) {
            session()->flash('error', trans('marketplace::app.admin.orders.no-amount-to-paid'));

            return;
        }

        Event::dispatch('marketplace.sales.seller.transaction.save.before');

        $transaction = $this->create([
            'type'                  => isset($data['type']) ? $data['type'] : 'Manual',
            'method'                => isset($data['method']) ? $data['method'] : 'Manual',
            'transaction_id'        => $data['order_id'].'-'.Str::random(10),
            'comment'               => $data['comment'],
            'base_total'            => $amount,
            'marketplace_order_id'  => $sellerOrder->id,
            'marketplace_seller_id' => $sellerOrder->marketplace_seller_id,
        ]);

        Event::dispatch('marketplace.sales.seller.transaction.save.after', [$transaction, $sellerOrder]);

        if (($amount + $totalPaid) == $sellerOrder->base_seller_total) {
            Event::dispatch('marketplace.sales.seller.transaction.order.save.before', $sellerOrder);

            app(OrderRepository::class)->update([
                'seller_payout_status' => Payout::STATUS_PAID->value,
            ], $sellerOrder->id);

            Event::dispatch('marketplace.sales.seller.transaction.order.save.after', $sellerOrder);
        }

        return $transaction;
    }
}
