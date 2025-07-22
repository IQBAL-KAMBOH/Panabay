@php
$channel = core()->getCurrentChannel();
@endphp

<!-- SEO Meta Content -->
@push ('meta')
<meta
    name="title"
    content="{{ $channel->home_seo['meta_title'] ?? '' }}" />

<meta
    name="description"
    content="{{ $channel->home_seo['meta_description'] ?? '' }}" />

<meta
    name="keywords"
    content="{{ $channel->home_seo['meta_keywords'] ?? '' }}" />
@endPush

@push('styles')

<link href="/css/bootstrap.min.css" rel="stylesheet">
<link href="/css/customsection.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@endpush

<x-shop::layouts>
    <!-- Page Title -->
    <x-slot:title>
        {{ $channel->home_seo['meta_title'] ?? '' }}
        </x-slot>
        <div class="p-1">
            <!-- Section 1 -->
            <div class="deals-grid-container">
                <div class="deals-grid">

                    <!-- Card 1: Left Top (School supplies) -->
                    <div class="deal-card card-style-standard">
                        <div class="card-content">
                            <h4>School supplies up to 50% off</h4>
                            <a href="#" class="link-btn">Shop Deals</a>

                        </div>
                        <img src="" data-src="storage/theme/5/KxtvSrHy4hUXTLkIYGqqCwfuDU8JpPL6OxZ1IwIL.webp" class="lazy card-image" alt="Supplies Deals">
                    </div>
                    <!-- Card 2: Left Bottom (Cooking & dining) -->
                    <div class="deal-card card-style-standard">
                        <div class="card-content">
                            <h4>Cooking & dining up to 40% off</h4>
                            <a href="#" class="link-btn">Shop Deals</a>

                        </div>
                        <img src="" data-src="storage/theme/5/DxtYUITaP2Z0XTpw1f4fBxjP0dIY4FbpkrP4Wcmx.webp" class="lazy card-image" alt="Cooking Deals">
                    </div>
                    <!-- Card 3: Center HERO (Walmart DEALS) -->
                    <div class="deal-card card-style-hero">
                        @php
                        $heroCarouselOptions = [
                        'images' => [

                        [
                        'image' => 'https://images.unsplash.com/photo-1441986300917-64674bd600d8?auto=format&fit=crop&w=1740',
                        'link' => '#',
                        'title' => 'Discover Our Newest Arrivals',
                        ],
                        [
                        'image' => 'https://images.unsplash.com/photo-1441986300917-64674bd600d8?auto=format&fit=crop&w=1740',
                        'link' => '#',
                        'title' => "Don't Miss Our Winter Collection",
                        ],
                        ]
                        ];
                        @endphp
                        <x-shop::carousel :options="$heroCarouselOptions" />
                    </div>
                    <!-- Card 4: Right Top (TVs) -->
                    <div class="deal-card card-style-standard">
                        <div class="card-content">
                            <h4>Up to 25% off TVs & Electronics</h4>
                            <a href="#" class="link-btn">Shop Deals</a>

                        </div>
                        <img src="" data-src="storage/theme/5/BqE8D63lnARWTwiHzFSutgiu9blPJw0VVXICpFx2.webp" class="lazy card-image" alt="TV Deals">
                    </div>
                    <!-- Card 5: Right Bottom (Apple) -->
                    <div class="deal-card card-style-standard">
                        <div class="card-content">
                            <h4>Smart savings on top brands</h4>
                            <a href="#" class="link-btn">Shop Deals</a>

                        </div>
                        <img src="" data-src="storage/theme/5/HQpfSnN2zVR4vvo2N3bGzfgqSOqMx8YmKRDHHbTd.webp" class="lazy card-image" alt="Brand Deals">
                    </div>
                </div>
            </div>
            <!-- Section 2 -->


            <!-- Loop over the theme customization -->
            @foreach ($customizations as $customization)
            @php ($data = $customization->options) @endphp

            <!-- Static content -->
            @switch ($customization->type)
            @case ($customization::STATIC_CONTENT)
            @if($customization->name=='Section3')
            <!-- Section 3 -->
            <section class="deals-grid-container">
                <div class="row ">

                    <div class="row g-3 p-4">
                        <div class="col-lg-8">
                            @php $swimCarouselFilters = [ 'category_slug' => 'womens-swimwear', 'limit' => 8, ]; @endphp
                            <x-shop::products.carousel-new title="Hot, new swim for her" :src="route('shop.api.products.index', $swimCarouselFilters)" :navigation-link="route('shop.search.index', $swimCarouselFilters)" />
                        </div>
                        <div class="col-lg-4">
                            <div class="wmip-promo-card h-100 position-relative" style="background-image: url(https://i5.walmartimages.com/dfw/4ff9c6c9-3e0e/k2-_78c10ff0-ce60-467e-948a-a7d50c2a5903.v1.jpg?odnHeight=447&odnWidth=794); background-size: cover; min-height: 300px;">
                                <div class="position-absolute top-0 start-0 p-4 ">
                                    <p class="fw-bold fs-5 mb-0 text-navyBlue">No Boundaries & more</p>
                                    <h3 class="fw-bold display-6 text-navyBlue">Swim for her</h3>
                                    <!-- <a href="#" class="btn wmip-shop-now-btn mt-2">Shop now</a> -->

                                </div>
                                <div class="position-absolute bottom-0 start-0 p-1 ">
                                    <p class="mb-0 fw-bold text-navyBlue p-4">From $10</p>
                                    <!-- <p class="mb-0 fw-bold display-4 lh-1">$10</p> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @endif
            <!-- push style -->
            @if (! empty($data['css']))
            @push ('styles')
            <style>
            {{ $data['css'] }}
            </style>
            @endpush
            @endif

            <!-- render html -->
            @if (! empty($data['html']))
            {!! $data['html'] !!}
            @endif

            @break
            @case ($customization::IMAGE_CAROUSEL)
            <!-- Image Carousel -->
            <x-shop::carousel
                :options="$data"
                aria-label="{{ trans('shop::app.home.index.image-carousel') }}" />

            @break

            @case ($customization::CATEGORY_CAROUSEL)
            <!-- Categories carousel -->
            <x-shop::categories.carousel
                :title="$data['title'] ?? ''"
                :src="route('shop.api.categories.index', $data['filters'] ?? [])"
                :navigation-link="route('shop.home.index')"
                aria-label="{{ trans('shop::app.home.index.categories-carousel') }}" />

            @break
            @case ($customization::PRODUCT_CAROUSEL)

            <!-- Product Carousel -->
            <x-shop::products.carousel
                :title="$data['title'] ?? ''"
                :src="route('shop.api.products.index', $data['filters'] ?? [])"
                :navigation-link="route('shop.search.index', $data['filters'] ?? [])"
                aria-label="{{ trans('shop::app.home.index.product-carousel') }}" />

            @break
            @endswitch
            @endforeach


</x-shop::layouts>