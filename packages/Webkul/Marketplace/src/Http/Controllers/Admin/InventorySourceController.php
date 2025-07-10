<?php

namespace Webkul\Marketplace\Http\Controllers\Admin;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Webkul\Core\Repositories\CountryStateRepository;
use Webkul\Inventory\Repositories\InventorySourceRepository;
use Webkul\Marketplace\DataGrids\Admin\InventorySourcesDataGrid;
use Webkul\Marketplace\Http\Controllers\Seller\Controller;
use Webkul\Marketplace\Repositories\SellerRepository;

class InventorySourceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected InventorySourceRepository $inventorySourceRepository,
        protected SellerRepository $sellerRepository,
        protected CountryStateRepository $countryStateRepository
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View|JsonResponse
    {
        if ($request->ajax()) {
            return datagrid(InventorySourcesDataGrid::class)->process();
        }

        return view('marketplace::admin.inventory-sources.index');
    }

    /**
     * Display the specified resource.
     */
    public function view(int $id): JsonResponse
    {
        $inventorySource = $this->inventorySourceRepository->findOrFail($id);

        $seller = $this->sellerRepository->find($inventorySource->vendor_id);

        return new JsonResponse([
            'data' => [
                ...$inventorySource->toArray(),
                'shop_title'  => $seller->shop_title,
                'seller_name' => $seller->name,
                'country'     => core()->country_name($inventorySource->country),
                'state'       => $this->countryStateRepository->findOneWhere([
                    'country_code' => $inventorySource->country,
                    'code'         => $inventorySource->state,
                ])?->default_name ?? $inventorySource->state,
            ],
        ]);
    }
}
