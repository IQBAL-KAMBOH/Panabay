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
                <b>
                    @lang('marketplace::app.seller.transactions.view.title')
                </b>
            </div>

            <div class="page-content">
                <!-- Invoice Information -->
                <table class="{{ core()->getCurrentLocale()->direction }}">
                    <tbody>
                        <tr>
                            <td style="width: 50%; padding: 2px 18px;border:none;">
                                <b>
                                    @lang('marketplace::app.seller.transactions.view.id'):
                                </b>

                                <span>
                                    #{{ $transaction->transaction_id }}
                                </span>
                            </td>
                        </tr>

                        <tr>
                            <td style="width: 50%; padding: 2px 18px;border:none;">
                                <b>
                                    @lang('marketplace::app.seller.transactions.view.method'):
                                </b>

                                <span>
                                    {{ $transaction->method }}
                                </span>
                            </td>
                        </tr>

                        <tr>
                            <td style="width: 50%; padding: 2px 18px;border:none;">
                                <b>
                                    @lang('marketplace::app.seller.transactions.view.date'):
                                </b>

                                <span>
                                    {{ core()->formatDate($transaction->created_at, 'd M Y') }}
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="items">
                    <table class="{{ core()->getCurrentLocale()->direction }}">
                        <thead>
                            <tr>
                                <th>
                                    @lang('marketplace::app.seller.transactions.view.name')
                                </th>

                                <th>
                                    @lang('marketplace::app.seller.transactions.view.price')
                                </th>

                                <th>
                                    @lang('marketplace::app.seller.transactions.view.qty')
                                </th>

                                <th>
                                    @lang('marketplace::app.seller.transactions.view.total')
                                </th>

                                <th>
                                    @lang('marketplace::app.seller.transactions.view.commission')
                                </th>

                                <th>
                                    @lang('marketplace::app.seller.transactions.view.seller-total')
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($transaction->order->items as $orderItem)
                                @php
                                    $item = $orderItem->item;
                                @endphp

                                <tr>
                                    <td>
                                        {{ $item->name }}
                                    </td>

                                    <td>
                                        {!! core()->formatBasePrice($item->base_price) !!}
                                    </td>

                                    <td>
                                        {{ $item->qty_shipped }}
                                    </td>

                                    <td>
                                        {!! core()->formatBasePrice($item->base_total) !!}
                                    </td>

                                    <td>
                                        {!! core()->formatBasePrice($item->base_commission) !!}
                                    </td>

                                    <td>
                                        {!! core()->formatBasePrice($item->base_seller_total) !!}
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
                            <tr>
                                <td>
                                    @lang('marketplace::app.seller.transactions.view.subtotal')
                                </td>

                                <td>-</td>

                                <td>
                                    {!! core()->formatBasePrice($transaction->order->base_sub_total) !!}
                                </td>
                            </tr>

                            @if ($transaction->order->order->haveStockableItems())
                                <tr>
                                    <td>
                                        @lang('marketplace::app.seller.transactions.view.shipping-handling')
                                    </td>

                                    <td>-</td>

                                    <td>
                                        {!! core()->formatBasePrice(0) !!}
                                    </td>
                                </tr>
                            @endif

                            <tr>
                                <td>
                                    @lang('marketplace::app.seller.transactions.view.tax')
                                </td>

                                <td>-</td>

                                <td>
                                    {!! core()->formatBasePrice($transaction->order->base_tax_amount) !!}
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    @lang('marketplace::app.seller.transactions.view.commission')
                                </td>

                                <td>-</td>

                                <td>
                                    {!! core()->formatBasePrice($transaction->order->base_commission) !!}
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    @lang('marketplace::app.seller.transactions.view.seller-total')
                                </td>

                                <td>-</td>

                                <td>
                                    {!! core()->formatBasePrice($transaction->order->base_seller_total) !!}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
