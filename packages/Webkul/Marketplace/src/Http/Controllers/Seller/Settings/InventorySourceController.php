<?php

namespace Webkul\Marketplace\Http\Controllers\Seller\Settings;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Illuminate\View\View;
use Webkul\Inventory\Repositories\InventorySourceRepository;
use Webkul\Marketplace\DataGrids\Seller\InventorySourcesDataGrid;
use Webkul\Marketplace\Http\Controllers\Seller\Controller;
use Webkul\Marketplace\Http\Requests\InventorySourceRequest;

class InventorySourceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(protected InventorySourceRepository $inventorySourceRepository) {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View|JsonResponse
    {
        if ($request->ajax()) {
            return datagrid(InventorySourcesDataGrid::class)->process();
        }

        return view('marketplace::seller.settings.inventory-sources.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('marketplace::seller.settings.inventory-sources.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InventorySourceRequest $request): RedirectResponse
    {
        Event::dispatch('inventory.inventory_source.create.before');

        $inventorySource = $this->inventorySourceRepository->create(array_merge($request->validated(), [
            'vendor_id' => seller()->id(),
        ]));

        Event::dispatch('inventory.inventory_source.create.after', $inventorySource);

        return to_route('seller.settings.inventory_sources.index')
            ->withSuccess(trans('marketplace::app.seller.settings.inventory-sources.create-success'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id): View
    {
        $inventorySource = $this->inventorySourceRepository->where('vendor_id', seller()->id())
            ->findOrFail($id);

        return view('marketplace::seller.settings.inventory-sources.edit')
            ->with('inventorySource', $inventorySource);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InventorySourceRequest $request, int $id): RedirectResponse
    {
        Event::dispatch('inventory.inventory_source.update.before', $id);

        $inventorySource = $this->inventorySourceRepository->update($request->validated(), $id);

        Event::dispatch('inventory.inventory_source.update.after', $inventorySource);

        return to_route('seller.settings.inventory_sources.index')
            ->withSuccess(trans('marketplace::app.seller.settings.inventory-sources.update-success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): JsonResponse
    {
        $this->inventorySourceRepository->where('vendor_id', seller()->id())
            ->findOrFail($id);

        if ($this->inventorySourceRepository->where('vendor_id', seller()->id())->count() == 1) {
            return new JsonResponse([
                'message' => trans('marketplace::app.seller.settings.inventory-sources.last-delete-error'),
            ], 400);
        }

        try {
            Event::dispatch('inventory.inventory_source.delete.before', $id);

            $this->inventorySourceRepository->delete($id);

            Event::dispatch('inventory.inventory_source.delete.after', $id);

            return new JsonResponse([
                'message' => trans('marketplace::app.seller.settings.inventory-sources.delete-success'),
            ]);
        } catch (\Exception $e) {
            report($e);
        }

        return new JsonResponse([
            'message' => trans('marketplace::app.seller.settings.inventory-sources.delete-failed', [
                'name' => 'marketplace::app.seller.settings.inventory_sources.index.title',
            ]),
        ], 500);
    }
}
