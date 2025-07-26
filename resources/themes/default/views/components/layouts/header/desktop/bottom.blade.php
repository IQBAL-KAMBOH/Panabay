{!! view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.before') !!}

<div class="flex min-h-[78px] bg-navyBlue w-full justify-between border border-b border-l-0 border-r-0 border-t-0 px-[60px] max-1180:px-8">
    <!--
        This section will provide categories for the first, second, and third levels. If
        additional levels are required, users can customize them according to their needs.
    -->
    <!-- Left Nagivation Section -->
    <div class="flex items-center gap-x-10 max-[1180px]:gap-x-5">
        {!! view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.logo.before') !!}

        <a
            href="{{ route('shop.home.index') }}"
            aria-label="@lang('shop::app.components.layouts.header.desktop.bottom.bagisto')">
            <img
                src="{{ core()->getCurrentChannel()->logo_url ?? bagisto_asset('images/logo-white.svg') }}"
                width="120"

                alt="{{ config('app.name') }}">
        </a>

        {!! view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.logo.after') !!}

    </div>
    <!-- Left-side Actions -->
    <div class="flex shrink-0 items-center gap-x-6">
        <!-- 1. Sell on Panabay -->
        <a href="/page/sell-on-panabay" class="flex items-center gap-x-2 text-white" aria-label="Sell on Panabay.com">
            <i class="fa-solid fa-store text-xl"></i>
            <span class="icon-store text-2xl"></span>
            <span class="text-sm font-medium">Sell on Panabay.com</span>
        </a>

        <!-- 2. User Country -->
        <a href="#" class="flex items-center gap-x-2 text-gray-700 text-white hover:text-[#f78c1e]" aria-label="Select your country">
            <!-- Using a generic globe icon as a flag replacement -->
            <img id="user-flag" src="https://cdn.ipwhois.io/flags/us.svg" alt="User country flag" class="h-4">
            <span id="user-country-code" class="text-sm font-medium">US</span>

        </a>

        <!-- 3. User Currency -->
        <a href="#" class="flex items-center gap-x-2 text-gray-700 text-white hover:text-[#f78c1e]" aria-label="Select your currency">
            <i class="fa fa-coins"></i>
            <span id="user-currency" class="text-sm font-medium">USD</span>
        </a>
    </div>
    <!-- Right Nagivation Section -->
    <div class="flex items-center gap-x-9 max-[1100px]:gap-x-6 max-lg:gap-x-8">

        {!! view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.search_bar.before') !!}

        <!-- Search Bar Container -->
        <div class="relative w-full">
            <form
                action="{{ route('shop.search.index') }}"
                class="flex max-w-[445px] items-center"
                role="search"
                style="min-width: 700px;">
                <label
                    for="organic-search"
                    class="sr-only">
                    @lang('shop::app.components.layouts.header.desktop.bottom.search')
                </label>



                <input
                    type="text"
                    name="query"
                    style="border-radius:40px !important;padding-top:15px;padding-bottom:15px;border:2px solid #f78c1e;"
                    value="{{ request('query') }}"
                    class="block w-full rounded-lg border border-transparent bg-white px-11 py-4 text-xs font-medium text-gray-900 transition-all hover:border-gray-400 focus:border-gray-400"
                    minlength="{{ core()->getConfigData('catalog.products.search.min_query_length') }}"
                    maxlength="{{ core()->getConfigData('catalog.products.search.max_query_length') }}"
                    placeholder="@lang('shop::app.components.layouts.header.desktop.bottom.search-text')"
                    aria-label="@lang('shop::app.components.layouts.header.desktop.bottom.search-text')"
                    aria-required="true"
                    pattern="[^\\]+"
                    required>

                <button
                    type="submit"
                    class="absolute top-1/2 -translate-y-1/2 flex items-center justify-center p-2 text-2xl ltr:right-3 rtl:left-3"
                    aria-label="@lang('shop::app.components.layouts.header.desktop.bottom.submit')">
                    <span class="icon-search"></span> <!-- Your existing search icon class -->
                </button>


                <!-- @if (core()->getConfigData('catalog.products.settings.image_search'))
                @include('shop::search.images.index')
                @endif -->
            </form>
        </div>


        {!! view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.search_bar.after') !!}

        <!-- Right Navigation Links -->
        <div class="mt-1.5 flex gap-x-8 max-[1100px]:gap-x-6 max-lg:gap-x-8">
            <!-- 1. Wishlist Icon (New) -->
            {!! view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.wishlist.before') !!}

            @if (core()->getConfigData('customer.settings.wishlist.wishlist_option'))
            <a
                href="{{ route('shop.customers.account.wishlist.index') }}"
                class="relative flex items-center text-white hover:text-gray-200"
                aria-label="@lang('shop::app.components.layouts.header.desktop.bottom.wishlist')">
                <!-- Using Font Awesome icon as requested previously -->
                <i class="fa-regular fa-heart text-2xl"></i>
            </a>
            @endif

            {!! view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.wishlist.after') !!}


            {!! view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.mini_cart.before') !!}
            <!-- Mini cart -->
            @if(core()->getConfigData('sales.checkout.shopping_cart.cart_page'))
            @include('shop::checkout.cart.mini-cart')
            @endif

            {!! view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.profile.before') !!}

            <!-- user profile -->
            <x-shop::dropdown position="bottom-{{ core()->getCurrentLocale()->direction === 'ltr' ? 'right' : 'left' }}">
                <x-slot:toggle>
                    <!-- Main container for the button -->
                    <div
                        class="flex cursor-pointer items-center gap-x-2 text-white"
                        role="button"
                        aria-label="@lang('shop::app.components.layouts.header.desktop.bottom.profile')"
                        tabindex="0">
                        <!-- User Icon SVG -->
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>

                        <!-- Text Block -->
                        <div class="text-left text-xs">
                            @auth('customer')
                            <div class="font-bold"> {{ auth()->guard('customer')->user()->first_name }}</div>
                            @else
                            <!-- Top line: "Sign In" -->
                            <div>@lang('shop::app.components.layouts.header.desktop.bottom.sign-in')</div>

                            <!-- Bottom line: "Account" (bold) -->
                            <div class="font-bold">Account</div>
                            @endauth

                        </div>
                    </div>
                </x-slot:toggle>

                <!-- Guest Dropdown -->
                @guest('customer')
                <x-slot:content>
                    <div class="grid gap-2.5">
                        <p class="font-dmserif text-xl">
                            @lang('shop::app.components.layouts.header.desktop.bottom.welcome-guest')
                        </p>

                        <p class="text-sm">
                            @lang('shop::app.components.layouts.header.desktop.bottom.dropdown-text')
                        </p>
                    </div>

                    <p class="mt-3 w-full border border-zinc-200"></p>

                    {!! view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.customers_action.before') !!}

                    <div class="mt-6 flex gap-4">
                        {!! view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.sign_in_button.before') !!}

                        <a
                            href="{{ route('shop.customer.session.create') }}"
                            class="primary-button m-0 mx-auto block w-max rounded-2xl px-7 text-center text-base max-md:rounded-lg ltr:ml-0 rtl:mr-0">
                            @lang('shop::app.components.layouts.header.desktop.bottom.sign-in')
                        </a>

                        <a
                            href="{{ route('shop.customers.register.index') }}"
                            class="secondary-button m-0 mx-auto block w-max rounded-2xl border-2 px-7 text-center text-base max-md:rounded-lg max-md:py-3 ltr:ml-0 rtl:mr-0">
                            @lang('shop::app.components.layouts.header.desktop.bottom.sign-up')
                        </a>

                        {!! view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.sign_up_button.after') !!}
                    </div>

                    {!! view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.customers_action.after') !!}
                    </x-slot>
                    @endguest

                    <!-- Customers Dropdown -->
                    @auth('customer')
                    <x-slot:content class="">
                        <div class="grid pb-0 p-4">
                            <p class="font-dmserif text-xl">
                                @lang('shop::app.components.layouts.header.desktop.bottom.welcome')’
                                {{ auth()->guard('customer')->user()->first_name }}
                            </p>

                            <p class="text-sm">
                                @lang('shop::app.components.layouts.header.desktop.bottom.dropdown-text')
                            </p>
                        </div>

                        <p class="w-full border border-zinc-200"></p>

                        <div class="grid">
                            {!! view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.profile_dropdown.links.before') !!}

                            <a
                                class="cursor-pointer px-4 py-1 text-base hover:bg-gray-100"
                                href="{{ route('shop.customers.account.profile.index') }}">
                                @lang('shop::app.components.layouts.header.desktop.bottom.profile')
                            </a>

                            <a
                                class="cursor-pointer px-4 py-1 text-base hover:bg-gray-100"
                                href="{{ route('shop.customers.account.orders.index') }}">
                                @lang('shop::app.components.layouts.header.desktop.bottom.orders')
                            </a>

                            @if (core()->getConfigData('customer.settings.wishlist.wishlist_option'))
                            <a
                                class="cursor-pointer px-4 py-1 text-base hover:bg-gray-100"
                                href="{{ route('shop.customers.account.wishlist.index') }}">
                                @lang('shop::app.components.layouts.header.desktop.bottom.wishlist')
                            </a>
                            @endif

                            <!--Customers logout-->
                            @auth('customer')
                            <x-shop::form
                                method="DELETE"
                                action="{{ route('shop.customer.session.destroy') }}"
                                id="customerLogout" />

                            <a
                                class="cursor-pointer px-4 py-1 text-base hover:bg-gray-100"
                                href="{{ route('shop.customer.session.destroy') }}"
                                onclick="event.preventDefault(); document.getElementById('customerLogout').submit();">
                                @lang('shop::app.components.layouts.header.desktop.bottom.logout')
                            </a>
                            @endauth

                            {!! view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.profile_dropdown.links.after') !!}
                        </div>
                        </x-slot>
                        @endauth
            </x-shop::dropdown>

            {!! view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.profile.after') !!}
        </div>
    </div>
</div>
<div style="max-height: 20px;" class="flex min-h-[38px] max-h-[38px] w-full justify-between border border-b border-l-0 border-r-0 border-t-0 px-[60px] max-1180:px-8">
    <div class="flex items-center gap-x-10 max-[1180px]:gap-x-5">
        {!! view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.category.before') !!}

        <v-desktop-category>
            <div class="flex items-center gap-5">
                <span
                    class="shimmer h-6 w-20 rounded"
                    role="presentation"></span>

                <span
                    class="shimmer h-6 w-20 rounded"
                    role="presentation"></span>

                <span
                    class="shimmer h-6 w-20 rounded"
                    role="presentation"></span>
            </div>
        </v-desktop-category>

        {!! view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.category.after') !!}
    </div>
</div>
@pushOnce('scripts')
<script
    type="text/x-template"
    id="v-desktop-category-template">
    <!-- Loading State -->
    <div
        class="flex items-center gap-5"
        v-if="isLoading">
        <span
            class="shimmer h-6 w-20 rounded"
            role="presentation"></span>

        <span
            class="shimmer h-6 w-20 rounded"
            role="presentation"></span>

        <span
            class="shimmer h-6 w-20 rounded"
            role="presentation"></span>
    </div>

    <!-- Default category layout -->
    <div
        class="flex items-center"
        v-else-if="'{{ core()->getConfigData('general.design.categories.category_view') }}' !== 'sidebar'">
        <div
            class="group relative flex h-[77px] items-center border-b-4 border-transparent hover:border-b-4 hover:border-navyBlue"
            v-for="category in categories">
            <span>
                <a
                    :href="category.url"
                    class="inline-block px-5 ">
                    @{{ category.name }}
                </a>
            </span>

            <div
                class="pointer-events-none absolute top-[78px] z-[1] max-h-[580px] w-max max-w-[1260px] translate-y-1 overflow-auto overflow-x-auto border border-b-0 border-l-0 border-r-0 border-t border-[#F3F3F3] bg-white p-9 opacity-0 shadow-[0_6px_6px_1px_rgba(0,0,0,.3)] transition duration-300 ease-out group-hover:pointer-events-auto group-hover:translate-y-0 group-hover:opacity-100 group-hover:duration-200 group-hover:ease-in ltr:-left-9 rtl:-right-9"
                v-if="category.children && category.children.length">
                <div class="flex justify-between gap-x-[70px]">
                    <div
                        class="grid w-full min-w-max max-w-[150px] flex-auto grid-cols-[1fr] content-start gap-5"
                        v-for="pairCategoryChildren in pairCategoryChildren(category)">
                        <template v-for="secondLevelCategory in pairCategoryChildren">
                            <p class="font-medium text-navyBlue">
                                <a :href="secondLevelCategory.url">
                                    @{{ secondLevelCategory.name }}
                                </a>
                            </p>

                            <ul
                                class="grid grid-cols-[1fr] gap-3"
                                v-if="secondLevelCategory.children && secondLevelCategory.children.length">
                                <li
                                    class="text-sm font-medium text-zinc-500"
                                    v-for="thirdLevelCategory in secondLevelCategory.children">
                                    <a :href="thirdLevelCategory.url">
                                        @{{ thirdLevelCategory.name }}
                                    </a>
                                </li>
                            </ul>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sidebar category layout -->
    <div v-else>
        <!-- Categories Navigation -->
        <div class="flex items-center">
            <!-- "All" button for opening the category drawer -->
            <div
                class="flex h-[77px] cursor-pointer items-center border-b-4 border-transparent hover:border-b-4 hover:border-navyBlue"
                @click="toggleCategoryDrawer">
                <span class="flex items-center gap-1 px-5">
                    <span class="icon-hamburger text-xl"></span>

                    @lang('shop::app.components.layouts.header.desktop.bottom.all')
                </span>
            </div>

            <!-- Show only first 4 categories in main navigation -->
            <div
                class="group relative flex h-[77px] items-center border-b-4 border-transparent hover:border-b-4 hover:border-navyBlue"
                v-for="category in categories.slice(0, 8)">
                <span>
                    <a
                        :href="category.url"
                        class="inline-block px-5">
                        @{{ category.name }}
                    </a>
                </span>

                <!-- Dropdown for each category -->
                <div
                    class="pointer-events-none absolute top-[78px] z-[1] max-h-[580px] w-max max-w-[1260px] translate-y-1 overflow-auto overflow-x-auto border border-b-0 border-l-0 border-r-0 border-t border-[#F3F3F3] bg-white p-9 opacity-0 shadow-[0_6px_6px_1px_rgba(0,0,0,.3)] transition duration-300 ease-out group-hover:pointer-events-auto group-hover:translate-y-0 group-hover:opacity-100 group-hover:duration-200 group-hover:ease-in ltr:-left-9 rtl:-right-9"
                    v-if="category.children && category.children.length">
                    <div class="flex justify-between gap-x-[70px]">
                        <div
                            class="grid w-full min-w-max max-w-[150px] flex-auto grid-cols-[1fr] content-start gap-5"
                            v-for="pairCategoryChildren in pairCategoryChildren(category)">
                            <template v-for="secondLevelCategory in pairCategoryChildren">
                                <p class="font-medium text-navyBlue">
                                    <a :href="secondLevelCategory.url">
                                        @{{ secondLevelCategory.name }}
                                    </a>
                                </p>

                                <ul
                                    class="grid grid-cols-[1fr] gap-3"
                                    v-if="secondLevelCategory.children && secondLevelCategory.children.length">
                                    <li
                                        class="text-sm font-medium text-zinc-500"
                                        v-for="thirdLevelCategory in secondLevelCategory.children">
                                        <a :href="thirdLevelCategory.url">
                                            @{{ thirdLevelCategory.name }}
                                        </a>
                                    </li>
                                </ul>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bagisto Drawer Integration -->
        <x-shop::drawer
            position="left"
            width="400px"
            ::is-active="isDrawerActive"
            @toggle="onDrawerToggle"
            @close="onDrawerClose">
            <x-slot:toggle></x-slot>

                <x-slot:header class="border-b border-gray-200">
                    <div class="flex w-full items-center justify-between">
                        <p class="text-xl font-medium">
                            @lang('shop::app.components.layouts.header.desktop.bottom.categories')
                        </p>
                    </div>
                    </x-slot>

                    <x-slot:content class="!px-0">
                        <!-- Wrapper with transition effects -->
                        <div class="relative h-full overflow-hidden">
                            <!-- Sliding container -->
                            <div
                                class="flex h-full transition-transform duration-300"
                                :class="{
                                'ltr:translate-x-0 rtl:translate-x-0': currentViewLevel !== 'third',
                                'ltr:-translate-x-full rtl:translate-x-full': currentViewLevel === 'third'
                            }">
                                <!-- First level view -->
                                <div class="h-[calc(100vh-74px)] w-full flex-shrink-0 overflow-auto">
                                    <div class="py-4">
                                        <div
                                            v-for="category in categories"
                                            :key="category.id"
                                            :class="{'mb-2': category.children && category.children.length}">
                                            <div class="flex cursor-pointer items-center justify-between px-6 py-2 transition-colors duration-200 hover:bg-gray-100">
                                                <a
                                                    :href="category.url"
                                                    class="text-base font-medium text-black">
                                                    @{{ category.name }}
                                                </a>
                                            </div>

                                            <!-- Second Level Categories -->
                                            <div v-if="category.children && category.children.length">
                                                <div
                                                    v-for="secondLevelCategory in category.children"
                                                    :key="secondLevelCategory.id">
                                                    <div
                                                        class="flex cursor-pointer items-center justify-between px-6 py-2 transition-colors duration-200 hover:bg-gray-100"
                                                        @click="showThirdLevel(secondLevelCategory, category, $event)">
                                                        <a
                                                            :href="secondLevelCategory.url"
                                                            class="text-sm font-normal">
                                                            @{{ secondLevelCategory.name }}
                                                        </a>

                                                        <span
                                                            v-if="secondLevelCategory.children && secondLevelCategory.children.length"
                                                            class="icon-arrow-right rtl:icon-arrow-left"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Third level view -->
                                <div
                                    class="h-full w-full flex-shrink-0"
                                    v-if="currentViewLevel === 'third'">
                                    <div class="border-b border-gray-200 px-6 py-4">
                                        <button
                                            @click="goBackToMainView"
                                            class="flex items-center justify-center gap-2 focus:outline-none"
                                            aria-label="Go back">
                                            <span class="icon-arrow-left rtl:icon-arrow-right text-lg"></span>

                                            <p class="text-base font-medium text-black">
                                                @lang('shop::app.components.layouts.header.desktop.bottom.back-button')
                                            </p>
                                        </button>
                                    </div>

                                    <!-- Third Level Content -->
                                    <div class="py-4">
                                        <div
                                            v-for="thirdLevelCategory in currentSecondLevelCategory?.children"
                                            :key="thirdLevelCategory.id"
                                            class="mb-2">
                                            <a
                                                :href="thirdLevelCategory.url"
                                                class="block px-6 py-2 text-sm transition-colors duration-200 hover:bg-gray-100">
                                                @{{ thirdLevelCategory.name }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </x-slot>
        </x-shop::drawer>
    </div>
</script>

<script type="module">
    app.component('v-desktop-category', {
        template: '#v-desktop-category-template',

        data() {
            return {
                isLoading: true,
                categories: [],
                isDrawerActive: false,
                currentViewLevel: 'main',
                currentSecondLevelCategory: null,
                currentParentCategory: null
            }
        },

        mounted() {
            this.getCategories();
        },

        methods: {
            getCategories() {
                this.$axios.get("{{ route('shop.api.categories.tree') }}")
                    .then(response => {
                        this.isLoading = false;
                        this.categories = response.data.data;
                    })
                    .catch(error => {
                        console.log(error);
                    });
            },

            pairCategoryChildren(category) {
                if (!category.children) return [];

                return category.children.reduce((result, value, index, array) => {
                    if (index % 2 === 0) {
                        result.push(array.slice(index, index + 2));
                    }
                    return result;
                }, []);
            },

            toggleCategoryDrawer() {
                this.isDrawerActive = !this.isDrawerActive;
                if (this.isDrawerActive) {
                    this.currentViewLevel = 'main';
                }
            },

            onDrawerToggle(event) {
                this.isDrawerActive = event.isActive;
            },

            onDrawerClose(event) {
                this.isDrawerActive = false;
            },

            showThirdLevel(secondLevelCategory, parentCategory, event) {
                if (secondLevelCategory.children && secondLevelCategory.children.length) {
                    this.currentSecondLevelCategory = secondLevelCategory;
                    this.currentParentCategory = parentCategory;
                    this.currentViewLevel = 'third';

                    if (event) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                }
            },

            goBackToMainView() {
                this.currentViewLevel = 'main';
            }
        },
    });
</script>
@endPushOnce
{!! view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.after') !!}