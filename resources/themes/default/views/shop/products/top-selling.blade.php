@php
    use Webkul\Marketplace\Repositories\ProductRepository;

    $sellerProduct = app(ProductRepository::class)->with('seller')->findOneWhere([
        'product_id' => $product->id,
        'is_owner'   => 1,
    ]);
@endphp

@if ($sellerProduct)
    <x-shop::products.carousel
        :title="trans('marketplace::app.shop.products.top-selling')"
        :src="route('shop.marketplace.products.seller.top_selling', $sellerProduct->seller->id)"
    >
    </x-shop::products.carousel>
@endif
