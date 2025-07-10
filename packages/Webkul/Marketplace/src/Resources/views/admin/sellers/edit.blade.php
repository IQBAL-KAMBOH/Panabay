<x-admin::layouts>
    <!-- Title of the page -->
    <x-slot:title>
        @lang('marketplace::app.admin.sellers.edit.title')
    </x-slot:title>

    {!! view_render_event('marketplace.admin.seller.edit.before', ['seller' => $seller]) !!}
    
    <!-- Seller Profile Edit Form -->
    <x-admin::form
        :action="route('admin.marketplace.sellers.update', $seller->id)"
        enctype="multipart/form-data"
        method="PUT"
    >
        <div class="flex items-center justify-between gap-4 max-sm:flex-wrap">
            <div class="flex gap-3">
                <p class="text-xl font-bold text-gray-800 dark:text-white">
                    {{ $seller->name }}
                </p>

                @if ($seller->is_suspended)
                    <label class="label-canceled">
                        @lang('marketplace::app.admin.sellers.edit.suspended')
                    </label>
                @endif
            </div>
            
            <div class="flex items-center gap-x-2.5">
                <!-- Back Button -->
                <a
                    href="{{ route('admin.marketplace.sellers.index') }}"
                    class="transparent-button hover:bg-gray-200 dark:text-white dark:hover:bg-gray-800"
                >
                    @lang('marketplace::app.admin.sellers.edit.back-btn')
                </a>

                <!-- Update Button -->
                <button
                    type="submit"
                    class="primary-button"
                >
                    @lang('marketplace::app.admin.sellers.edit.update-btn')
                </button>
            </div>
        </div>

        {!! view_render_event('marketplace.admin.seller.edit.full_panel.before', ['seller' => $seller]) !!}

        <!-- Full Panel -->
        <div class="mt-3.5 flex gap-2.5 max-xl:flex-wrap">
            {!! view_render_event('marketplace.admin.seller.edit.left_section.before', ['seller' => $seller]) !!}

            <!-- Left Section -->
            <div class="flex flex-1 flex-col gap-2 max-xl:flex-auto">
                {!! view_render_event('marketplace.admin.seller.edit.card.shop_information.before', ['seller' => $seller]) !!}

                <!-- Shop Information -->
                <div class="box-shadow rounded bg-white p-4 dark:bg-gray-900">
                    <p class="mb-4 text-base font-semibold text-gray-800 dark:text-white">
                        @lang('marketplace::app.admin.sellers.edit.shop.title')
                    </p>

                    <div class="flex gap-4 max-sm:flex-wrap">
                        <!-- Shop Title -->
                        <x-admin::form.control-group class="mb-2.5 w-full">
                            <x-admin::form.control-group.label class="required">
                                @lang('marketplace::app.admin.sellers.edit.shop.shop-title')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="text"
                                name="shop_title"
                                :value="old('shop_title') ?: $seller->shop_title"
                                rules="required"
                                :label="trans('marketplace::app.admin.sellers.edit.shop.shop-title')"
                                :placeholder="trans('marketplace::app.admin.sellers.edit.shop.shop-title')"
                            />

                            <x-admin::form.control-group.error control-name="shop_title" />
                        </x-admin::form.control-group>

                        <!-- Shop URL -->
                        <x-admin::form.control-group class="mb-2.5 w-full">
                            <x-admin::form.control-group.label class="required">
                                @lang('marketplace::app.admin.sellers.edit.shop.url')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="text"
                                name="url"
                                :value="old('url') ?: $seller->url"
                                rules="required"
                                :label="trans('marketplace::app.admin.sellers.edit.shop.url')"
                                :placeholder="trans('marketplace::app.admin.sellers.edit.shop.url')"
                            />

                            <x-admin::form.control-group.error control-name="url" />
                        </x-admin::form.control-group>
                    </div>

                    <div class="flex gap-4 max-sm:flex-wrap">
                        <!-- Name -->
                        <x-admin::form.control-group class="mb-2.5 w-full">
                            <x-admin::form.control-group.label class="required">
                                @lang('marketplace::app.admin.sellers.edit.shop.name')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="text"
                                name="name"
                                rules="required"
                                :value="old('name') ?: $seller->name"
                                :label="trans('marketplace::app.admin.sellers.edit.shop.name')"
                                :placeholder="trans('marketplace::app.admin.sellers.edit.shop.name')"
                            />

                            <x-admin::form.control-group.error control-name="name" />
                        </x-admin::form.control-group>

                        <!-- Phone -->
                        <x-admin::form.control-group class="mb-2.5 w-full">
                            <x-admin::form.control-group.label class="required">
                                @lang('marketplace::app.admin.sellers.edit.shop.phone-number')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="text"
                                name="phone"
                                :value="old('phone') ?: $seller->phone"
                                rules="required|phone"
                                :label="trans('marketplace::app.admin.sellers.edit.shop.phone-number')"
                                :placeholder="trans('marketplace::app.admin.sellers.edit.shop.phone-number')"
                            />

                            <x-admin::form.control-group.error control-name="phone" />
                        </x-admin::form.control-group>
                    </div>

                    <x-admin::form.control-group class="mb-2.5 w-full">
                        <x-admin::form.control-group.label class="required">
                            @lang('marketplace::app.admin.sellers.edit.shop.email')
                        </x-admin::form.control-group.label>

                        <x-admin::form.control-group.control
                            type="text"
                            name="email"
                            rules="required"
                            :value="old('email') ?: $seller->email"
                            :label="trans('marketplace::app.admin.sellers.edit.shop.email')"
                            :placeholder="trans('marketplace::app.admin.sellers.edit.shop.email')"
                        />

                        <x-admin::form.control-group.error control-name="email" />
                    </x-admin::form.control-group>

                    <x-admin::form.control-group class="mb-2.5">
                        <x-admin::form.control-group.label class="required">
                            @lang('marketplace::app.admin.sellers.edit.shop.description')
                        </x-admin::form.control-group.label>

                        <x-admin::form.control-group.control
                            type="textarea"
                            name="description"
                            :value="old('description') ?: $seller->description"
                            id="content"
                            rules="required"
                            :label="trans('marketplace::app.admin.sellers.edit.shop.description')"
                            :placeholder="trans('marketplace::app.admin.sellers.edit.shop.description')"
                            :tinymce="true"
                        />

                        <x-admin::form.control-group.error control-name="description" />
                    </x-admin::form.control-group>
                </div>

                <!-- Policy Blade File -->
                @include('marketplace::admin.sellers.edit.policy')

                <!-- Meta Blade File -->
                @include('marketplace::admin.sellers.edit.meta')
            </div>

            {!! view_render_event('marketplace.admin.seller.edit.right_section.before', ['seller' => $seller]) !!}

            <!-- Right Section -->
            <div class="flex w-[360px] max-w-full flex-col gap-2">
                {!! view_render_event('marketplace.admin.seller.edit.card.profile_info.before', ['seller' => $seller]) !!}

                <!-- Profile Information -->
                <div class="box-shadow rounded bg-white p-4 dark:bg-gray-900">
                    <p class="mb-4 text-base font-semibold text-gray-800 dark:text-white">
                        @lang('marketplace::app.admin.sellers.edit.profile.title')
                    </p>

                    <div class="border-b pb-2.5 dark:border-gray-800">
                        <x-admin::form.control-group>
                            <x-admin::form.control-group.label>
                                @lang('marketplace::app.admin.sellers.edit.profile.banner')
                            </x-admin::form.control-group.label>

                            <x-admin::media.images
                                name="banner"
                                width="328px"
                                height="120px"
                                :uploaded-images="$seller->banner ? [['id' => 'banner', 'url' => Storage::url($seller->banner)]] : []"
                            />
                        </x-admin::form.control-group>

                        <p class="text-xs text-gray-600 dark:text-gray-300">
                            @lang('marketplace::app.admin.sellers.edit.profile.banner-size')
                        </p>
                    </div>

                    <div class="border-b py-2.5 dark:border-gray-800 flex gap-4 max-sm:flex-wrap mb-2.5">
                        <div class="w-full border-r dark:border-gray-800 pr-5">
                            <x-admin::form.control-group>
                                <x-admin::form.control-group.label>
                                    @lang('marketplace::app.admin.sellers.edit.profile.logo')
                                </x-admin::form.control-group.label>

                                <x-admin::media.images
                                    name="logo"
                                    width="60px"
                                    height="60px"
                                    :uploaded-images="$seller->logo ? [['id' => 'logo', 'url' => Storage::url($seller->logo)]] : []"
                                />
                            </x-admin::form.control-group>

                            <p class="text-xs text-gray-600 dark:text-gray-300">
                                @lang('marketplace::app.admin.sellers.edit.profile.logo-size')
                            </p>
                        </div>

                        <div class="flex flex-col gap-2.5 w-full">
                            <x-admin::form.control-group class="w-full mb-2.5">
                                <x-admin::form.control-group.label>
                                    @lang('marketplace::app.admin.sellers.edit.suspended')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="switch"
                                    name="is_suspended"
                                    :value="1"
                                    :checked="(bool) old('is_suspended', $seller->is_suspended)"
                                    :label="trans('marketplace::app.admin.sellers.edit.suspended')"
                                />
                                
                                <x-admin::form.control-group.error control-name="is_suspended" />
                            </x-admin::form.control-group>

                            @if (core()->getConfigData('marketplace.settings.seller.enable_minimum_order_amount'))
                                <!-- Minimum Order Amount -->
                                <x-admin::form.control-group class="mb-2.5">
                                    <x-admin::form.control-group.label>
                                        @lang('marketplace::app.admin.sellers.edit.minimum-order-amount.title')
                                    </x-admin::form.control-group.label>

                                    <x-admin::form.control-group.control
                                        type="price"
                                        name="min_order_amount"
                                        :value="old('min_order_amount') ?: $seller->min_order_amount"
                                        rules="decimal|min_value:0.01"
                                        :label="trans('marketplace::app.admin.sellers.edit.minimum-order-amount.title')"
                                        :placeholder="100"
                                    />

                                    <x-admin::form.control-group.error control-name="min_order_amount" />
                                </x-admin::form.control-group>
                            @endif
                        </div>
                    </div>

                    @php
                        $socialLinks = ['facebook', 'twitter', 'pinterest', 'linkedin']
                    @endphp

                    @foreach($socialLinks as $socialLink)
                        <x-admin::form.control-group class="mb-2.5">
                            <x-admin::form.control-group.label>
                                @lang('marketplace::app.admin.sellers.edit.profile.social-links', ['name' => Str::title($socialLink)])
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="text"
                                :name="$socialLink"
                                :value="old($socialLink) ?: $seller->$socialLink"
                                :label="trans('marketplace::app.admin.sellers.edit.profile.social-links', ['name' => $socialLink])"
                                :placeholder="trans('marketplace::app.admin.sellers.edit.profile.social-links', ['name' => $socialLink])"
                            />

                            <x-admin::form.control-group.error :control-name="$socialLink" />
                        </x-admin::form.control-group>
                    @endforeach
                </div>

                <!-- Address Blade File -->
                @include('marketplace::admin.sellers.edit.address')
                    
                <!-- Commission Blade File -->
                @include('marketplace::admin.sellers.edit.commission')

                {!! view_render_event('marketplace.admin.seller.edit.card.allowed_products.before', ['seller' => $seller]) !!}

                <!-- Allowed Products -->
                <div class="box-shadow rounded bg-white p-4 dark:bg-gray-900">
                    <p class="mb-4 text-base font-semibold text-gray-800 dark:text-white">
                        @lang('marketplace::app.admin.sellers.edit.allowed-product.title')
                    </p>
                    
                    @foreach (config('product_types') as $productType)
                        <x-admin::form.control-group class="!mb-2 flex items-center gap-2.5 last:!mb-0">
                            <x-admin::form.control-group.control
                                type="checkbox"
                                :id="'product_type_' . $productType['key']"
                                name="allowed_product_types[]"
                                :value="$productType['key']"
                                :for="'product_type_' . $productType['key']"
                                :checked="in_array($productType['key'], $seller->allowed_product_types ?? [])"
                            />
        
                            <label
                                class="cursor-pointer text-sm text-gray-600 hover:text-gray-800"
                                for="'product_type_' . $productType['key']"
                            >
                                @lang($productType['name'])
                            </label>
                        </x-admin::form.control-group>
                    @endforeach
                </div>

                {!! view_render_event('marketplace.admin.seller.edit.card.google_analytics.before', ['seller' => $seller]) !!}

                <!-- Google Analytics Id -->
                <div class="box-shadow rounded bg-white p-4 dark:bg-gray-900">
                    <p class="mb-4 text-base font-semibold text-gray-800 dark:text-white">
                        @lang('marketplace::app.admin.sellers.edit.google-analytics-id.title')
                    </p>

                    <x-admin::form.control-group class="mb-2.5">
                        <x-admin::form.control-group.label>
                            @lang('marketplace::app.admin.sellers.edit.google-analytics-id.title')
                        </x-admin::form.control-group.label>

                        <x-admin::form.control-group.control
                            type="text"
                            name="google_analytics_id"
                            :value="old('google_analytics_id') ?: $seller->google_analytics_id"
                            :label="trans('marketplace::app.admin.sellers.edit.google-analytics-id.title')"
                            :placeholder="trans('marketplace::app.admin.sellers.edit.google-analytics-id.title')"
                        />

                        <x-admin::form.control-group.error control-name="google_analytics_id" />
                    </x-admin::form.control-group>                  
                </div>

                <!-- Channels Blade File -->
                @include('marketplace::admin.sellers.edit.channels')

                <!-- Users Blade File -->
                @include('marketplace::admin.sellers.edit.users')
            </div>

            {!! view_render_event('marketplace.admin.seller.edit.right_section.after', ['seller' => $seller]) !!}
        </div>

        {!! view_render_event('marketplace.admin.seller.edit.full_panel.after', ['seller' => $seller]) !!}
    </x-admin::form>

    {!! view_render_event('marketplace.admin.seller.edit.after', ['seller' => $seller]) !!}
</x-admin::layouts>
