@php
use Webkul\Marketplace\Repositories\ReviewRepository;

$reviewRepository = app(ReviewRepository::class);

$reviews = $reviewRepository->getRecentReviews($seller->id);

$avgRatings = $reviewRepository->getAverageRating($seller);

$totalReviews = $reviewRepository->getTotalReviews($seller);

$percentageRatings = $reviewRepository->getPercentageRating($seller);
// Add this helper function inside the PHP block at the top of your file
// if it's not the same as the one you already have for reviews.
function format_stat_number($n) {
if ($n >= 1000) {
return round($n / 1000, 1) . 'K';
}
return $n;
}
@endphp

<!-- SEO Meta Content -->
@push('meta')
<meta
    name="title"
    content="{{ $seller->meta_title ?? '' }}" />

<meta
    name="description"
    content="{{ trim($seller->meta_description) != ''
        ? $seller->meta_description
        : Illuminate\Support\Str::limit(strip_tags($seller->description), 120, '') }}" />

<meta
    name="keywords"
    content="{{ $seller->meta_keywords }}" />

@if ($seller->google_analytics_id)
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id={{ $seller->google_analytics_id }}"></script>

<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());

    gtag('config', '{{ $seller->google_analytics_id }}');
</script>
@endif
@endPush

<!-- Page Layout -->
<x-shop::layouts>
    <!-- Page Title -->
    <x-slot:title>
        {{ $seller->shop_title }}
        </x-slot>

        <div class="">
            <div class="mt-8 grid gap-8">
                <!-- Banner -->
                <div class="max-sm:h-[250px] h-[300px]">
                    <x-shop::media.images.lazy
                        :src="$seller->banner_url ?: bagisto_asset('images/default-banner.webp', 'marketplace')"
                        class="max-sm:h-[250px] w-full object-cover h-[300px]"
                        alt="marketplace banner"
                        width="1320"
                        height="300">
                    </x-shop::media.images.lazy>
                </div>

                <div class="grid gap-5 px-4">
                    <!-- Seller Info Block -->
                    <div class="flex justify-between items-start">
                        <div class="flex gap-4">
                            <!-- <div class="h-20 w-20 rounded-xl border flex-shrink-0">
                                <x-shop::media.images.lazy
                                    :src="$seller->logo_url ?: bagisto_asset('images/default-logo.webp', 'marketplace')"
                                    class="h-20 w-20 rounded-xl object-cover"
                                    alt="seller logo"
                                    width="80"
                                    height="80">
                                </x-shop::media.images.lazy>
                            </div> -->
                            <div class="grid gap-1">
                                <div class="flex gap-1.5 items-center">
                                    <h1 class="text-3xl font-medium">
                                        {{ $seller->shop_title }}
                                    </h1>
                                    @if ($seller->showRedFlag())
                                    <span class="mp-flag-icon text-2xl text-red-600 cursor-pointer" title="{{ $seller->flags_count }}"></span>
                                    @endif
                                </div>
                                <h6 class="text-base text-[#757575]">
                                    {{ $seller->full_address }}
                                </h6>
                                <div class="flex items-center gap-2.5">
                                    <x-marketplace::shop.products.star-rating
                                        :value="$avgRatings"
                                        :is-editable=false />
                                    <p class="text-sm text-[#757575]">
                                        ({{ $totalReviews }} @lang('reviews'))
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <v-seller-contacts>
                                <div class="flex flex-wrap max-sm:gap-3 gap-10">
                                    <div class="flex items-center gap-2.5">
                                        <span class="mp-share-icon text-2xl"></span>

                                        <!-- <span class="text-lg font-normal">
                @lang('marketplace::app.shop.sellers.profile.share.title')
            </span> -->
                                    </div>

                                    <div class="flex items-center gap-2.5">
                                        <span class="mp-phone-icon text-2xl"></span>

                                        <span class="text-lg font-normal">
                                            @lang('marketplace::app.shop.sellers.profile.contact-form.title')
                                        </span>
                                    </div>

                                    @if (core()->getConfigData('marketplace.settings.seller.flag_enabled'))
                                    <span class="flex items-center gap-2.5">
                                        <span class="mp-issue-icon text-2xl"></span>

                                        <span class="text-lg font-normal">
                                            @lang('marketplace::app.shop.sellers.profile.report-form.title')
                                        </span>
                                    </span>
                                    @endif
                                </div>
                            </v-seller-contacts>
                        </div>
                    </div>

                    <!-- Statistics Bar -->
                     @if(false)
                    <div class="border-t border-b border-gray-200 py-4">
                        <div class="flex flex-wrap justify-around items-center gap-y-4">
                            <div class="text-center px-4">
                                <div class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-2">
                                    <span class="icon-product text-2xl"></span> <!-- Assumes Bagisto icon class -->
                                </div>
                                <p id="product-count-display" class="text-xl font-bold text-gray-800">0</p> <!-- Placeholder -->
                                <p class="text-sm text-gray-500">Products</p>
                            </div>
                            <div class="text-center px-4">
                                <div class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-2">
                                    <span class="icon-users text-2xl"></span> <!-- Assumes Bagisto icon class -->
                                </div>
                                <p class="text-xl font-bold text-gray-800">3,467</p> <!-- Placeholder -->
                                <p class="text-sm text-gray-500">Following</p>
                            </div>
                            <div class="text-center px-4">
                                <div class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-2">
                                    <span class="icon-users text-2xl"></span> <!-- Assumes Bagisto icon class -->
                                </div>
                                <p class="text-xl font-bold text-gray-800">15.2K</p> <!-- Placeholder -->
                                <p class="text-sm text-gray-500">Followers</p>
                            </div>
                            <div class="text-center px-4">
                                <div class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-2">
                                    <span class="icon-users text-2xl"></span> <!-- Assumes Bagisto icon class -->
                                </div>
                                <p class="text-xl font-bold text-gray-800">12.7K</p> <!-- Placeholder -->
                                <p class="text-sm text-gray-500">Customers</p>
                            </div>
                            <div class="text-center px-4">
                                <div class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-2">
                                    <span class="icon-star-fill text-2xl"></span> <!-- Assumes Bagisto icon class -->
                                </div>
                                @php
                                function format_k($n) {
                                if ($n >= 1000) {
                                return round($n / 1000, 1) . 'k';
                                }
                                return $n;
                                }
                                @endphp
                                <p class="text-xl font-bold text-gray-800">{{ $avgRatings }} ({{ format_k($totalReviews) }} ratings)</p>
                                <p class="text-sm text-gray-500">Ratings</p>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- seller Profile component -->
                    <v-seller-profile>
                        <x-marketplace::shop.shimmer.profile-tab />
                        <x-marketplace::shop.shimmer.product />
                    </v-seller-profile>
                </div>
            </div>
        </div>

        @pushOnce('scripts')
        <script
            type="text/x-template"
            id="v-seller-profile-template">
            <div>
                <div class="max-sm:grid justify-between gap-y-4 flex  md:p-1">
                    <div class="flex gap-2">
                        {!! view_render_event('bagisto.shop.marketplace.seller.profile.tabs.before', ['seller' => $seller]) !!}

                        <button
                            class="rounded-lg max-sm:px-2 py-2.5 text-lg font-normal leading-7 px-5"
                            :class="{ 'bg-gray-100 font-medium': activeTab == 'products' }"
                            @click="activeTab = 'products'"
                        >
                            Products
                        </button>
                         <button
                            class="rounded-lg max-sm:px-2 py-2.5 text-lg font-normal leading-7 px-5"
                            :class="{ 'bg-gray-100 font-medium': activeTab == 'services' }"
                            @click="activeTab = 'services'"
                        >
                            Services
                        </button>
                         <button
                            class="rounded-lg max-sm:px-2 py-2.5 text-lg font-normal leading-7 px-5"
                            :class="{ 'bg-gray-100 font-medium': activeTab == 'showrooms' }"
                            @click="activeTab = 'showrooms'"
                        >
                            Showrooms
                        </button>

                        <button
                            class="rounded-lg max-sm:px-2 py-2.5 text-lg font-normal leading-7 px-5"
                            :class="{ 'bg-gray-100  font-medium': activeTab == 'reviews' }"
                            @click="activeTab = 'reviews'"
                        >
                            Seller Review
                        </button>

                        <button
                            class="rounded-lg max-sm:px-2 py-2.5 text-lg font-normal leading-7 px-5"
                            :class="{ 'bg-gray-100  font-medium': activeTab == 'about' }"
                            @click="activeTab = 'about'"
                        >
                            @lang('marketplace::app.shop.sellers.profile.about.title')
                        </button>

                        {!! view_render_event('bagisto.shop.marketplace.seller.profile.tabs.after', ['seller' => $seller]) !!}
                    </div>

                    <div class="flex">
                        <!-- Serach Product Form -->
                        <form
                            v-if="activeTab == 'products'"
                            action="{{ route('shop.marketplace.sellers.show', $seller->url) }}"
                            class="flex w-full items-center"
                        >
                            <label
                                for="organic-search"
                                class="sr-only"
                            >
                                @lang('marketplace::app.shop.sellers.profile.reviews.search')
                            </label>

                            <div class="relative w-full">
                                <div
                                    class="icon-search pointer-events-none absolute top-2.5 flex items-center text-2xl ltr:left-3 rtl:right-3">
                                </div>

                                <input
                                    type="text"
                                    class="block w-full rounded-xl border border-gray-300 px-11 py-3.5 text-xs font-medium"
                                    name="term"
                                    v-model="searchTerm"
                                    placeholder="@lang('marketplace::app.shop.sellers.profile.search-text')"
                                >
                            </div>
                        </form>
                    </div>
                </div>

                <template v-if="activeTab == 'products'">
                    <v-seller-products
                        :search-term="searchTerm"
                        v-model="totalProductCount"
                    >
                        <x-marketplace::shop.shimmer.product />
                    </v-seller-products>
                </template>
                <template v-if="activeTab == 'services'">
                     <p>.....</p>
                </template>
                  <template v-if="activeTab == 'showrooms'">
                     <p>.....</p>
                </template>

                <template v-if="activeTab == 'reviews'">
                   <div class="container shadow p-4 rounded mt-4 py-4">
                     <div class="mt-3 max-sm:grid justify-between gap-3 flex">
                        <h2 class="text-2xl font-medium">
                            @lang('marketplace::app.shop.sellers.profile.reviews.customer-reviews')
                        </h2>

                        <span
                            class="icon-pen flex cursor-pointer items-center gap-2 rounded-3xl border border-navyBlue px-4 py-2 text-2xl"
                            @click="openReviewModal"
                        >
                            <span class="text-lg font-normal leading-8">
                                @lang('marketplace::app.shop.sellers.profile.reviews.write-review')
                            </span>
                        </span>
                    </div>

                    <div class="mt-8 max-sm:grid gap-y-8 flex gap-x-8">
                        <div class="grid content-baseline">
                            <div class="grid gap-2">
                                <div class="mt-2.5 flex items-center gap-4">
                                    <div class="flex gap-4">
                                        <p class="text-3xl font-medium text-[#232323]">
                                            {{$avgRatings}}
                                        </p>
                                    </div>

                                    <x-marketplace::shop.products.star-rating
                                        :value="$avgRatings"
                                        :is-editable=false
                                    />

                                    <div class="flex gap-4">
                                        <p class="text-xs text-[#858585] underline">
                                            (@lang('marketplace::app.shop.sellers.profile.reviews.customer-review', ['count' => $totalReviews]))
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4 grid gap-y-4 max-w-[365px]">
                                @for ($i = 5; $i >= 1; $i--)
                                    <div class="flex items-center justify-between gap-x-6 max-sm:flex-wrap">
                                        <div class="whitespace-nowrap text-base font-medium">{{ $i }} Stars</div>
                                        <div class="h-4 w-[275px] max-w-full rounded-sm bg-[#E5E5E5]">
                                            <div class="h-4 rounded-sm bg-[#FEA82B]" style="width: {{ $percentageRatings[$i] }}%"></div>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                        </div>

                        <div class="grid w-full gap-y-5">
                            @foreach ($reviews as $review)
                                <div class="flex gap-x-5 rounded-xl border border-[#e5e5e5] p-6 max-xl:mb-5 max-sm:flex-wrap">
                                    <div>
                                        <div class="flex max-h-[100px] min-h-[100px] min-w-[100px] max-w-[100px] items-center justify-center rounded-xl bg-[#F5F5F5] max-sm:hidden"
                                        >
                                            @if($review->customer->image_url)
                                                <img
                                                    src="{{ $review->customer->image_url }}"
                                                    alt="{{ $review->customer->name }}"
                                                    class="h-full w-full object-cover rounded-xl"
                                                />
                                            @else
                                                @php
                                                    $splitName = explode(' ', $review->customer->name);

                                                    $uppercaseNames = array_map(fn($name) => strtoupper($name[0]), $splitName);

                                                    $joinedName = implode('', $uppercaseNames);
                                                @endphp

                                                <span class="text-2xl font-semibold text-[#6E6E6E]">
                                                    {{ $joinedName }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="w-full">
                                        <div class="flex justify-between">
                                            <p class="text-xl font-medium max-sm:text-base">
                                                {{$review->title}}
                                            </p>

                                            <div class="flex items-center">
                                                <x-marketplace::shop.products.star-rating
                                                    :value="$review->rating"
                                                />
                                            </div>
                                        </div>

                                        <p class="mt-2.5 text-base text-[#757575] max-sm:text-xs">
                                            {{$review->comment}}
                                        </p>

                                        <p class="mt-2.5 text-sm text-[#666666] max-sm:text-xs">
                                            @lang('marketplace::app.shop.sellers.profile.reviews.review-by') <span class="font-medium">
                                                {{$review->customer->name}}
                                            </span>
                                            {{core()->formatDate($review->created_at, 'd M, Y')}}
                                        </p>
                                    </div>
                                </div>

                                @if ($loop->iteration == 5)
                                    <a
                                        href="{{ route('shop.marketplace.seller.reviews.index', $seller->url) }}"
                                        class="secondary-button mx-auto block w-max rounded-2xl px-11 py-2.5 text-center text-base"
                                    >
                                        @lang('marketplace::app.shop.sellers.profile.reviews.view-all')
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <x-shop::form
                        v-slot="{ meta, errors, handleSubmit }"
                        as="div"
                    >
                        <form
                            @submit="handleSubmit($event, createReview)"
                            ref="reviewForm"
                        >
                            <!-- Seller Review Modal -->
                            <x-shop::modal ref="reviewModal">
                                <x-slot:header>
                                    <!-- Modal Header -->
                                    <p class="text-2xl font-medium leading-9 text-[#151515]">
                                        @lang('marketplace::app.shop.sellers.profile.reviews.write-review')
                                    </p>
                                </x-slot:header>

                                <x-slot:content class="!pb-2">
                                    <x-shop::form.control-group.control
                                        type="hidden"
                                        name="shop_url"
                                        value="{{ $seller->url }}"
                                    />

                                    {!! view_render_event('bagisto.shop.marketplace.seller.profile.review.create_form_controls.before', ['seller' => $seller]) !!}

                                    <x-shop::form.control-group class="w-full">
                                        <x-shop::form.control-group.label class="required flex">
                                            @lang('shop::app.products.view.reviews.rating')
                                        </x-shop::form.control-group.label>

                                        <x-marketplace::shop.products.star-rating
                                            name="rating"
                                            :value="old('rating') ?? 5"
                                            :disabled="false"
                                            rules="required"
                                            :label="trans('shop::app.products.view.reviews.rating')"
                                        />

                                        <x-shop::form.control-group.error
                                            control-name="rating"
                                            class="flex"
                                        >
                                        </x-shop::form.control-group.error>
                                    </x-shop::form.control-group>

                                    <x-shop::form.control-group class="w-full">
                                        <x-shop::form.control-group.label class="required flex">
                                            @lang('marketplace::app.shop.sellers.profile.reviews.title')
                                        </x-shop::form.control-group.label>

                                        <x-shop::form.control-group.control
                                            type="text"
                                            name="title"
                                            class="! shadow-none"
                                            rules="required"
                                            :label="trans('marketplace::app.shop.sellers.profile.reviews.title')"
                                            :placeholder="trans('marketplace::app.shop.sellers.profile.reviews.title')"
                                        />

                                        <x-shop::form.control-group.error
                                            control-name="title"
                                            class="flex"
                                        />
                                    </x-shop::form.control-group>

                                    <x-shop::form.control-group class="w-full">
                                        <x-shop::form.control-group.label class="required flex">
                                            @lang('marketplace::app.shop.sellers.profile.reviews.comment')
                                        </x-shop::form.control-group.label>

                                        <x-shop::form.control-group.control
                                            type="textarea"
                                            name="comment"
                                            class="mb-0 !shadow-none"
                                            rows="4"
                                            rules="required"
                                            :label="trans('marketplace::app.shop.sellers.profile.reviews.comment')"
                                            :placeholder="trans('marketplace::app.shop.sellers.profile.reviews.comment')"
                                        />

                                        <x-shop::form.control-group.error
                                            control-name="comment"
                                            class="flex"
                                        />
                                    </x-shop::form.control-group>

                                    {!! view_render_event('bagisto.shop.marketplace.seller.profile.review.create_form_controls.after', ['seller' => $seller]) !!}
                                </x-slot:content>

                                <x-slot:footer>
                                    <x-shop::button
                                        type="submit"
                                        class="primary-button place-self-end"
                                        ::disabled="isSubmitting"
                                        ::loading="isSubmitting"
                                        :title="trans('marketplace::app.shop.sellers.profile.reviews.submit-btn')"
                                    />
                                </x-slot:footer>
                            </x-shop::modal>
                        </form>
                    </x-shop::form>
                   </div>
                </template>

                <template v-if="activeTab == 'about'">
                   <div class="container shadow p-4 mt-4 rounded">
                     <div class="mt-8 grid grid-cols-1 md:grid-cols-4 gap-8">
                        <!-- Left Navigation -->
                        <div class="md:col-span-1">
                            <ul class="space-y-4">
                                <li>
                                    <p
                                        class="cursor-pointer pb-2 text-lg"
                                        :class="activeAboutSection === 'about-us' ? 'text-black border-b-2 border-black font-semibold' : 'text-gray-500'"
                                        @click="activeAboutSection = 'about-us'">
                                        About Us
                                    </p>
                                </li>

                                @if (! empty($seller->shipping_policy))
                                <li>
                                    <p
                                        class="cursor-pointer pb-2 text-lg"
                                        :class="activeAboutSection === 'shipping' ? 'text-black border-b-2 border-black font-semibold' : 'text-gray-500'"
                                        @click="activeAboutSection = 'shipping'">
                                        Shipping Policy
                                    </p>
                                </li>
                                @endif

                                @if (! empty($seller->return_policy))
                                <li>
                                    <p
                                        class="cursor-pointer pb-2 text-lg"
                                        :class="activeAboutSection === 'return' ? 'text-black border-b-2 border-black font-semibold' : 'text-gray-500'"
                                        @click="activeAboutSection = 'return'">
                                        Return Policy
                                    </p>
                                </li>
                                @endif

                                @if (! empty($seller->privacy_policy))
                                <li>
                                    <p
                                        class="cursor-pointer pb-2 text-lg"
                                        :class="activeAboutSection === 'privacy' ? 'text-black border-b-2 border-black font-semibold' : 'text-gray-500'"
                                        @click="activeAboutSection = 'privacy'">
                                        Privacy Policy
                                    </p>
                                </li>
                                @endif
                            </ul>
                        </div>

                        <!-- Right Content -->
                        <div class="md:col-span-3">
                            <div v-show="activeAboutSection === 'about-us'">
                                <h2 class="text-2xl font-semibold mb-4">About Us</h2>
                                <div class="prose max-w-none">
                                    {!! $seller->description !!}
                                </div>
                            </div>

                            @if (! empty($seller->shipping_policy))
                                <div v-show="activeAboutSection === 'shipping'">
                                    <h2 class="text-2xl font-semibold mb-4">Shipping Policy</h2>
                                    <div class="prose max-w-none">
                                        {!! $seller->shipping_policy !!}
                                    </div>
                                </div>
                            @endif

                            @if (! empty($seller->return_policy))
                                <div v-show="activeAboutSection === 'return'">
                                    <h2 class="text-2xl font-semibold mb-4">Return Policy</h2>
                                    <div class="prose max-w-none">
                                        {!! $seller->return_policy !!}
                                    </div>
                                </div>
                            @endif

                            @if (! empty($seller->privacy_policy))
                                <div v-show="activeAboutSection === 'privacy'">
                                    <h2 class="text-2xl font-semibold mb-4">Privacy Policy</h2>
                                    <div class="prose max-w-none">
                                        {!! $seller->privacy_policy !!}
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                   </div>
                </template>

                {!! view_render_event('bagisto.shop.marketplace.seller.profile.tab.content', ['seller' => $seller]) !!}
            </div>
        </script>

        <script type="module">
            app.component('v-seller-profile', {
                template: '#v-seller-profile-template',

                data() {
                    return {
                        activeTab: 'products',

                        activeAboutSection: 'products',

                        searchTerm: '',

                        totalProductCount: 0,

                        customer: @json(auth()->guard('customer')->user()),

                        isSubmitting: false,
                    }
                },
                mounted(){
                        const productCountElement = document.getElementById('product-count-display');

                        if (productCountElement) {
                            productCountElement.innerText = this.formatNumberForDisplay(totalProductCount);
                        }
                },
                watch: {
                    totalProductCount(newCount) {
                        // Find the element by its ID and update its text
                        const productCountElement = document.getElementById('product-count-display');

                        if (productCountElement) {
                            productCountElement.innerText = this.formatNumberForDisplay(newCount);
                        }
                    }
                },
                methods: {
                    formatNumberForDisplay(num) {
                if (num >= 1000) {
                    return (num / 1000).toFixed(1) + 'K';
                }
                return num;
            },
                    createReview(params, {
                        resetForm,
                        setErrors
                    }) {
                        this.isSubmitting = true;

                        this.$axios.post("{{route('shop.marketplace.seller.reviews.store')}}", params)
                            .then(response => {
                                this.$refs.reviewForm.reset();

                                this.$refs.reviewModal.close();

                                this.$emitter.emit('add-flash', {
                                    type: response.data.type,
                                    message: response.data.message
                                });
                            })
                            .catch(error => {
                                if (error.response.status == 422) {
                                    setErrors(error.response.data.errors);
                                }
                            })
                            .finally(() => {
                                this.isSubmitting = false;
                            });
                    },

                    openReviewModal() {
                        if (!this.customer) {
                            this.$emitter.emit('open-confirm-modal', {
                                title: "@lang('marketplace::app.shop.sellers.profile.reviews.alert')",
                                message: "@lang('marketplace::app.shop.sellers.profile.reviews.guest-alert')",
                                agree: () => {
                                    window.location.href = "{{ route('shop.customer.session.index') }}";
                                }
                            });

                            return;
                        }

                        this.$refs.reviewModal.open();
                    },
                }
            });
        </script>

        <script
            type="text/x-template"
            id="v-seller-products-template">
            <div class="container">
                <div class="flex items-start gap-10 max-lg:gap-5 mt-4 py-4">
                    <!-- Product Listing Filters -->
                    <div class="card shadow p-2 rounded">
                        @include('marketplace::shop.sellers.products.filters')
                    </div>

                    <!-- Product Listing Container -->
                    <div class="flex-1 shadow p-2 rounded">
                        <!-- Desktop Product Listing Toolbar -->
                        <div class="max-md:hidden">
                            @include('marketplace::shop.sellers.products.toolbar')
                        </div>

                        <!-- Product List Card Container -->
                        <div
                            class="mt-8 grid grid-cols-1 gap-6"
                            v-if="filters.toolbar.mode === 'list'"
                        >
                            <!-- Product Card Shimmer Effect -->
                            <template v-if="isLoading">
                                <x-shop::shimmer.products.cards.list count="9" />
                            </template>

                            <!-- Product Card Listing -->
                            <template v-else>
                                <template v-if="products.length">
                                    <x-marketplace::shop.products.card
                                        ::mode="'list'"
                                        v-for="product in products"
                                    >
                                    </x-marketplace::shop.products.card>
                                </template>

                                <!-- Empty Products Container -->
                                <template v-else>
                                    <div class="m-auto grid h-[476px] w-[100%] place-content-center items-center justify-items-center text-center">
                                        <img src="{{ bagisto_asset('images/thank-you.png') }}"/>

                                        <p class="text-xl">
                                            @lang('marketplace::app.shop.sellers.profile.products.no-result')
                                        </p>
                                    </div>
                                </template>
                            </template>
                        </div>

                        <!-- Product Grid Card Container -->
                        <div v-else>
                            <!-- Product Card Shimmer Effect -->
                            <template v-if="isLoading">
                                <div class="mt-8 grid grid-cols-3 gap-8 max-1060:grid-cols-2 max-sm:mt-5 max-sm:justify-items-center max-sm:gap-4">
                                    <x-shop::shimmer.products.cards.grid count="9" />
                                </div>
                            </template>

                            <!-- Product Card Listing -->
                            <template v-else>
                                <template v-if="products.length">
                                    <div class="mt-8 grid grid-cols-3 gap-8 max-1060:grid-cols-2 max-sm:mt-5 max-sm:justify-items-center max-sm:gap-4">
                                        <x-marketplace::shop.products.card
                                            ::mode="'grid'"
                                            v-for="product in products"
                                        >
                                        </x-marketplace::shop.products.card>
                                    </div>
                                </template>

                                <!-- Empty Products Container -->
                                <template v-else>
                                    <div class="m-auto grid h-[476px] w-[100%] place-content-center items-center justify-items-center text-center">
                                        <img src="{{ bagisto_asset('images/thank-you.png') }}"/>

                                        <p class="text-xl">
                                            @lang('marketplace::app.shop.sellers.profile.products.no-result')
                                        </p>
                                    </div>
                                </template>
                            </template>
                        </div>

                        <!-- Load More Button -->
                        <button
                            class="secondary-button mx-auto mt-15 block w-max rounded-2xl px-11 py-2.5 text-center text-base"
                            @click="loadMoreProducts"
                            v-if="links.next"
                        >
                            @lang('shop::app.categories.view.load-more')
                        </button>
                    </div>
                </div>
            </div>
        </script>

        <script type="module">
            app.component('v-seller-products', {
                template: '#v-seller-products-template',

                props: {
                    searchTerm: {
                        type: String,
                        default: ''
                    }
                },

                data() {
                    return {
                        isMobile: window.innerWidth <= 767,

                        isLoading: true,

                        isDrawerActive: {
                            toolbar: false,
                            filter: false,
                        },

                        filters: {
                            toolbar: {},
                            filter: {},
                        },

                        products: [],

                        links: {},
                    };
                },

                computed: {
                    queryParams() {
                        let queryParams = Object.assign({},
                            this.filters.filter,
                            this.filters.toolbar, {
                                query: this.searchTerm
                            }
                        );

                        return this.removeJsonEmptyValues(queryParams);
                    },
                },

                watch: {
                    queryParams() {
                        this.getProducts();
                    },
                },

                methods: {
                    setFilters(type, filters) {
                        this.filters[type] = filters;

                        document.body.style.overflow = 'auto';
                    },

                    clearFilters(type) {
                        this.filters[type] = {};

                        document.body.style.overflow = 'auto';
                    },

                    getProducts() {
                        this.isDrawerActive = {
                            toolbar: false,
                            filter: false,
                        };

                        this.$axios.get("{{ route('shop.marketplace.sellers.products', $seller->url) }}", {
                                params: this.queryParams,
                            })
                            .then(response => {
                                this.isLoading = false;

                                this.products = response.data.data;

                                this.links = response.data.links;

                                this.$emit('update:modelValue', response.data.meta.total);
                            })
                            .catch(error => {
                                console.log(error);
                            });
                    },

                    loadMoreProducts() {
                        if (this.links.next) {
                            this.$axios.get(this.links.next).then(response => {
                                this.products = [...this.products, ...response.data.data];

                                this.links = response.data.links;
                            }).catch(error => {
                                console.log(error);
                            });
                        }
                    },

                    removeJsonEmptyValues(params) {
                        Object.keys(params).forEach(key => {
                            if (
                                !params[key] &&
                                params[key] !== undefined
                            ) {
                                delete params[key];
                            }

                            if (Array.isArray(params[key])) {
                                params[key] = params[key].join(',');
                            }
                        });

                        return params;
                    },
                },
            });
        </script>
        @endPushOnce

        @pushOnce('scripts')
        <script
            type="text/x-template"
            id="v-seller-contacts-template">
            <div>
            <div class="flex flex-wrap max-sm:gap-3 gap-10">
                {!! view_render_event('bagisto.shop.marketplace.seller.profile.contact.before', ['seller' => $seller]) !!}

                <div
                    class="flex cursor-pointer bg-navyBlue text-white rounded-full p-2 items-center gap-2.5"
                    @click="$refs.socialShareModal.open()"
                >
                    <span class="mp-share-icon text-2xl"></span>

                    <!-- <span class="text-lg font-normal">
                        @lang('marketplace::app.shop.sellers.profile.share.title')
                    </span> -->
                </div>

                <div
                    class="flex cursor-pointer bg-navyBlue text-white rounded-full p-2 items-center gap-2.5"
                    @click="$refs.contactModal.open()"
                >
                    <span class="mp-phone-icon text-2xl"></span>

                    <!-- <span class="text-lg font-normal">
                        @lang('marketplace::app.shop.sellers.profile.contact-form.title')
                    </span> -->
                </div>

                @if (core()->getConfigData('marketplace.settings.seller.flag_enabled'))
                    <span
                        class="flex cursor-pointer bg-navyBlue text-white rounded-full p-2 items-center gap-2.5"
                        @click="openReportModal"
                    >
                        <span class="mp-issue-icon text-2xl"></span>

                        <!-- <span class="text-lg font-normal">
                            @lang('marketplace::app.shop.sellers.profile.report-form.title')
                        </span> -->
                    </span>
                @endif

                {!! view_render_event('bagisto.shop.marketplace.seller.profile.contact.after', ['seller' => $seller]) !!}
            </div>

            {!! view_render_event('bagisto.shop.marketplace.seller.profile.contact.modals', ['seller' => $seller]) !!}

            <!-- Social Share Modal -->
            <x-shop::modal ref="socialShareModal">
                <x-slot:header class="rounded-t-none">
                    <!-- Modal Header -->
                    <p class="text-2xl font-medium leading-10 text-[#151515]">
                        @lang('marketplace::app.shop.sellers.profile.share.share-on')
                    </p>
                </x-slot:header>

                <!-- Modal Content -->
                <x-slot:content class="py-6">
                    <div class="flex gap-5">
                        @foreach (['facebook', 'twitter', 'pinterest', 'linkedin'] as $social)
                            <div class="grid justify-items-center gap-2">
                                <a
                                    href="{{ $seller->{$social} ?: '#' }}"
                                    class="flex h-16 w-16 items-center justify-center rounded-full p-2.5 hover:opacity-80 focus:outline-none focus:ring-2 focus:ring-offset-2"
                                    :class="{
                                        'bg-[#1877F2]': '{{ $social }}' === 'facebook',
                                        'bg-[#1A1A1A]': '{{ $social }}' === 'twitter',
                                        'bg-[#FFFFFF]': '{{ $social }}' === 'pinterest',
                                        'bg-[#1D8DEE]': '{{ $social }}' === 'linkedin'
                                    }"
                                >
                                    <img
                                        src="{{ bagisto_asset('images/social-icons/' . $social . '.svg', 'marketplace') }}"
                                        alt="{{ $social }} icon"
                                        class="max-w-full max-h-full object-contain"
                                        :class="{
                                            'min-w-16 min-h-16': '{{ $social }}' === 'pinterest'
                                        }"
                                    >
                                </a>
                                <span class="text-base font-medium leading-6 text-center">
                                    @lang("marketplace::app.shop.sellers.profile.share.{$social}")
                                </span>
                            </div>
                        @endforeach
                    </div>
                </x-slot:content>
            </x-shop::modal>

            <!-- Contact Seller Form -->
            <x-shop::form
                v-slot="{ meta, errors, handleSubmit }"
                as="div"
            >
                <form
                    @submit="handleSubmit($event, contactSeller)"
                    ref="contactForm"
                >
                    <!-- Contact Seller Modal -->
                    <x-shop::modal ref="contactModal">
                        <x-slot:header>
                            <!-- Modal Header -->
                            <p class="text-2xl font-medium leading-10 text-[#151515]">
                                @lang('marketplace::app.shop.sellers.profile.contact-form.title')
                            </p>
                        </x-slot:header>

                        <!-- Modal Content -->
                        <x-slot:content class="!pb-2">
                            <x-shop::form.control-group.control
                                type="hidden"
                                name="shop_url"
                                value="{{ $seller->url }}"
                            />

                            <div class="flex gap-4">
                                <x-shop::form.control-group class="w-full">
                                    <x-shop::form.control-group.label class="required flex">
                                        @lang('marketplace::app.shop.sellers.profile.contact-form.name')
                                    </x-shop::form.control-group.label>

                                    <x-shop::form.control-group.control
                                        type="text"
                                        name="name"
                                        class="! shadow-none"
                                        rules="required"
                                        :placeholder="trans('marketplace::app.shop.sellers.profile.contact-form.name')"
                                    />

                                    <x-shop::form.control-group.error
                                        control-name="name"
                                        class="flex"
                                    />
                                </x-shop::form.control-group>

                                <x-shop::form.control-group class="w-full">
                                    <x-shop::form.control-group.label class="required flex">
                                        @lang('marketplace::app.shop.sellers.profile.contact-form.email')
                                    </x-shop::form.control-group.label>

                                    <x-shop::form.control-group.control
                                        type="email"
                                        name="email"
                                        class="! shadow-none"
                                        rules="required"
                                        :placeholder="trans('marketplace::app.shop.sellers.profile.contact-form.email')"
                                    />

                                    <x-shop::form.control-group.error
                                        control-name="email"
                                        class="flex"
                                    />
                                </x-shop::form.control-group>
                            </div>

                            <x-shop::form.control-group class="w-full">
                                <x-shop::form.control-group.label class="required flex">
                                    @lang('marketplace::app.shop.sellers.profile.contact-form.subject')
                                </x-shop::form.control-group.label>

                                <x-shop::form.control-group.control
                                    type="text"
                                    name="subject"
                                    class="! shadow-none"
                                    rules="required"
                                    :placeholder="trans('marketplace::app.shop.sellers.profile.contact-form.subject')"
                                />

                                <x-shop::form.control-group.error
                                    control-name="subject"
                                    class="flex"
                                />
                            </x-shop::form.control-group>

                            <x-shop::form.control-group class="w-full">
                                <x-shop::form.control-group.label class="required flex">
                                    @lang('marketplace::app.shop.sellers.profile.contact-form.query')
                                </x-shop::form.control-group.label>

                                <x-shop::form.control-group.control
                                    type="textarea"
                                    name="query"
                                    class="! shadow-none"
                                    rules="required"
                                    :placeholder="trans('marketplace::app.shop.sellers.profile.contact-form.query')"
                                />

                                <x-shop::form.control-group.error
                                    control-name="query"
                                    class="flex"
                                />
                            </x-shop::form.control-group>
                        </x-slot:content>

                        <x-slot:footer>
                            <x-shop::button
                                type="submit"
                                class="primary-button place-self-end"
                                ::disabled="isSubmitting"
                                ::loading="isSubmitting"
                                :title="trans('marketplace::app.shop.sellers.profile.contact-form.submit-btn')"
                            />
                        </x-slot:footer>
                    </x-shop::modal>
                </form>
            </x-shop::form>

            <!-- Report Seller Form -->
            <x-shop::form
                v-slot="{ meta, errors, handleSubmit }"
                as="div"
            >
                <form
                    @submit="handleSubmit($event, reportSeller)"
                    ref="reportForm"
                >
                    <!-- Report Seller Modal -->
                    <x-shop::modal ref="reportModal">
                        <x-slot:header>
                            <!-- Modal Header -->
                            <p class="text-2xl font-medium leading-9 text-[#151515]">
                                @lang('marketplace::app.shop.sellers.profile.report-form.title')
                            </p>
                        </x-slot:header>

                        <!-- Modal Content -->
                        <x-slot:content class="!pb-2">
                            <x-shop::form.control-group.control
                                type="hidden"
                                name="shop_url"
                                value="{{ $seller->url }}"
                            />

                            <!-- Condition -->
                            <x-shop::form.control-group class="w-full">
                                <x-shop::form.control-group.label class="required flex">
                                    @lang('marketplace::app.shop.sellers.profile.report-form.reason')
                                </x-shop::form.control-group.label>

                                <x-shop::form.control-group.control
                                    type="select"
                                    name="reason"
                                    class="! shadow-none"
                                    v-model="reason"
                                    rules="required"
                                >
                                    <option value="">
                                        @lang('marketplace::app.shop.sellers.profile.report-form.select-reason')
                                    </option>

                                    @foreach ($flagReasons as $reason)
                                        <option value="{{ $reason->name }}">
                                            {{ $reason->name }}
                                        </option>
                                    @endforeach

                                    <option value="other">
                                        @lang('marketplace::app.shop.sellers.profile.report-form.other-reason')
                                    </option>
                                </x-shop::form.control-group.control>

                                <template v-if="reason == 'other'">
                                    <x-shop::form.control-group.control
                                        type="textarea"
                                        name="other_reason"
                                        class="! shadow-none"
                                        rules="required|max:200"
                                        :label="trans('marketplace::app.shop.sellers.profile.report-form.reason')"
                                        :placeholder="trans('marketplace::app.shop.sellers.profile.report-form.reason-placeholder')"
                                    />
                                </template>

                                <v-error-message
                                    :name="reason == 'other' ? 'other_reason' : 'reason'"
                                    v-slot="{ message }"
                                >
                                    <p class="text-xs italic text-red-500">
                                        @{{ message }}
                                    </p>
                                </v-error-message>
                            </x-shop::form.control-group>
                        </x-slot::content>

                        <x-slot:footer>
                            <x-shop::button
                                type="submit"
                                class="primary-button place-self-end"
                                ::disabled="isSubmitting"
                                ::loading="isSubmitting"
                                :title="trans('marketplace::app.shop.sellers.profile.report-form.submit-btn')"
                            />
                        </x-slot:footer>
                    </x-shop::modal>
                </form>
            </x-shop::form>
        </div>
    </script>

        <script type="module">
            app.component('v-seller-contacts', {
                template: '#v-seller-contacts-template',

                data() {
                    return {
                        reason: '',

                        customer: @json(auth()->guard('customer')->user()),

                        isSubmitting: false
                    }
                },

                methods: {
                    contactSeller(params, {
                        resetForm,
                        setErrors
                    }) {
                        this.isSubmitting = true;

                        this.$axios.post("{{route('shop.marketplace.sellers.contact')}}", params)
                            .then((response) => {
                                this.$refs.contactForm.reset();

                                this.$refs.contactModal.close();

                                this.$emitter.emit('add-flash', {
                                    type: 'success',
                                    message: response.data.message
                                });
                            })
                            .catch(error => {
                                if (error.response.status == 422) {
                                    setErrors(error.response.data.errors);
                                }
                            })
                            .finally(() => {
                                this.isSubmitting = false;
                            });
                    },

                    reportSeller(params, {
                        resetForm,
                        setErrors
                    }) {
                        this.isSubmitting = true;

                        this.$axios.post("{{route('shop.marketplace.sellers.flag')}}", params)
                            .then((response) => {
                                this.$refs.reportForm.reset();

                                this.$refs.reportModal.close();

                                this.$emitter.emit('add-flash', {
                                    type: response.data.type,
                                    message: response.data.message
                                });
                            })
                            .catch(error => {
                                if (error.response.status == 422) {
                                    setErrors(error.response.data.errors);
                                }
                            })
                            .finally(() => {
                                this.isSubmitting = false;
                            });
                    },

                    openReportModal() {
                        if (!this.customer) {
                            this.$emitter.emit('open-confirm-modal', {
                                title: "@lang('marketplace::app.shop.sellers.profile.report-form.alert')",
                                message: "@lang('marketplace::app.shop.sellers.profile.report-form.guest-alert')",
                                agree: () => {
                                    window.location.href = "{{ route('shop.customer.session.index') }}";
                                }
                            });

                            return;
                        }

                        this.$refs.reportModal.open();
                    }
                }
            });
        </script>
        @endPushOnce
</x-shop::layouts>