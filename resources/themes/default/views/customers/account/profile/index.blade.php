<x-shop::layouts.account>
    <!-- Page Title -->
    <x-slot:title>
        @lang('shop::app.customers.account.profile.index.title')
        </x-slot>

        <!-- Breadcrumbs -->
        @if ((core()->getConfigData('general.general.breadcrumbs.shop')))
        @section('breadcrumbs')
        <x-shop::breadcrumbs name="profile" />
        @endSection
        @endif

        <div class="max-md:hidden">
            <x-shop::layouts.account.navigation />
        </div>

        <div class="mx-4 flex-auto max-md:mx-6 max-sm:mx-4 p-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <!-- Back Button -->
                    <a
                        class="grid md:hidden"
                        href="{{ route('shop.customers.account.index') }}">
                        <span class="icon-arrow-left rtl:icon-arrow-right text-2xl"></span>
                    </a>

                    <h2 class="text-2xl font-medium max-md:text-xl max-sm:text-base ltr:ml-2.5 md:ltr:ml-0 rtl:mr-2.5 md:rtl:mr-0">
                        Account Overview
                    </h2>
                </div>

                {!! view_render_event('bagisto.shop.customers.account.profile.edit_button.before') !!}

                <!-- <a
                    href="{{ route('shop.customers.account.profile.edit') }}"
                    class="secondary-button border-zinc-200 px-5 py-3 font-normal max-md:rounded-lg max-md:py-2 max-sm:py-1.5 max-sm:text-sm">
                    @lang('shop::app.customers.account.profile.index.edit')
                </a> -->

                {!! view_render_event('bagisto.shop.customers.account.profile.edit_button.after') !!}
            </div>
            <!-- Cards Grid -->
            <div class="grid  gap-6 md:grid-cols-2 lg:grid-cols-2 mt-3">
                <!-- Account Details Card -->
                <div class="rounded-xl border mt-3 border-zinc-200 bg-white p-6 dark:border-gray-800 dark:bg-gray-900">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-semibold uppercase text-zinc-600 dark:text-gray-300">
                            @lang('shop::app.customers.account.profile.index.title')
                        </h3>
                        <a
                            href="{{ route('shop.customers.account.profile.edit') }}"
                            class="text-brand-dark-orange dark:text-brand-orange"
                            aria-label="Edit Profile">
                            <span class="fa fa-pencil text-2xl text-navyBlue"></span>
                        </a>
                    </div>
                    <div class="mt-6 space-y-4">
                        {!! view_render_event('bagisto.shop.customers.account.profile.name.before') !!}
                        <div>
                            <p class="text-base text-zinc-800 dark:text-white">{{ $customer->first_name }} {{ $customer->last_name }}</p>
                            <p class="text-sm text-zinc-500 dark:text-gray-400">{{ $customer->email }}</p>
                        </div>
                        {!! view_render_event('bagisto.shop.customers.account.profile.name.after') !!}

                        {!! view_render_event('bagisto.shop.customers.account.profile.gender.before') !!}
                        <div>
                            <p class="text-base text-zinc-800 dark:text-white">{{ $customer->gender ?? 'Not specified' }}</p>
                            <p class="text-sm text-zinc-500 dark:text-gray-400">@lang('shop::app.customers.account.profile.index.gender')</p>
                        </div>
                        {!! view_render_event('bagisto.shop.customers.account.profile.gender.after') !!}

                        {!! view_render_event('bagisto.shop.customers.account.profile.date_of_birth.before') !!}
                        <div>
                            <p class="text-base text-zinc-800 dark:text-white">{{ $customer->date_of_birth ?? 'Not specified' }}</p>
                            <p class="text-sm text-zinc-500 dark:text-gray-400">@lang('shop::app.customers.account.profile.index.dob')</p>
                        </div>
                        {!! view_render_event('bagisto.shop.customers.account.profile.date_of_birth.after') !!}
                    </div>
                </div>

                <!-- Address Book Card -->
                <div class="rounded-xl border border-zinc-200 bg-white p-6 dark:border-gray-800 dark:bg-gray-900">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-semibold uppercase text-zinc-600 dark:text-gray-300">
                            Address Book
                        </h3>
                        <a
                            href="{{ route('shop.customers.account.addresses.index') }}"
                            class="text-brand-dark-orange dark:text-brand-orange"
                            aria-label="Edit Address">
                            <span class="fa fa-pencil text-2xl text-navyBlue"></span>
                        </a>
                    </div>
                    @php
                    $addresses = $customer->addresses;

                    $defaultAddress = $addresses->firstWhere('default_address', true);
                    if (!$defaultAddress) {
                        $defaultAddress = $addresses->first();
                    }
                    @endphp
                    <div class="mt-6">
                        <p class="mb-2 text-base font-medium text-zinc-600 dark:text-gray-300">Your default shipping address:</p>
                        @if ($defaultAddress)
                        <div class="text-zinc-800 dark:text-white">
                            <p>{{ $defaultAddress->company_name }}</p>

                            <p>{{ $defaultAddress->address }}</p>
                            <p>{{ $defaultAddress->city }}, {{ $defaultAddress->state }} {{ $defaultAddress->postcode }}</p>
                            <p>{{ $defaultAddress->country }}</p>
                            <p>{{ $defaultAddress->phone }}</p>
                        </div>
                        @else
                        <p class="text-zinc-500 dark:text-gray-400">You have no default shipping address.</p>
                        @endif

                    </div>
                </div>

                {!! view_render_event('bagisto.shop.customers.account.profile.store_credit.before') !!}
                <!-- Placeholder for Store Credit -->
                <div class="rounded-xl border border-zinc-200 bg-white p-6 dark:border-gray-800 dark:bg-gray-900">
                    <h3 class="text-lg font-semibold uppercase text-zinc-600 dark:text-gray-300">
                        Store Credit
                    </h3>
                    <div class="mt-6">
                        <p class="text-zinc-500 dark:text-gray-400">You currently have no store credit.</p>
                    </div>
                </div>
                {!! view_render_event('bagisto.shop.customers.account.profile.store_credit.after') !!}

                <!-- Newsletter Preferences Card -->
                <div class="rounded-xl border border-zinc-200 bg-white p-6 dark:border-gray-800 dark:bg-gray-900">
                    <h3 class="text-lg font-semibold uppercase text-zinc-600 dark:text-gray-300">
                        Newsletter Preferences
                    </h3>
                    <div class="mt-6">
                        @if ($customer->subscribed_to_news_letter)
                        <p class="text-zinc-800 dark:text-white">You are currently subscribed to our newsletter.</p>
                        @else
                        <p class="text-zinc-500 dark:text-gray-400">You are not subscribed to our newsletter.</p>
                        @endif
                        <a href="{{ route('shop.customers.account.profile.edit') }}" class="mt-2 inline-block text-brand-dark-orange dark:text-brand-orange">
                            Edit Preferences
                        </a>
                    </div>
                </div>
            </div>
            <!-- Profile Information -->
            <div class="mt-8 grid grid-cols-1 gap-y-6 max-md:mt-5 max-sm:gap-y-4">




                {!! view_render_event('bagisto.shop.customers.account.profile.delete.before') !!}

                <!-- Profile Delete modal -->
                <x-shop::form action="{{ route('shop.customers.account.profile.destroy') }}">
                    <x-shop::modal>
                        <x-slot:toggle>
                            <div class="primary-button rounded-2xl px-11 py-3 max-md:hidden max-md:rounded-lg">
                                @lang('shop::app.customers.account.profile.index.delete-profile')
                            </div>

                            <div class="rounded-2xl py-3 text-center font-medium text-red-500 max-md:w-full max-md:max-w-full max-md:py-1.5 md:hidden">
                                @lang('shop::app.customers.account.profile.index.delete-profile')
                            </div>
                            </x-slot>

                            <x-slot:header>
                                <h2 class="text-2xl font-medium max-md:text-base">
                                    @lang('shop::app.customers.account.profile.index.enter-password')
                                </h2>
                                </x-slot>

                                <x-slot:content>
                                    <x-shop::form.control-group class="!mb-0">
                                        <x-shop::form.control-group.control
                                            type="password"
                                            name="password"
                                            class="px-6 py-4"
                                            rules="required"
                                            placeholder="Enter your password" />

                                        <x-shop::form.control-group.error
                                            class="text-left"
                                            control-name="password" />
                                    </x-shop::form.control-group>
                                    </x-slot>

                                    <!-- Modal Footer -->
                                    <x-slot:footer>
                                        <button
                                            type="submit"
                                            class="primary-button flex rounded-2xl px-11 py-3 max-md:rounded-lg max-md:px-6 max-md:text-sm">
                                            @lang('shop::app.customers.account.profile.index.delete')
                                        </button>
                                        </x-slot>
                    </x-shop::modal>
                </x-shop::form>

                {!! view_render_event('bagisto.shop.customers.account.profile.delete.after') !!}

            </div>
        </div>
</x-shop::layouts.account>