<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html
    lang="{{ app()->getLocale() }}"
    dir="{{ core()->getCurrentLocale()->direction }}"
>
    <head>
        <!-- meta tags -->
        <meta
            http-equiv="Cache-control"
            content="no-cache"
        >

        <meta
            http-equiv="Content-Type"
            content="text/html; charset=utf-8"
        />

        @php
            $fontPath = [];

            // Get the default locale code.
            $getLocale = app()->getLocale();

            // Get the current currency code.
            $currencyCode = core()->getBaseCurrencyCode();

            if ($getLocale == 'en' && $currencyCode == 'INR') {
                $fontFamily = [
                    'regular' => 'DejaVu Sans',
                    'bold'    => 'DejaVu Sans',
                ];
            }  else {
                $fontFamily = [
                    'regular' => 'Arial, sans-serif',
                    'bold'    => 'Arial, sans-serif',
                ];
            }

            if (in_array($getLocale, ['ar', 'he', 'fa', 'tr', 'ru', 'uk'])) {
                $fontFamily = [
                    'regular' => 'DejaVu Sans',
                    'bold'    => 'DejaVu Sans',
                ];
            } elseif ($getLocale == 'zh_CN') {
                $fontPath = [
                    'regular' => asset('fonts/NotoSansSC-Regular.ttf'),
                    'bold'    => asset('fonts/NotoSansSC-Bold.ttf'),
                ];

                $fontFamily = [
                    'regular' => 'Noto Sans SC',
                    'bold'    => 'Noto Sans SC Bold',
                ];
            } elseif ($getLocale == 'ja') {
                $fontPath = [
                    'regular' => asset('fonts/NotoSansJP-Regular.ttf'),
                    'bold'    => asset('fonts/NotoSansJP-Bold.ttf'),
                ];

                $fontFamily = [
                    'regular' => 'Noto Sans JP',
                    'bold'    => 'Noto Sans JP Bold',
                ];
            } elseif ($getLocale == 'hi_IN') {
                $fontPath = [
                    'regular' => asset('fonts/Hind-Regular.ttf'),
                    'bold'    => asset('fonts/Hind-Bold.ttf'),
                ];

                $fontFamily = [
                    'regular' => 'Hind',
                    'bold'    => 'Hind Bold',
                ];
            } elseif ($getLocale == 'bn') {
                $fontPath = [
                    'regular' => asset('fonts/NotoSansBengali-Regular.ttf'),
                    'bold'    => asset('fonts/NotoSansBengali-Bold.ttf'),
                ];

                $fontFamily = [
                    'regular' => 'Noto Sans Bengali',
                    'bold'    => 'Noto Sans Bengali Bold',
                ];
            } elseif ($getLocale == 'sin') {
                $fontPath = [
                    'regular' => asset('fonts/NotoSansSinhala-Regular.ttf'),
                    'bold'    => asset('fonts/NotoSansSinhala-Bold.ttf'),
                ];

                $fontFamily = [
                    'regular' => 'Noto Sans Sinhala',
                    'bold'    => 'Noto Sans Sinhala Bold',
                ];
            }

            $seller = seller()->user();

            $logo = $seller->logo
                ? Storage::url($seller->logo)
                : bagisto_asset('images/logo.svg');
        @endphp

        <!-- lang supports inclusion -->
        <style type="text/css">
            @if (! empty($fontPath['regular']))
                @font-face {
                    src: url({{ $fontPath['regular'] }}) format('truetype');
                    font-family: {{ $fontFamily['regular'] }};
                }
            @endif

            @if (! empty($fontPath['bold']))
                @font-face {
                    src: url({{ $fontPath['bold'] }}) format('truetype');
                    font-family: {{ $fontFamily['bold'] }};
                    font-style: bold;
                }
            @endif

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: {{ $fontFamily['regular'] }};
            }

            body {
                font-size: 10px;
                color: #060c3b;
                font-family: "{{ $fontFamily['regular'] }}";
            }

            b, th {
                font-family: "{{ $fontFamily['bold'] }}";
            }

            .page-content {
                padding: 12px;
            }

            .page-header {
                border-bottom: 1px solid #E9EFFC;
                text-align: center;
                font-size: 24px;
                text-transform: uppercase;
                color: #060c3b;
                padding: 24px 0;
                margin: 0;
            }

            .logo-container {
                position: absolute;
                top: 20px;
                left: 20px;
            }

            .logo-container.rtl {
                left: auto;
                right: 20px;
            }

            .logo-container img {
                max-width: 100%;
                height: auto;
            }

            .page-header b {
                display: inline-block;
                vertical-align: middle;
            }

            .small-text {
                font-size: 7px;
            }

            table {
                width: 100%;
                border-spacing: 1px 0;
                border-collapse: separate;
                margin-bottom: 16px;
            }

            table thead th {
                background-color: #E9EFFC;
                color: #060c3b;
                padding: 6px 18px;
                text-align: left;
            }

            table.rtl thead tr th {
                text-align: right;
            }

            table tbody td {
                padding: 9px 18px;
                border-bottom: 1px solid #E9EFFC;
                text-align: left;
                vertical-align: top;
            }

            table.rtl tbody tr td {
                text-align: right;
            }

            .summary {
                width: 100%;
                display: inline-block;
            }

            .summary table {
                float: right;
                width: 250px;
                padding-top: 5px;
                padding-bottom: 5px;
                background-color: #E9EFFC;
                white-space: nowrap;
            }

            .summary table.rtl {
                width: 280px;
            }

            .summary table.rtl {
                margin-right: 480px;
            }

            .summary table td {
                padding: 5px 10px;
            }

            .summary table td:nth-child(2) {
                text-align: center;
            }

            .summary table td:nth-child(3) {
                text-align: right;
            }
        </style>
    </head>

    <body dir="{{ core()->getCurrentLocale()->direction }}">
        <div class="logo-container {{ core()->getCurrentLocale()->direction }}">
            <img src="data:image/png;base64,{{ base64_encode(file_get_contents($logo)) }}"/>
        </div>

        <div class="page">
            <!-- Header -->
            <div class="page-header">
                <b>@lang('marketplace::app.seller.orders.view.invoices.invoice')</b>
            </div>

            <div class="page-content">
                <!-- Invoice Information -->
                <table class="{{ core()->getCurrentLocale()->direction }}">
                    <tbody>
                        <tr>
                            @if (core()->getConfigData('sales.invoice_settings.pdf_print_outs.invoice_id'))
                                <td style="width: 50%; padding: 2px 18px;border:none;">
                                    <b>
                                        @lang('marketplace::app.seller.orders.view.invoices.invoice-id'):
                                    </b>

                                    <span>
                                        #{{ $invoice->id }}
                                    </span>
                                </td>
                            @endif

                            @if (core()->getConfigData('sales.invoice_settings.pdf_print_outs.order_id'))
                                <td style="width: 50%; padding: 2px 18px;border:none;">
                                    <b>
                                        @lang('marketplace::app.seller.orders.view.invoices.order-id'):
                                    </b>

                                    <span>
                                        #{{ $invoice->order->order->increment_id }}
                                    </span>
                                </td>
                            @endif
                        </tr>

                        <tr>
                            <td style="width: 50%; padding: 2px 18px;border:none;">
                                <b>
                                    @lang('marketplace::app.seller.orders.view.invoices.date'):
                                </b>

                                <span>
                                    {{ core()->formatDate($invoice->created_at, 'd-m-Y') }}
                                </span>
                            </td>

                            <td style="width: 50%; padding: 2px 18px;border:none;">
                                <b>
                                    @lang('marketplace::app.seller.orders.view.invoices.order-date'):
                                </b>

                                <span>
                                    {{ core()->formatDate($invoice->order->created_at, 'd-m-Y') }}
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <!-- Invoice Information -->
                <table class="{{ core()->getCurrentLocale()->direction }}">
                    <tbody>
                        <tr>
                            @if (! empty(core()->getConfigData('sales.shipping.origin.country')))
                                <td style="width: 50%; padding: 2px 18px;border:none;">
                                    <b style="display: inline-block; margin-bottom: 4px;">
                                        {{ core()->getConfigData('sales.shipping.origin.store_name') }}
                                    </b>

                                    <div>
                                        <div>{{ core()->getConfigData('sales.shipping.origin.address') }}</div>

                                        <div>{{ core()->getConfigData('sales.shipping.origin.zipcode') . ' ' . core()->getConfigData('sales.shipping.origin.city') }}</div>

                                        <div>{{ core()->getConfigData('sales.shipping.origin.state') . ', ' . core()->getConfigData('sales.shipping.origin.country') }}</div>
                                    </div>
                                </td>
                            @endif

                            <td style="width: 50%; padding: 2px 18px;border:none;">
                                @if ($invoice->invoice->hasPaymentTerm())
                                    <div style="margin-bottom: 12px">
                                        <b style="display: inline-block; margin-bottom: 4px;">
                                            @lang('marketplace::app.seller.orders.view.invoices.payment-terms'):
                                        </b>

                                        <span>
                                            {{ $invoice->invoice->getFormattedPaymentTerm() }}
                                        </span>
                                    </div>
                                @endif

                                @if (core()->getConfigData('sales.shipping.origin.bank_details'))
                                    <div>
                                        <b style="display: inline-block; margin-bottom: 4px;">
                                            @lang('marketplace::app.seller.orders.view.invoices.bank-details'):
                                        </b>

                                        <div>
                                            {!! nl2br(core()->getConfigData('sales.shipping.origin.bank_details')) !!}
                                        </div>
                                    </div>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>

                @php
                    $billingAddress = $invoice->order->order->billing_address;
                    $shippingAddress = $invoice->order->order->shipping_address;
                @endphp

                <!-- Billing & Shipping Address -->
                <table class="{{ core()->getCurrentLocale()->direction }}">
                    <thead>
                        <tr>
                            @if ($billingAddress)
                                <th style="width: 50%;">
                                    <b>
                                        @lang('marketplace::app.seller.orders.view.invoices.bill-to')
                                    </b>
                                </th>
                            @endif

                            @if ($shippingAddress)
                                <th style="width: 50%">
                                    <b>
                                        @lang('marketplace::app.seller.orders.view.invoices.ship-to')
                                    </b>
                                </th>
                            @endif
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            @if ($billingAddress)
                                <td style="width: 50%">
                                    <div>{{ $billingAddress->company_name ?? '' }}<div>

                                    <div>{{ $billingAddress->name }}</div>

                                    <div>{{ $billingAddress->address }}</div>

                                    <div>{{ $billingAddress->postcode . ' ' . $billingAddress->city }}</div>

                                    <div>{{ $billingAddress->state . ', ' . core()->country_name($billingAddress->country) }}</div>

                                    <div>@lang('marketplace::app.seller.orders.view.invoices.contact'): {{ $billingAddress->phone }}</div>
                                </td>
                            @endif

                            @if ($shippingAddress)
                                <td style="width: 50%">
                                    <div>{{ $shippingAddress->company_name ?? '' }}<div>

                                    <div>{{ $shippingAddress->name }}</div>

                                    <div>{{ $shippingAddress->address }}</div>

                                    <div>{{ $shippingAddress->postcode . ' ' . $shippingAddress->city }}</div>

                                    <div>{{ $shippingAddress->state . ', ' . core()->country_name($shippingAddress->country) }}</div>

                                    <div>@lang('marketplace::app.seller.orders.view.invoices.contact'): {{ $shippingAddress->phone }}</div>
                                </td>
                            @endif
                        </tr>
                    </tbody>
                </table>

                <!-- Payment & Shipping Methods -->
                <table class="{{ core()->getCurrentLocale()->direction }}">
                    <thead>
                        <tr>
                            <th style="width: 50%">
                                <b>
                                    @lang('marketplace::app.seller.orders.view.invoices.payment-method')
                                </b>
                            </th>

                            @if ($shippingAddress)
                                <th style="width: 50%">
                                    <b>
                                        @lang('marketplace::app.seller.orders.view.invoices.shipping-method')
                                    </b>
                                </th>
                            @endif
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td style="width: 50%">
                                {{ core()->getConfigData('sales.payment_methods.' . $invoice->order->order->payment->method . '.title') }}

                                @php
                                    $additionalDetails = \Webkul\Payment\Payment::getAdditionalDetails($invoice->order->order->payment->method);
                                @endphp

                                @if (! empty($additionalDetails))
                                    <div class="row small-text">
                                        <span>{{ $additionalDetails['title'] }}:</span>

                                        <span>{{ $additionalDetails['value'] }}</span>
                                    </div>
                                @endif
                            </td>

                            @if ($shippingAddress)
                                <td style="width: 50%">
                                    {{ $invoice->order->order->shipping_title }}
                                </td>
                            @endif
                        </tr>
                    </tbody>
                </table>

                <!-- Items -->
                <div class="items">
                    <table class="{{ core()->getCurrentLocale()->direction }}">
                        <thead>
                            <tr>
                                <th>
                                    @lang('SKU')
                                </th>

                                <th>
                                    @lang('marketplace::app.seller.orders.view.invoices.product-name')
                                </th>

                                <th>
                                    @lang('marketplace::app.seller.orders.view.invoices.price')
                                </th>

                                <th>
                                    @lang('marketplace::app.seller.orders.view.invoices.qty')
                                </th>

                                <th>
                                    @lang('marketplace::app.seller.orders.view.invoices.subtotal')
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($invoice->items as $invoiceItem)
                                @php
                                    $item = $invoiceItem->item;
                                @endphp

                                <tr>
                                    <td>
                                        {{ $item->getTypeInstance()->getOrderedItem($item)->sku }}
                                    </td>

                                    <td>
                                        {{ $item->name }}

                                        @if (isset($item->additional['attributes']))
                                            <div>
                                                @foreach ($item->additional['attributes'] as $attribute)
                                                    @if (
                                                        ! isset($attribute['attribute_type'])
                                                        || $attribute['attribute_type'] !== 'file'
                                                    )
                                                        <b>{{ $attribute['attribute_name'] }} : </b>{{ $attribute['option_label'] }}<br>
                                                    @else
                                                        <b>{{ $attribute['attribute_name'] }} : </b>

                                                        <a
                                                            href="{{ Storage::url($attribute['option_label']) }}"
                                                            class="text-blue-600 hover:underline"
                                                            download="{{ File::basename($attribute['option_label']) }}"
                                                        >
                                                            {{ File::basename($attribute['option_label']) }}
                                                        </a>

                                                        <br>
                                                    @endif
                                                @endforeach
                                            </div>
                                        @endif
                                    </td>

                                    <td>
                                        @if (core()->getConfigData('sales.taxes.sales.display_prices') == 'including_tax')
                                            {!! core()->formatBasePrice($item->base_price_incl_tax) !!}
                                        @elseif (core()->getConfigData('sales.taxes.sales.display_prices') == 'both')
                                            {!! core()->formatBasePrice($item->base_price_incl_tax) !!}

                                            <div class="small-text">
                                                @lang('marketplace::app.seller.orders.view.invoices.excl-tax')

                                                <span>
                                                    {{ core()->formatPrice($item->base_price) }}
                                                </span>
                                            </div>
                                        @else
                                            {!! core()->formatBasePrice($item->base_price) !!}
                                        @endif
                                    </td>

                                    <td>
                                        {{ $item->qty }}
                                    </td>

                                    <td>
                                        @if (core()->getConfigData('sales.taxes.sales.display_subtotal') == 'including_tax')
                                            {!! core()->formatBasePrice($item->base_total_incl_tax) !!}
                                        @elseif (core()->getConfigData('sales.taxes.sales.display_subtotal') == 'both')
                                            {!! core()->formatBasePrice($item->base_total_incl_tax) !!}

                                            <div class="small-text">
                                                @lang('marketplace::app.seller.orders.view.invoices.excl-tax')

                                                <span>
                                                    {{ core()->formatPrice($item->base_total) }}
                                                </span>
                                            </div>
                                        @else
                                            {!! core()->formatBasePrice($item->base_total) !!}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Summary Table -->
                <div class="summary">
                    <table class="{{ core()->getCurrentLocale()->direction }}">
                        <tbody>
                            @if (core()->getConfigData('sales.taxes.sales.display_subtotal') == 'including_tax')
                                <tr>
                                    <td>@lang('marketplace::app.seller.orders.view.invoices.subtotal')</td>
                                    <td>-</td>
                                    <td>{!! core()->formatBasePrice($invoice->base_sub_total_incl_tax) !!}</td>
                                </tr>
                            @elseif (core()->getConfigData('sales.taxes.sales.display_subtotal') == 'both')
                                <tr>
                                    <td>@lang('marketplace::app.seller.orders.view.invoices.subtotal-incl-tax')</td>
                                    <td>-</td>
                                    <td>{!! core()->formatBasePrice($invoice->base_sub_total_incl_tax) !!}</td>
                                </tr>

                                <tr>
                                    <td>@lang('marketplace::app.seller.orders.view.invoices.subtotal-excl-tax')</td>
                                    <td>-</td>
                                    <td>{!! core()->formatBasePrice($invoice->base_sub_total) !!}</td>
                                </tr>
                            @else
                                <tr>
                                    <td>@lang('marketplace::app.seller.orders.view.invoices.subtotal')</td>
                                    <td>-</td>
                                    <td>{!! core()->formatBasePrice($invoice->base_sub_total) !!}</td>
                                </tr>
                            @endif

                            <tr>
                                <td>@lang('marketplace::app.seller.orders.view.invoices.shipping-handling')</td>
                                <td>-</td>
                                <td>{!! core()->formatBasePrice(0) !!}</td>
                            </tr>

                            <tr>
                                <td>@lang('marketplace::app.seller.orders.view.invoices.tax')</td>
                                <td>-</td>
                                <td>{!! core()->formatBasePrice($invoice->base_tax_amount) !!}</td>
                            </tr>

                            <tr>
                                <td>@lang('marketplace::app.seller.orders.view.invoices.discount')</td>
                                <td>-</td>
                                <td>{!! core()->formatBasePrice($invoice->base_discount_amount) !!}</td>
                            </tr>

                            <tr>
                                <td style="border-top: 1px solid #FFFFFF;">
                                    <b>@lang('marketplace::app.seller.orders.view.invoices.grand-total')</b>
                                </td>
                                <td style="border-top: 1px solid #FFFFFF;">-</td>
                                <td style="border-top: 1px solid #FFFFFF;">
                                    <b>{!! core()->formatBasePrice($invoice->base_grand_total - $invoice->base_shipping_amount) !!}</b>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Footer Content -->
                @if (core()->getConfigData('sales.invoice_settings.pdf_print_outs.footer_text'))
                    <div>
                        {{ core()->getConfigData('sales.invoice_settings.pdf_print_outs.footer_text') }}
                    </div>
                @endif
            </div>
        </div>
    </body>
</html>
