<!-- SEO Meta Content -->
@push('meta')
    <meta name="description" content="Sign in or create your account" />
    <meta name="keywords" content="sign in, login, create account" />
@endPush

<x-shop::layouts
    :has-header="false"
    :has-feature="false"
    :has-footer="false"
>
    <!-- Page Title -->
    <x-slot:title>
        Sign in or create your account
    </x-slot>

    {{-- Main container for the full page with a white background --}}
    <div class="flex min-h-screen flex-col bg-white">
        {{-- This container centers the content vertically and horizontally --}}
        <main class="flex-grow flex items-center justify-center p-4">

            {{-- Centered content column --}}
            <div class="w-full max-w-lg text-center">
                <!-- Company Logo -->
                <a href="{{ route('shop.home.index') }}" class="mb-8 inline-block" aria-label="Home">
                    <img
                        src="{{ bagisto_asset('images/logo-s.svg') }}"
                        alt="{{ config('app.name') }}"
                         width="100"
                        height="29">

                </a>

                <h1 class="text-2xl font-semibold text-panabay-text-primary">
                    Sign in or create your account
                </h1>

                <p class="mt-2 text-base text-panabay-text-secondary">
                    Not sure if you have an account? Enter your email and we'll check for you.
                </p>

                <!-- Form Container -->
                <div class="mt-10">
                    <x-shop::form :action="route('shop.customer.session.create')">
                        <div class="grid gap-y-6 text-left">

                            <!-- Email -->
                            <x-shop::form.control-group>
                                <x-shop::form.control-group.label class="!text-sm !font-medium text-panabay-text-primary">
                                    @lang('shop::app.customers.login-form.email')
                                </x-shop::form.control-group.label>

                                <x-shop::form.control-group.control
                                    type="email"
                                    class="!rounded-lg !border-0 !bg-[#F0F5FF] !p-4 !text-base"
                                    name="email"
                                    rules="required|email"
                                    value="{{ old('email') }}"
                                    :label="trans('shop::app.customers.login-form.email')"
                                    placeholder="email@example.com"
                                />
                                <x-shop::form.control-group.error control-name="email" />
                            </x-shop::form.control-group>

                            <!-- Password -->
                            <x-shop::form.control-group>
                                <div class="flex justify-between">
                                    <x-shop::form.control-group.label class="!text-sm !font-medium text-panabay-text-primary">
                                        @lang('shop::app.customers.login-form.password')
                                    </x-shop::form.control-group.label>

                                    <a href="{{ route('shop.customers.forgot_password.create') }}" class="cursor-pointer text-sm font-medium text-panabay-text-primary hover:text-panabay-primary hover:underline">
                                        @lang('shop::app.customers.login-form.forgot-pass')
                                    </a>
                                </div>

                                <x-shop::form.control-group.control
                                    type="password"
                                    class="!rounded-lg !border-0 !bg-[#F0F5FF] !p-4 !text-base"
                                    id="password"
                                    name="password"
                                    rules="required|min:6"
                                    :label="trans('shop::app.customers.login-form.password')"
                                    :placeholder="trans('shop::app.customers.login-form.password')"
                                />
                                <x-shop::form.control-group.error control-name="password" />
                            </x-shop::form.control-group>

                            <!-- Submit Button -->
                            <button
                                class="primary-button  rounded-full py-3.5 m-0 mx-auto block w-full max-w-full rounded-2xl px-11 py-4 text-center text-base max-md:max-w-full max-md:rounded-lg max-md:py-3 max-sm:py-1.5 ltr:ml-0 rtl:mr-0"
                                type="submit"
                            >
                                @lang('shop::app.customers.login-form.button-title')
                            </button>
                              <div class="flex flex-wrap gap-4 text-center" style="text-align: center;justify-content:center;">
                                {!! view_render_event('bagisto.shop.customers.login_form_controls.after') !!}
                            </div>
                        </div>
                    </x-shop::form>
                </div>
            </div>
        </main>

        {{-- Footer section at the bottom --}}
        <footer class="border-t border-panabay-border p-6 text-center">
             <p class="mb-4 text-xs text-panabay-text-secondary">
                Securing your personal information is our priority. <a href="/page/privacy-policy" class="font-medium text-panabay-text-primary hover:underline">See our privacy measures.</a>
            </p>

            <p class="font-medium text-panabay-text-secondary">
                @lang('shop::app.customers.login-form.new-customer')

                <a
                    class=" text-panabay-text-primary hover:text-panabay-primary hover:underline"
                    href="{{ route('shop.customers.register.index') }}"
                >
                    @lang('shop::app.customers.login-form.create-your-account')
                </a>
            </p>
        </footer>
    </div>
</x-shop::layouts>