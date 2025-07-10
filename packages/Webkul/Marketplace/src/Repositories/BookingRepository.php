<?php

namespace Webkul\Marketplace\Repositories;

use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Webkul\BookingProduct\Contracts\Booking;
use Webkul\Core\Eloquent\Repository;
use Webkul\Marketplace\Contracts\Seller;
use Webkul\Sales\Models\OrderAddress;

class BookingRepository extends Repository
{
    /**
     * Specify Model class name
     */
    public function model(): string
    {
        return Booking::class;
    }

    /**
     * Get all bookings for the given date and time range.
     */
    public function getBookings(array $dateRange, Seller $seller): Collection
    {
        $bookings = $this->model->query()
            ->with(['order.addresses' => function ($query) {
                $query->where('address_type', OrderAddress::ADDRESS_TYPE_BILLING);
            }])
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
                'marketplace_orders.order_id'
            )
            ->where('marketplace_orders.marketplace_seller_id', $seller->id)
            ->whereBetween('bookings.from', $dateRange)
            ->get();

        return $bookings->map(function ($booking) {
            $address = $booking->order->addresses->first();

            return [
                'start'          => Carbon::createFromTimestamp($booking->from)->format('Y-m-d h:i A'),
                'end'            => Carbon::createFromTimestamp($booking->to)->format('Y-m-d h:i A'),
                'order_id'       => $booking->order_id,
                'order_status'   => $booking->order->status,
                'order_total'    => $booking->order->grand_total,
                'created_at'     => $booking->order->created_at->format('d M, Y H:i A'),
                'customer_name'  => $address->name,
                'customer_email' => $address->email,
                'customer_phone' => $address->phone,
                'address'        => implode(', ', [
                    $address->address,
                    $address->city,
                    $address->state,
                    $address->country,
                    $address->postcode,
                ]),
            ];
        });
    }
}
