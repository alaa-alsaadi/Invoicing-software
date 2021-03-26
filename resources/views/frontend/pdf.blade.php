<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ __('Frontend/frontend.invoice', ['invoice_number', $invoice_number]) }}</title>
    <link rel="stylesheet" href="{{ asset('frontend/css/pdf.css') }}">
</head>
<body>
<div class="invoice-box {{ config('app.locale') == 'ar' ? 'rtl' : '' }}">
    <table cellpadding="0" cellspacing="0">
        <tr class="top">
            <td colspan="6">
                <table>
                    <tr>
                        <td width="65%" class="title">
                            {{-- <img src="{{ asset('frontend/images/logo.png') }}" style="width:100px; max-width:100px;"> --}}
                        </td>
                        <td width="35%">
                            {{ __('Frontend/frontend.serial') }}: {{ $invoice_number }}<br>
                            {{ __('Frontend/frontend.date') }}: {{ $invoice_date }}<br>
                            {{ __('Frontend/frontend.print_date') }}: {{ Carbon\Carbon::now()->format('Y-m-d') }}<br>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><h2>{{ __('Frontend/frontend.invoice_title') }}</h2></td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="information">
            <td colspan="6">
                <table>
                    <tr>
                        <td width="50%">
                            <h2>{{ __('Frontend/frontend.seller') }}</h2>
                            {{ __('Frontend/frontend.seller_name') }}<br>
                            <span dir="ltr">{{ __('Frontend/frontend.seller_phone') }}</span><br>
                            {{ __('Frontend/frontend.seller_vat') }}<br>
                            {{ __('Frontend/frontend.seller_address') }}
                        </td>
                        <td width="50%">
                            <h2>{{ __('Frontend/frontend.buyer') }}</h2>
                            @foreach($customer as $key => $val)
                                {{ $key }}: {{ $val }}<br>
                            @endforeach
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="heading">
            <td></td>
            <td>{{ __('Frontend/frontend.product_name') }}</td>
            <td>{{ __('Frontend/frontend.unit') }}</td>
            <td>{{ __('Frontend/frontend.quantity') }}</td>
            <td>{{ __('Frontend/frontend.unit_price') }}</td>
            <td>{{ __('Frontend/frontend.sub_total') }}</td>
        </tr>

        @foreach($items as $item)
            <tr class="item {{ $loop->last ? 'last' : '' }}">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item['product_name'] }}</td>
                <td>{{ $item['unit'] }}</td>
                <td>{{ $item['quantity'] }}</td>
                <td>{{ __('Frontend/frontend.sar_with_amount', ['amount' => $item['unit_price']]) }}</td>
                <td>{{ __('Frontend/frontend.sar_with_amount', ['amount' => $item['row_sub_total']]) }}</td>
            </tr>
        @endforeach

        <tr class="total">
            <td colspan="4"></td>
            <td>{{ __('Frontend/frontend.sub_total') }}</td>
            <td>{{ __('Frontend/frontend.sar_with_amount', ['amount' => $sub_total]) }}</td>
        </tr>
        <tr class="total">
            <td colspan="4"></td>
            <td>{{ __('Frontend/frontend.discount') }}</td>
            <td>{{ __('Frontend/frontend.sar_with_amount', ['amount' => $discount]) }}</td>
        </tr>
        <tr class="total">
            <td colspan="4"></td>
            <td>{{ __('Frontend/frontend.vat') }}</td>
            <td>{{ __('Frontend/frontend.sar_with_amount', ['amount' => $vat_value]) }}</td>
        </tr>
        <tr class="total">
            <td colspan="4"></td>
            <td>{{ __('Frontend/frontend.shipping') }}</td>
            <td>{{ __('Frontend/frontend.sar_with_amount', ['amount' => $shipping]) }}</td>
        </tr>
        <tr class="total">
            <td colspan="4"></td>
            <td>{{ __('Frontend/frontend.total_due') }}</td>
            <td>{{ __('Frontend/frontend.sar_with_amount', ['amount' => $total_due]) }}</td>
        </tr>
    </table>
</div>
</body>
</html>