<x-marketplace::seller.layouts>
    <!-- Page Title -->
    <x-slot:title>
        @lang('marketplace::app.seller.profile.index.title')
    </x-slot>

    <!-- Breadcrumbs -->
    @section('breadcrumbs')
        <x-marketplace::seller.breadcrumbs name="seller_profile" />
    @endSection

    {!! view_render_event('bagisto.seller.profile.index.before', ['seller' => $seller]) !!}

    <div class="flex flex-col gap-8">
        <!-- Header -->
        <div class="flex items-center justify-between gap-4 max-sm:flex-wrap">
            <p class="text-2xl font-medium text-gray-800">
                @lang('marketplace::app.seller.profile.index.title')
            </p>

            <a
                href="{{ route('seller.profile.edit') }}"
                class="primary-button px-6 py-3"
            >
                @lang('marketplace::app.seller.profile.index.edit-btn')
            </a>
        </div>

        <!-- Banner -->
        <div class="h-[250px] md:h-[306px] overflow-hidden rounded-xl shadow-md transition-all duration-300 hover:shadow-lg">
            <x-shop::media.images.lazy
                src="{{ $seller->banner ? $seller->banner_url : bagisto_asset('images/default-banner.webp', 'marketplace') }}"
                class="h-[250px] w-full object-cover md:h-[306px] md:rounded-lg transform hover:scale-105 transition-transform duration-500"
                alt="marketplace banner"
                width="1140"
                height="306"
            />
        </div>

        <!-- Logo -->
        <div class="flex gap-4">
            <div class="relative max-h-24 min-w-24 max-w-24 rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                <x-shop::media.images.lazy
                    src="{{ $seller->logo ? $seller->logo_url : bagisto_asset('images/default-logo.webp', 'marketplace') }}"
                    class="h-24 max-h-24 min-w-24 max-w-24 rounded-xl object-cover transition-all duration-300"
                    alt="seller logo"
                    width="96"
                    height="96"
                />
            </div>

            <div class="grid">
                <h1 class="text-3xl font-semibold leading-[48px] text-gray-900">
                    {{ $seller->shop_title }}
                </h1>

                <h6 class="text-base font-medium leading-6 text-[#606060]">
                    {{ $seller->full_address }}
                </h6>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex gap-8 max-xl:flex-wrap">
            <!-- Left Section -->
            <div class="flex flex-1 flex-col gap-8 max-xl:flex-auto">
                <!-- Shop Information -->
                <div class="rounded-xl border border-gray-200 bg-white p-7 shadow-sm transition-all duration-300 hover:shadow-md">
                    <h3 class="mb-6 text-xl font-semibold leading-8 text-navyBlue border-b border-gray-100 pb-3">
                        @lang('marketplace::app.seller.profile.index.general.title')
                    </h3>

                    <div class="space-y-5">
                        <div>
                            <h4 class="text-sm font-medium text-gray-500">
                                @lang('marketplace::app.seller.profile.index.general.shop-title')
                            </h4>

                            <p class="mt-1.5 text-base text-gray-900">
                                {{ $seller->shop_title }}
                            </p>
                        </div>

                        <div>
                            <h4 class="text-sm font-medium text-gray-500">
                                @lang('marketplace::app.seller.profile.index.general.shop-slug')
                            </h4>

                            <p class="mt-1.5 text-base text-gray-900">
                                <a
                                    href="{{ route('shop.marketplace.sellers.show', $seller->url) }}"
                                    target="_blank"
                                    class="text-blue-600 hover:underline hover:text-blue-700 transition-colors"
                                >
                                    {{ $seller->url }}
                                </a>
                            </p>
                        </div>

                        <div>
                            <h4 class="text-sm font-medium text-gray-500">
                                @lang('marketplace::app.seller.profile.index.general.name')
                            </h4>

                            <p class="mt-1.5 text-base text-gray-900">
                                {{ $seller->name }}
                            </p>
                        </div>

                        <div>
                            <h4 class="text-sm font-medium text-gray-500">
                                @lang('marketplace::app.seller.profile.index.general.email')
                            </h4>

                            <p class="mt-1.5 text-base text-gray-900">
                                {{ $seller->email }}
                            </p>
                        </div>

                        <div>
                            <h4 class="text-sm font-medium text-gray-500">
                                @lang('marketplace::app.seller.profile.index.general.phone')
                            </h4>

                            <p class="mt-1.5 text-base text-gray-900">
                                {{ $seller->phone }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- About Store -->
                <div class="rounded-xl border border-gray-200 bg-white p-7 shadow-sm transition-all duration-300 hover:shadow-md">
                    <h3 class="mb-6 text-xl font-semibold leading-8 text-navyBlue border-b border-gray-100 pb-3">
                        @lang('marketplace::app.seller.profile.index.about-store.title')
                    </h3>

                    <div class="prose max-w-none">
                        <p class="text-base text-gray-700 leading-relaxed">
                            {!! $seller->description !!}
                        </p>
                    </div>
                </div>

                <!-- Meta Information -->
                <div class="rounded-xl border border-gray-200 bg-white p-7 shadow-sm transition-all duration-300 hover:shadow-md">
                    <h3 class="mb-6 text-xl font-semibold leading-8 text-navyBlue border-b border-gray-100 pb-3">
                        @lang('marketplace::app.seller.profile.index.meta.title')
                    </h3>

                    <div class="space-y-5">
                        <div>
                            <h4 class="text-sm font-medium text-gray-500">
                                @lang('marketplace::app.seller.profile.index.meta.meta-title')
                            </h4>

                            <p class="mt-1.5 text-base text-gray-900">
                                {{ $seller->meta_title }}
                            </p>
                        </div>

                        <div>
                            <h4 class="text-sm font-medium text-gray-500">
                                @lang('marketplace::app.seller.profile.index.meta.meta-keywords')
                            </h4>

                            <p class="mt-1.5 text-base text-gray-900">
                                {{ $seller->meta_keywords }}
                            </p>
                        </div>

                        <div>
                            <h4 class="text-sm font-medium text-gray-500">
                                @lang('marketplace::app.seller.profile.index.meta.meta-description')
                            </h4>

                            <p class="mt-1.5 text-base text-gray-900">
                                {{ $seller->meta_description }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Policy Information -->
                <div class="rounded-xl border border-gray-200 bg-white p-7 shadow-sm transition-all duration-300 hover:shadow-md">
                    <h3 class="mb-6 text-xl font-semibold leading-8 text-navyBlue border-b border-gray-100 pb-3">
                        @lang('marketplace::app.seller.profile.index.policy.title')
                    </h3>

                    <div class="space-y-8">
                        <div>
                            <h4 class="text-lg font-medium text-gray-700 mb-3 flex items-center">
                                <span class="w-1.5 h-5 bg-blue-600 rounded-sm mr-2.5"></span>
                                @lang('marketplace::app.seller.profile.index.policy.privacy')
                            </h4>

                            <div class="prose max-w-none text-gray-600 pl-4 border-l-2 border-gray-100">
                                {!! $seller->privacy_policy !!}
                            </div>
                        </div>

                        <div>
                            <h4 class="text-lg font-medium text-gray-700 mb-3 flex items-center">
                                <span class="w-1.5 h-5 bg-green-600 rounded-sm mr-2.5"></span>
                                @lang('marketplace::app.seller.profile.index.policy.shipping')
                            </h4>

                            <div class="prose max-w-none text-gray-600 pl-4 border-l-2 border-gray-100">
                                {!! $seller->shipping_policy !!}
                            </div>
                        </div>

                        <div>
                            <h4 class="text-lg font-medium text-gray-700 mb-3 flex items-center">
                                <span class="w-1.5 h-5 bg-amber-600 rounded-sm mr-2.5"></span>
                                @lang('marketplace::app.seller.profile.index.policy.return')
                            </h4>

                            <div class="prose max-w-none text-gray-600 pl-4 border-l-2 border-gray-100">
                                {!! $seller->return_policy !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Section -->
            <div class="flex w-[360px] max-w-full flex-col gap-8 max-xl:flex-auto">
                <!-- Address Information -->
                <div class="rounded-xl border border-gray-200 bg-white p-7 shadow-sm transition-all duration-300 hover:shadow-md">
                    <h3 class="mb-6 text-xl font-semibold leading-8 text-navyBlue border-b border-gray-100 pb-3">
                        @lang('marketplace::app.seller.profile.index.address.title')
                    </h3>

                    <div class="space-y-5">
                        <div>
                            <h4 class="text-sm font-medium text-gray-500">
                                @lang('marketplace::app.seller.profile.index.address.address')
                            </h4>

                            <p class="mt-1.5 text-base text-gray-900">
                                {{ $seller->address }}
                            </p>
                        </div>

                        <div>
                            <h4 class="text-sm font-medium text-gray-500">
                                @lang('marketplace::app.seller.profile.index.address.postcode')
                            </h4>

                            <p class="mt-1.5 text-base text-gray-900">
                                {{ $seller->postcode }}
                            </p>
                        </div>

                        <div>
                            <h4 class="text-sm font-medium text-gray-500">
                                @lang('marketplace::app.seller.profile.index.address.city')
                            </h4>

                            <p class="mt-1.5 text-base text-gray-900">
                                {{ $seller->city }}
                            </p>
                        </div>

                        <div>
                            <h4 class="text-sm font-medium text-gray-500">
                                @lang('marketplace::app.seller.profile.index.address.country')
                            </h4>

                            <p class="mt-1.5 text-base text-gray-900">
                                {{ core()->country_name($seller->country) }}
                            </p>
                        </div>

                        <div>
                            <h4 class="text-sm font-medium text-gray-500">
                                @lang('marketplace::app.seller.profile.index.address.state')
                            </h4>

                            <p class="mt-1.5 text-base text-gray-900">
                                {{ core()->states($seller->country)
                                    ->where('code', $seller->state)
                                    ->first()
                                    ?->default_name }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Social Links -->
                <div class="rounded-xl border border-gray-200 bg-white p-7 shadow-sm transition-all duration-300 hover:shadow-md">
                    <h3 class="mb-6 text-xl font-semibold leading-8 text-navyBlue border-b border-gray-100 pb-3">
                        @lang('marketplace::app.seller.profile.index.social.title')
                    </h3>

                    <div class="space-y-5">
                        @foreach (['facebook', 'twitter', 'pinterest', 'linkedin'] as $social)
                            <div class="flex items-center space-x-3 transition-transform duration-300 hover:translate-x-1">
                                <a
                                    href="{{ $seller->{$social} ?: '#' }}"
                                    @class([
                                        'flex h-8 w-8 items-center justify-center rounded-full p-2.5 shadow-sm hover:opacity-90 transition-all',
                                        'bg-[#1877F2]' => $social === 'facebook',
                                        'bg-[#1A1A1A]' => $social === 'twitter',
                                        'bg-[#FFFFFF]' => $social === 'pinterest',
                                        'bg-[#0A66C2]' => $social === 'linkedin',
                                    ])
                                >
                                    <img
                                        src="{{ bagisto_asset('images/social-icons/' . $social . '.svg', 'marketplace') }}"
                                        alt="{{ $social }} icon"
                                        @class([
                                            'max-w-full max-h-full object-contain',
                                            'min-w-8 min-h-8' => $social === 'pinterest',
                                        ])
                                    >
                                </a>

                                <span class="text-base text-gray-900 hover:text-blue-600 transition-colors">
                                    @lang("marketplace::app.seller.profile.index.social.link", [
                                        'name' => Str::title($social),
                                    ])
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>

                @if (core()->getConfigData('marketplace.settings.seller.enable_minimum_order_amount'))
                    <!-- Minimum Order Amount -->
                    <div class="rounded-xl border border-gray-200 bg-white p-7 shadow-sm transition-all duration-300 hover:shadow-md">
                        <h3 class="mb-6 text-xl font-semibold leading-8 text-navyBlue border-b border-gray-100 pb-3">
                            @lang('marketplace::app.seller.profile.index.minimum-order-amount.title')
                        </h3>

                        <div class="px-5 py-4 bg-gradient-to-r from-gray-50 to-blue-50 rounded-lg border border-gray-100">
                            <p class="text-lg font-semibold text-gray-900">
                                {{ core()->formatBasePrice($seller->minimum_order_amount) }}
                            </p>
                        </div>
                    </div>
                @endif

                <!-- Google Analytics -->
                <div class="rounded-xl border border-gray-200 bg-white p-7 shadow-sm transition-all duration-300 hover:shadow-md">
                    <h3 class="mb-6 text-xl font-semibold leading-8 text-navyBlue border-b border-gray-100 pb-3">
                        @lang('marketplace::app.seller.profile.index.google-analytics.title')
                    </h3>

                    <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-lg px-5 py-4 border border-gray-100">
                        <p class="text-sm text-gray-500 mb-1">
                            @lang('marketplace::app.seller.profile.index.google-analytics.id')
                        </p>

                        <p class="text-base text-gray-900 font-medium">
                            {{ $seller->google_analytics_id }}
                        </p>
                    </div>
                </div>

                <!-- Shop Information -->
                <div class="rounded-xl border border-gray-200 bg-white p-7 shadow-sm transition-all duration-300 hover:shadow-md">
                    <h3 class="mb-6 text-xl font-semibold leading-8 text-navyBlue border-b border-gray-100 pb-3">
                        @lang('marketplace::app.seller.profile.index.shop-information.title')
                    </h3>

                    <div class="space-y-6">
                        <div>
                            <p class="text-lg font-medium text-gray-800 mb-3 flex items-center">
                                <span class="w-1.5 h-5 bg-purple-600 rounded-sm mr-2.5"></span>
                                @lang('marketplace::app.seller.profile.index.shop-information.admin-commission')
                            </p>

                            @php
                                $commission = $seller->commission_enable
                                    ? round($seller->commission_percentage, 2)
                                    : core()->getConfigData('marketplace.settings.general.admin_commission_percentage');
                            @endphp

                            <div class="rounded-lg bg-gradient-to-r from-purple-50 to-gray-50 p-4 border border-gray-100">
                                <p class="text-base text-gray-700">
                                    @lang('marketplace::app.seller.profile.index.shop-information.admin-commission-value', [
                                        'rate' => $commission,
                                    ])
                                </p>
                            </div>
                        </div>

                        <div>
                            <p class="text-lg font-medium text-gray-800 mb-3 flex items-center">
                                <span class="w-1.5 h-5 bg-green-600 rounded-sm mr-2.5"></span>
                                @lang('marketplace::app.seller.profile.index.shop-information.allowed-categories')
                            </p>

                            <div class="flex flex-wrap gap-2">
                                @forelse ($allowedCategories as $category)
                                    <span class="rounded-lg bg-gradient-to-r from-green-50 to-gray-50 p-2.5 text-sm text-gray-700 border border-gray-100">
                                        {{ $category->name }}
                                    </span>
                                @empty
                                    <span class="rounded-lg bg-gradient-to-r from-green-50 to-gray-50 p-2.5 text-sm text-gray-700 border border-gray-100">
                                        @lang('marketplace::app.seller.profile.index.shop-information.no-categories')
                                    </span>
                                @endforelse
                            </div>
                        </div>

                        <div>
                            <p class="text-lg font-medium text-gray-800 mb-3 flex items-center">
                                <span class="w-1.5 h-5 bg-blue-600 rounded-sm mr-2.5"></span>
                                @lang('marketplace::app.seller.profile.index.shop-information.allowed-product-types')
                            </p>

                            <div class="flex flex-wrap gap-2">
                                @forelse ($allowedProductTypes as $productType)
                                    <span class="rounded-lg bg-gradient-to-r from-blue-50 to-gray-50 p-2.5 text-sm text-gray-700 border border-gray-100">
                                        @lang($productType['name'])
                                    </span>
                                @empty
                                    <span class="rounded-lg bg-gradient-to-r from-blue-50 to-gray-50 p-2.5 text-sm text-gray-700 border border-gray-100">
                                        @lang('marketplace::app.seller.profile.index.shop-information.no-product-types')
                                    </span>
                                @endforelse
                            </div>
                        </div>

                        <div>
                            <p class="text-lg font-medium text-gray-800 mb-3 flex items-center">
                                <span class="w-1.5 h-5 bg-amber-600 rounded-sm mr-2.5"></span>
                                @lang('marketplace::app.seller.profile.index.shop-information.payment-methods')
                            </p>

                            <div class="flex flex-wrap gap-2">
                                @forelse (payment()->getPaymentMethods() as $paymentMethod)
                                    <span class="rounded-lg bg-gradient-to-r from-amber-50 to-gray-50 p-2.5 text-sm text-gray-700 border border-gray-100">
                                        {{ $paymentMethod['method_title'] }}
                                    </span>
                                @empty
                                    <span class="rounded-lg bg-gradient-to-r from-amber-50 to-gray-50 p-2.5 text-sm text-gray-700 border border-gray-100">
                                        @lang('marketplace::app.seller.profile.index.shop-information.no-payment-methods')
                                    </span>
                                @endforelse
                            </div>
                        </div>

                        <div>
                            <p class="text-lg font-medium text-gray-800 mb-3 flex items-center">
                                <span class="w-1.5 h-5 bg-red-600 rounded-sm mr-2.5"></span>
                                @lang('marketplace::app.seller.profile.index.shop-information.shipping-methods')
                            </p>

                            <div class="flex flex-wrap gap-2">
                                @forelse (shipping()->getShippingMethods() as $shippingMethod)
                                    <span class="rounded-lg bg-gradient-to-r from-red-50 to-gray-50 p-2.5 text-sm text-gray-700 border border-gray-100">
                                        {{ $shippingMethod['method_title'] }}
                                    </span>
                                @empty
                                    <span class="rounded-lg bg-gradient-to-r from-red-50 to-gray-50 p-2.5 text-sm text-gray-700 border border-gray-100">
                                        @lang('marketplace::app.seller.profile.index.shop-information.no-shipping-methods')
                                    </span>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {!! view_render_event('bagisto.seller.profile.index.after', ['seller' => $seller]) !!}
</x-marketplace::seller.layouts>