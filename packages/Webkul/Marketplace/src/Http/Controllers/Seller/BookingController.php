<?php

namespace Webkul\Marketplace\Http\Controllers\Seller;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Webkul\Marketplace\DataGrids\Seller\BookingDataGrid;
use Webkul\Marketplace\Repositories\BookingRepository;

class BookingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(protected BookingRepository $bookingRepository) {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return match ($request->query('view_type')) {
                'calendar' => new JsonResponse(['bookings' => $this->getBookings($request)]),
                default    => datagrid(BookingDataGrid::class)->process(),
            };
        }

        return view('marketplace::seller.bookings.index');
    }

    /**
     * Returns a listing of the resource.
     */
    public function getBookings(Request $request)
    {
        $start = $request->get('start')
            ? Carbon::createFromTimeString($request->get('start').' 00:00:01')
            : Carbon::now()->startOfWeek()->format('Y-m-d H:i:s');

        $end = $request->get('end')
            ? Carbon::createFromTimeString($request->get('end').' 23:59:59')
            : Carbon::now()->endOfWeek()->format('Y-m-d H:i:s');

        return $this->bookingRepository->getBookings(
            [strtotime($start), strtotime($end)],
            seller()->user()
        );
    }
}
