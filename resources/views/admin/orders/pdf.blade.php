<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Invoice {{ $order->invoice_number }}</title>
    <style>
        @page {
            margin: 26px 26px 34px 26px;
        }

        body {
            font-family: DejaVu Sans, Helvetica, Arial, sans-serif;
            color: #1f2937;
            font-size: 13px;
            line-height: 1.45;
            margin: 0;
            padding: 0;
        }

        .header {
            width: 100%;
            border-bottom: 2px solid #eceff3;
            padding-bottom: 14px;
            margin-bottom: 18px;
        }

        .header td {
            vertical-align: top;
        }

        .brand-wrap {
            display: table;
            width: 100%;
        }

        .brand-logo,
        .brand-text {
            display: table-cell;
            vertical-align: middle;
        }

        .brand-logo {
            width: 44px;
        }

        .brand-logo img {
            width: 34px;
            height: auto;
        }

        .brand-text img {
            height: 24px;
            width: auto;
            display: block;
            margin-bottom: 6px;
        }

        .company-name-fallback {
            font-size: 24px;
            font-weight: 700;
            color: #0f2d5c;
            margin: 0 0 4px 0;
        }

        .company-details {
            color: #6b7280;
            font-size: 12px;
            margin-top: 2px;
        }

        .invoice-title {
            color: #d1d5db;
            font-size: 34px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            margin: 0 0 6px 0;
            text-align: right;
        }

        .invoice-meta {
            text-align: right;
            font-size: 12px;
            color: #4b5563;
        }

        .invoice-meta strong {
            color: #374151;
            display: inline-block;
            width: 96px;
        }

        .bill-to {
            margin-bottom: 16px;
        }

        .bill-to-title {
            color: #9ca3af;
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin: 0 0 6px 0;
            font-weight: 700;
        }

        .customer-name {
            font-size: 16px;
            font-weight: 700;
            margin: 0 0 4px 0;
            color: #111827;
        }

        .customer-details {
            color: #4b5563;
            font-size: 12px;
            margin: 0;
        }

        table.items {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 16px;
        }

        table.items thead {
            display: table-header-group;
        }

        table.items tfoot {
            display: table-row-group;
        }

        table.items tr {
            page-break-inside: avoid;
        }

        table.items th {
            background-color: #f8fafc;
            padding: 9px 10px;
            font-size: 12px;
            text-align: left;
            border-top: 1px solid #e5e7eb;
            border-bottom: 1px solid #e5e7eb;
            color: #111827;
            font-weight: 700;
        }

        table.items th.center {
            text-align: center;
            width: 12%;
        }

        table.items th.right {
            text-align: right;
            width: 18%;
        }

        table.items td {
            padding: 9px 10px;
            font-size: 12px;
            border-bottom: 1px solid #f1f5f9;
            color: #374151;
            vertical-align: top;
        }

        table.items td.center {
            text-align: center;
        }

        table.items td.right {
            text-align: right;
        }

        .product-name {
            font-weight: 700;
            color: #111827;
            display: block;
            margin-bottom: 2px;
        }

        .product-size {
            font-size: 11px;
            color: #6b7280;
        }

        .totals-wrap {
            width: 100%;
            page-break-inside: avoid;
            margin-top: 6px;
        }

        .totals {
            width: 300px;
            margin-left: auto;
            border-collapse: collapse;
        }

        .totals td {
            padding: 7px 10px;
            font-size: 13px;
            color: #374151;
        }

        .totals td.right {
            text-align: right;
        }

        .totals tr.discount td {
            color: #15803d;
        }

        .totals tr.final td {
            border-top: 1px solid #e5e7eb;
            border-bottom: 1px solid #e5e7eb;
            background-color: #f8fafc;
            font-weight: 700;
            padding: 11px 10px;
        }

        .totals tr.final td.label {
            color: #111827;
            font-size: 15px;
        }

        .totals tr.final td.amount {
            color: #d97706;
            font-size: 19px;
        }

        .footer {
            margin-top: 24px;
            padding-top: 10px;
            border-top: 1px solid #eceff3;
            text-align: center;
            color: #9ca3af;
            font-size: 11px;
        }

        .footer strong {
            color: #4b5563;
        }
    </style>
</head>

