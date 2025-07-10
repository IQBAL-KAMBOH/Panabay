<?php

namespace Webkul\Marketplace\Http\Controllers\Admin;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Illuminate\View\View;
use Webkul\Admin\Http\Requests\MassDestroyRequest;
use Webkul\Category\Repositories\CategoryRepository;
use Webkul\Marketplace\DataGrids\Admin\SellerCategoryDataGrid;
use Webkul\Marketplace\Repositories\SellerCategoryRepository;
use Webkul\Marketplace\Repositories\SellerRepository;

class SellerCategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected SellerRepository $sellerRepository,
        protected CategoryRepository $categoryRepository,
        protected SellerCategoryRepository $sellerCategoryRepository
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View|JsonResponse
    {
        if ($request->ajax()) {
            return datagrid(SellerCategoryDataGrid::class)->process();
        }

        return view('marketplace::admin.seller-categories.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $sellers = $this->sellerRepository->findWhere([
            'is_approved' => 1,
            'parent_id'   => null,
        ]);

        return view('marketplace::admin.seller-categories.create')
            ->with([
                'sellers'    => $sellers,
                'categories' => $this->categoryRepository->getVisibleCategoryTree(core()->getCurrentChannel()->root_category_id),
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'marketplace_seller_id' => ['required'],
            'categories'            => ['required'],
        ]);

        Event::dispatch('marketplace.category.create_or_update.before', $request->input('marketplace_seller_id'));

        $sellerCategory = $this->sellerCategoryRepository->updateOrCreate(
            ['marketplace_seller_id' => $request->input('marketplace_seller_id')],
            ['categories'            => $request->input('categories')],
        );

        Event::dispatch('marketplace.category.create_or_update.after', $sellerCategory);

        return to_route('admin.marketplace.seller_categories.index')
            ->withSuccess(trans('marketplace::app.admin.seller-categories.index.create-success'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id): View
    {
        return view('marketplace::admin.seller-categories.edit')
            ->with([
                'sellerCategory' => $this->sellerCategoryRepository->findOrFail($id),
                'categories'     => $this->categoryRepository->getVisibleCategoryTree(core()->getCurrentChannel()->root_category_id),
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $request->whenMissing('categories', function () use ($request) {
            $request->merge(['categories' => []]);
        });

        Event::dispatch('marketplace.category.update.before', $id);

        $category = $this->sellerCategoryRepository->update($request->only(['categories']), $id);

        Event::dispatch('marketplace.category.update.after', $category);

        return to_route('admin.marketplace.seller_categories.index')
            ->withSuccess(trans('marketplace::app.admin.seller-categories.index.update-success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            Event::dispatch('marketplace.category.delete.before', $id);

            $this->sellerCategoryRepository->delete($id);

            Event::dispatch('marketplace.category.delete.after', $id);

            return new JsonResponse([
                'message' => trans('marketplace::app.admin.seller-categories.index.delete-success'),
            ], 200);
        } catch (Exception $e) {
            return new JsonResponse([
                'message' => trans('marketplace::app.admin.categories.index.delete-failed'),
            ], 500);
        }
    }

    /**
     * Mass delete the flag reasons.
     */
    public function massDestroy(MassDestroyRequest $massDestroyRequest): JsonResponse
    {
        try {
            $this->sellerCategoryRepository->whereIn('id', $massDestroyRequest->input('indices'))->delete();

            return new JsonResponse([
                'message' => trans('marketplace::app.admin.seller-categories.index.delete-success'),
            ]);
        } catch (\Exception $e) {
            return new JsonResponse([
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
