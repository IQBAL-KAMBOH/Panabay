<?php

namespace Webkul\Marketplace\Http\Controllers\Seller;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Webkul\Category\Repositories\CategoryRepository;
use Webkul\Marketplace\Http\Requests\SellerFormRequest;
use Webkul\Marketplace\Repositories\SellerRepository;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected SellerRepository $sellerRepository,
        protected CategoryRepository $categoryRepository,
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $seller = seller()->user();

        if (! empty($seller->category?->categories)) {
            $allowedCategories = $this->categoryRepository->getModel()
                ->whereIn('id', $seller->category->categories)
                ->get();
        }

        return view('marketplace::seller.profile.index')
            ->with([
                'seller'              => $seller,
                'allowedCategories'   => $allowedCategories ?? [],
                'allowedProductTypes' => $this->sellerRepository->getAllowedProducts($seller),
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(): View
    {
        return view('marketplace::seller.profile.edit')
            ->with('seller', seller()->user());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SellerFormRequest $request, int $id): RedirectResponse
    {
        $this->sellerRepository->update(array_merge($request->validated(), [
            'address' => implode(PHP_EOL, $request->input('address')),
        ]), $id);

        return to_route('seller.profile.index')
            ->withSuccess(trans('marketplace::app.seller.profile.update-success'));
    }
}
