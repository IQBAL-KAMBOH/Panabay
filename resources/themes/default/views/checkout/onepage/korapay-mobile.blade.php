<!-- SEO Meta Content -->
@push('meta')
    <meta name="description" content="@lang('shop::app.checkout.cart.index.cart')"/>

    <meta name="keywords" content="@lang('shop::app.checkout.cart.index.cart')"/>
@endPush

<x-shop::layouts
    :has-header="true"
    :has-feature="false"
    :has-footer="false"
>
    <!-- Page Title -->
    <x-slot:title>
        Korapay Payment
    </x-slot>



    <div class="flex-auto">
        <div class="container px-[60px] max-lg:px-8 max-md:px-4">

            {!! view_render_event('bagisto.shop.checkout.cart.breadcrumbs.before') !!}

            <!-- Breadcrumbs -->
            @if ((core()->getConfigData('general.general.breadcrumbs.shop')))
                <x-shop::breadcrumbs name="cart" />
            @endif

            {!! view_render_event('bagisto.shop.checkout.cart.breadcrumbs.after') !!}

            @php
                $errors = \Webkul\Checkout\Facades\Cart::getErrors();
            @endphp

            @if (! empty($errors) && $errors['error_code'] === 'MINIMUM_ORDER_AMOUNT')
                <div class="mt-5 w-full gap-12 rounded-lg bg-[#FFF3CD] px-5 py-3 text-[#383D41] max-sm:px-3 max-sm:py-2 max-sm:text-sm">
                    {{ $errors['message'] }}: {{ $errors['amount'] }}
                </div>
            @endif

            <v-cart ref="vCart">
                <!-- Cart Shimmer Effect -->
                <x-shop::shimmer.checkout.cart :count="3" />
            </v-cart>
        </div>
    </div>
    <div class="checkout-process">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-8 offset-lg-3 offset-md-2">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">{{ __('Complete Your Payment') }}</h4>
                                </div>
                                <div class="card-body">
                                    <p class="mb-4">
                                        {{ $transaction['message'] ?? 'Please enter the OTP sent to your mobile phone to authorize this payment.' }}
                                    </p>

                                    <form id="korapay-otp-form" onsubmit="authorizePayment(event)">
                                        @csrf

                                        <!-- Hidden input to hold the transaction reference -->
                                        <input type="hidden" id="transaction_reference" value="{{ $transaction['transaction_reference'] }}">

                                        <div class="form-group" :class="[errors.has('otp') ? 'has-error' : '']">
                                            <label for="otp" class="required">{{ __('Enter OTP') }}</label>
                                            <input type="text" class="form-control" id="otp" name="otp" v-validate="'required|numeric|min:4'" placeholder="123456">
                                            <span class="control-error" v-if="errors.has('otp')">@{{ errors.first('otp') }}</span>
                                        </div>

                                        <div id="error-message" class="alert alert-danger" style="display: none;"></div>

                                        <div class="d-flex justify-content-between">
                                            <a href="{{ route('shop.checkout.cart.index') }}" class="btn btn-lg btn-light">
                                                {{ __('shop::app.buttons.cancel') }}
                                            </a>
                                            <button type="submit" id="submit-button" class="btn btn-lg btn-primary">
                                                {{ __('Authorize Payment') }}
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




</x-shop::layouts>