<body>
    @php
    $logoPath = public_path('images/logo.png');
    $wordmarkPath = public_path('images/amrutam-wordmark.png');
    @endphp

    <table class="header">
        <tr>
            <td style="width: 54%;">
                <div class="brand-wrap">
                    <div class="brand-logo">
                        @if(file_exists($logoPath))
                        <img src="{{ $logoPath }}" alt="Amrutam logo">
                        @endif
                    </div>
                    <div class="brand-text">
                        @if(file_exists($wordmarkPath))
                        <img src="{{ $wordmarkPath }}" alt="Amrutam">
                        @else
                        <p class="company-name-fallback">Amrutam</p>
                        @endif
                        <div class="company-details">
                            G-16, Shyam Elegance, Nana Chiloda, Ahmedabad, Gujarat - 382330<br>
                            Phone: +91 9979790609 | Email: pure@amrutamoil.com
                        </div>
                    </div>
                </div>
            </td>
            <td style="width: 46%; text-align: right;">
                <h2 class="invoice-title">Invoice</h2>
                <div class="invoice-meta">
                    <p style="margin: 0 0 4px 0;"><strong>Invoice #</strong> {{ $order->invoice_number }}</p>
                    <p style="margin: 0 0 4px 0;"><strong>Date</strong> {{ $order->order_date->format('F d, Y') }}</p>
                    <p style="margin: 0;"><strong>Status</strong> {{ $order->payment_status }}</p>
                </div>
            </td>
        </tr>
    </table>

    <div class="bill-to">
        <h3 class="bill-to-title">Bill To</h3>
        <h4 class="customer-name">{{ $order->customer->customer_name }}</h4>
        <div class="customer-details">
            @if($order->customer->address)
            {{ $order->customer->address }}<br>
            @endif
            @if($order->customer->city || $order->customer->state || $order->customer->pincode)
            {{ collect([$order->customer->city, $order->customer->state, $order->customer->pincode])->filter()->join(', ') }}<br>
            @endif
            @if($order->customer->phone)
            Phone: {{ $order->customer->phone }}<br>
            @endif
            @if($order->customer->email)
            Email: {{ $order->customer->email }}
            @endif
        </div>
    </div>

    <table class="items">
        <thead>
            <tr>
                <th>Description</th>
                <th class="center">Qty</th>
                <th class="right">Price (Rs)</th>
                <th class="right">Total (Rs)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->items as $item)
            <tr>
                <td>
                    <span class="product-name">{{ $item->product->name }}</span>
                    <span class="product-size">{{ $item->product->size }}</span>
                </td>
                <td class="center">{{ $item->quantity }}</td>
                <td class="right">{{ number_format($item->price, 2) }}</td>
                <td class="right" style="font-weight: 700; color: #111827;">{{ number_format($item->total, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="totals-wrap">
        <table class="totals">
            <tr>
                <td><strong>Subtotal</strong></td>
                <td class="right">Rs {{ number_format($order->total_amount, 2) }}</td>
            </tr>
            @if($order->discount > 0)
            <tr class="discount">
                <td><strong>Discount</strong></td>
                <td class="right">- Rs {{ number_format($order->discount, 2) }}</td>
            </tr>
            @endif
            <tr class="final">
                <td class="label">Final Total</td>
                <td class="right amount">Rs {{ number_format($order->final_amount, 2) }}</td>
            </tr>
        </table>
    </div>

    <div class="footer">
        <p><strong>Thank you for your business.</strong></p>
        <p>If this invoice spans multiple pages, details continue on the next page.</p>
    </div>

    <script type="text/php">
        if (isset($pdf)) {
            $pdf->page_script(function ($pageNumber, $pageCount, $canvas, $fontMetrics) {
                $font = $fontMetrics->getFont('Helvetica', 'normal');
                $italic = $fontMetrics->getFont('Helvetica', 'italic');

                $canvas->text(500, 18, 'Page ' . $pageNumber . ' of ' . $pageCount, $font, 9, [0.42, 0.46, 0.53]);

                if ($pageCount > 1 && $pageNumber > 1) {
                    $canvas->text(28, 18, 'Continued from previous page', $italic, 9, [0.45, 0.47, 0.52]);
                }
            });
        }
    </script>
</body>

</html>
