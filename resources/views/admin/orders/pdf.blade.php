<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Invoice {{ $order->invoice_number }}</title>
    <style>
        body {
            font-family: 'Helvetica Neue', 'Helvetica', Arial, sans-serif;
            color: #333;
            line-height: 1.5;
            margin: 0;
            padding: 20px;
        }

        .header {
            width: 100%;
            border-bottom: 2px solid #f3f4f6;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }

        .header td {
            vertical-align: top;
        }

        .company-name {
            color: #d97706;
            /* Amber-600 */
            font-size: 28px;
            font-weight: bold;
            margin: 0 0 5px 0;
        }

        .company-details {
            color: #6b7280;
            font-size: 14px;
        }

        .invoice-title {
            color: #e5e7eb;
            font-size: 42px;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin: 0 0 10px 0;
            text-align: right;
        }

        .invoice-meta {
            text-align: right;
            font-size: 14px;
        }

        .invoice-meta strong {
            color: #4b5563;
            display: inline-block;
            width: 120px;
        }

        .bill-to {
            margin-bottom: 40px;
        }

        .bill-to-title {
            color: #9ca3af;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin: 0 0 10px 0;
            font-weight: bold;
        }

        .customer-name {
            font-size: 18px;
            font-weight: bold;
            margin: 0 0 5px 0;
            color: #111827;
        }

        .customer-details {
            color: #4b5563;
            font-size: 14px;
            margin: 0;
        }

        table.items {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 40px;
        }

        table.items th {
            background-color: #f9fafb;
            padding: 12px;
            font-size: 14px;
            text-align: left;
            border-top: 1px solid #e5e7eb;
            border-bottom: 1px solid #e5e7eb;
            color: #111827;
        }

        table.items th.center {
            text-align: center;
        }

        table.items th.right {
            text-align: right;
        }

        table.items td {
            padding: 12px;
            font-size: 14px;
            border-bottom: 1px solid #f3f4f6;
            color: #374151;
        }

        table.items td.center {
            text-align: center;
        }

        table.items td.right {
            text-align: right;
        }

        .product-name {
            font-weight: bold;
            color: #111827;
            display: block;
        }

        .product-size {
            font-size: 12px;
            color: #6b7280;
        }

        .totals-container {
            width: 100%;
        }

        .totals {
            width: 350px;
            float: right;
        }

        .totals table {
            width: 100%;
            border-collapse: collapse;
        }

        .totals td {
            padding: 8px 12px;
            font-size: 15px;
            color: #4b5563;
        }

        .totals td.right {
            text-align: right;
        }

        .totals tr.discount td {
            color: #16a34a;
        }

        .totals tr.final td {
            border-top: 1px solid #e5e7eb;
            border-bottom: 1px solid #e5e7eb;
            background-color: #f9fafb;
            font-weight: bold;
            padding: 15px 12px;
        }

        .totals tr.final td.label {
            color: #111827;
            font-size: 18px;
        }

        .totals tr.final td.amount {
            color: #d97706;
            font-size: 24px;
        }

        .footer {
            clear: both;
            margin-top: 80px;
            padding-top: 20px;
            border-top: 1px solid #f3f4f6;
            text-align: center;
            color: #9ca3af;
            font-size: 13px;
        }

        .footer strong {
            color: #4b5563;
        }
    </style>
</head>

<body>

    <table class="header">
        <tr>
            <td style="width: 50%;">
                <h1 class="company-name">Amrutam Ground Nut Oil</h1>
                <div class="company-details">
                    123 Oil Mill Road, Industrial Area<br>
                    Rajkot, Gujarat - 360002<br>
                    Phone: +91 9876543210<br>
                    Email: contact@amrutamoil.com
                </div>
            </td>
            <td style="width: 50%; text-align: right;">
                <h2 class="invoice-title">Invoice</h2>
                <div class="invoice-meta">
                    <p style="margin: 0 0 5px 0;"><strong>Invoice Number:</strong> <span
                            style="color:#111; font-weight:bold;">{{ $order->invoice_number }}</span></p>
                    <p style="margin: 0 0 5px 0;"><strong>Invoice Date:</strong> <span style="color:#111;">{{
                            $order->order_date->format('F d, Y') }}</span></p>
                    <p style="margin: 0;"><strong>Status:</strong> <span style="color:#111; font-weight:bold;">{{
                            $order->payment_status }}</span></p>
                </div>
            </td>
        </tr>
    </table>

    <div class="bill-to">
        <h3 class="bill-to-title">Bill To:</h3>
        <h4 class="customer-name">{{ $order->customer->customer_name }}</h4>
        <div class="customer-details">
            @if($order->customer->address)
            {{ $order->customer->address }}<br>
            @endif
            @if($order->customer->city || $order->customer->state || $order->customer->pincode)
            {{ collect([$order->customer->city, $order->customer->state, $order->customer->pincode])->filter()->join(',
            ') }}<br>
            @endif
            @if($order->customer->phone)
            Phone: {{ $order->customer->phone }}<br>
            @endif
            @if($order->customer->email)
            Email: {{ $order->customer->email }}<br>
            @endif
        </div>
    </div>

    <table class="items">
        <thead>
            <tr>
                <th>Description</th>
                <th class="center">Quantity</th>
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
                <td class="right" style="color:#111827; font-weight:bold;">{{ number_format($item->total, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="totals-container">
        <div class="totals">
            <table>
                <tr>
                    <td><strong>Subtotal:</strong></td>
                    <td class="right">Rs {{ number_format($order->total_amount, 2) }}</td>
                </tr>
                @if($order->discount > 0)
                <tr class="discount">
                    <td><strong>Discount:</strong></td>
                    <td class="right">- Rs {{ number_format($order->discount, 2) }}</td>
                </tr>
                @endif
                <tr class="final">
                    <td class="label">Final Total:</td>
                    <td class="right amount">Rs {{ number_format($order->final_amount, 2) }}</td>
                </tr>
            </table>
        </div>
    </div>

    <div class="footer">
        <p><strong>Thank you for your business!</strong></p>
        <p>If you have any questions about this invoice, please contact us.</p>
    </div>

</body>

</html>