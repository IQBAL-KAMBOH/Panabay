<?php

namespace Webkul\Marketplace\Http\Controllers\Admin\Settings;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Event;
use Webkul\Admin\Http\Controllers\Settings\InventorySourceController as Controller;
use Webkul\Admin\Http\Requests\InventorySourceRequest;

class InventorySourceController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\View\View
     */
    public function edit(int $id)
    {
        $inventorySource = $this->inventorySourceRepository
            ->whereNull('vendor_id')
            ->findOrFail($id);

        return view('admin::settings.inventory-sources.edit')
            ->with('inventorySource', $inventorySource);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(InventorySourceRequest $request, int $id)
    {
        Event::dispatch('inventory.inventory_source.update.before', $id);

        $inventorySource = $this->inventorySourceRepository
            ->whereNull('vendor_id')
            ->findOrFail($id);

        if (! $request->status) {
            $request['status'] = 0;
        }

        $data = array_merge($request->validated(), $request->only([
            'description',
            'contact_fax',
            'status',
        ]));

        $inventorySource = $this->inventorySourceRepository->update($data, $id);

        Event::dispatch('inventory.inventory_source.update.after', $inventorySource);

        return to_route('admin.settings.inventory_sources.index')
            ->withSuccess(trans('admin::app.settings.inventory-sources.update-success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): JsonResponse
    {
        $this->inventorySourceRepository->whereNull('vendor_id')->findOrFail($id);

        if ($this->inventorySourceRepository->whereNull('vendor_id')->count() == 1) {
            return new JsonResponse([
                'message' => trans('admin::app.settings.inventory-sources.last-delete-error'),
            ], 400);
        }

        try {
            Event::dispatch('inventory.inventory_source.delete.before', $id);

            $this->inventorySourceRepository->delete($id);

            Event::dispatch('inventory.inventory_source.delete.after', $id);

            return new JsonResponse([
                'message' => trans('admin::app.settings.inventory-sources.delete-success'),
            ]);
        } catch (\Exception $e) {
            report($e);
        }

        return new JsonResponse([
            'message' => trans('admin::app.settings.inventory-sources.delete-failed', [
                'name' => 'admin::app.settings.inventory_sources.index.title',
            ]),
        ], 500);
    }
}
