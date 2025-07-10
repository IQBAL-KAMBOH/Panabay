<?php

namespace Webkul\Marketplace\Http\Controllers\Shop;

use Illuminate\Http\JsonResponse;
use Illuminate\View\View;
use Webkul\Category\Repositories\CategoryRepository;
use Webkul\Marketplace\Repositories\SellerRepository;
use Webkul\Shop\Http\Controllers\Controller;

class MarketplaceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected CategoryRepository $categoryRepository,
        protected SellerRepository $sellerRepository
    ) {}

    /**
     * Display the specified resource.
     */
    public function index(): View
    {
        return view('marketplace::shop.marketplace.index');
    }

    /**
     * Returns the list of popular sellers.
     */
    public function getFeaturedSellers(): JsonResponse
    {
        $sellers = $this->sellerRepository
            ->with('category')
            ->getFeaturedSellers();

        $transformedSellers = $sellers->map(function ($seller) {
            $categoryIds = $seller->category->categories ?? [];

            $categories = $this->categoryRepository->whereIn('id', $categoryIds)
                ->get()
                ->pluck('name');

            return [
                'logo_url'           => $seller->logo_url,
                'shop_url'           => $seller->url,
                'shop_title'         => $seller->shop_title,
                'full_address'       => $seller->full_address,
                'avg_rating'         => $seller->avg_rating,
                'total_reviews'      => $seller->total_reviews,
                'allowed_categories' => $categories,
            ];
        });

        return new JsonResponse($transformedSellers);
    }
}
