<?php

namespace Webkul\Marketplace\Http\Controllers\Shop;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Webkul\Marketplace\Repositories\ProductDownloadableLinkRepository;
use Webkul\Marketplace\Repositories\ProductDownloadableSampleRepository;
use Webkul\Marketplace\Repositories\ProductRepository;
use Webkul\Product\Repositories\ProductRepository as BaseProductRepository;
use Webkul\Shop\Http\Resources\ProductResource;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected BaseProductRepository $baseProductRepository,
        protected ProductDownloadableLinkRepository $productDownloadableLinkRepository,
        protected ProductDownloadableSampleRepository $productDownloadableSampleRepository,
        protected ProductRepository $productRepository,
    ) {}

    /**
     * Product offers by sellers
     */
    public function offers($urlKey): View|RedirectResponse
    {
        $product = $this->baseProductRepository->findBySlugOrFail($urlKey);

        if ($product->type == 'configurable') {
            return to_route('shop.product_or_category.index', $urlKey)
                ->withError(trans('product::app.checkout.cart.missing-options'));
        }

        $sellerProducts = $this->productRepository->getSellerProducts($product);

        if (! $sellerProducts->count()) {
            return to_route('shop.home.index');
        }

        return view('marketplace::shop.products.offers')
            ->with([
                'product'        => $product,
                'sellerProducts' => $sellerProducts,
            ]);
    }

    /**
     * Download the for the specified resource.
     *
     * @return Response|\Exception
     */
    public function downloadSample($type, $id)
    {
        try {
            if ($type == 'link') {
                $productDownloadableLink = $this->productDownloadableLinkRepository->findOrFail($id);

                if ($productDownloadableLink->sample_type == 'file') {
                    $privateDisk = Storage::disk('private');

                    return $privateDisk->exists($productDownloadableLink->sample_file)
                        ? $privateDisk->download($productDownloadableLink->sample_file)
                        : abort(404);
                }

                $fileName = substr($productDownloadableLink->sample_url, strrpos($productDownloadableLink->sample_url, '/') + 1);

                $tempImage = tempnam(sys_get_temp_dir(), $fileName);

                copy($productDownloadableLink->sample_url, $tempImage);

                return response()->download($tempImage, $fileName);
            }

            $productDownloadableSample = $this->productDownloadableSampleRepository->findOrFail($id);

            if ($productDownloadableSample->type == 'file') {
                return Storage::download($productDownloadableSample->file);
            }

            $fileName = substr($productDownloadableSample->url, strrpos($productDownloadableSample->url, '/') + 1);

            $tempImage = tempnam(sys_get_temp_dir(), $fileName);

            copy($productDownloadableSample->url, $tempImage);

            return response()->download($tempImage, $fileName);
        } catch (\Exception $e) {
            abort(404);
        }
    }

    /**
     * Display the specified resource.
     */
    public function topSellingProducts(int $sellerId): JsonResource
    {
        return ProductResource::collection($this->baseProductRepository
            ->findWhereIn('id', $this->productRepository->getTopSellingProducts($sellerId)));
    }
}
