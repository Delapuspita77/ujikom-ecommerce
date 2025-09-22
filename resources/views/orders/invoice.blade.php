<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice #{{ $order->id }}</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #333;
        }
        .header, .footer {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
            font-size: 20px;
        }
        .info {
            margin-bottom: 20px;
        }
        .info p {
            margin: 2px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table th, table td {
            border: 1px solid #444;
            padding: 8px;
            text-align: left;
        }
        table th {
            background: #f2f2f2;
        }
        .total {
            text-align: right;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <h1>Invoice</h1>
        <p><strong>Ecommerce Healthcare</strong></p>
        <p>Jl. Sehat No. 123, Surabaya</p>
    </div>

    <!-- Order Info -->
    <div class="info">
        <p><strong>Invoice ID:</strong> #{{ $order->id }}</p>
        <p><strong>Customer:</strong> {{ $order->user->name }}</p>
        <p><strong>Address:</strong> {{ $order->address }}</p>
        <p><strong>Order Status:</strong> {{ ucfirst($order->status_order) }}</p>
        <p><strong>Payment Status:</strong> {{ ucfirst(str_replace('_',' ', $order->status)) }}</p>
        <p><strong>Date:</strong> {{ $order->created_at->format('d M Y, H:i') }}</p>
    </div>

    <!-- Product List -->
    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th style="text-align:center;">Qty</th>
                <th style="text-align:right;">Price</th>
                <th style="text-align:right;">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->items as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td style="text-align:center;">{{ $item->quantity }}</td>
                    <td style="text-align:right;">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                    <td style="text-align:right;">Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" class="total">Total</td>
                <td style="text-align:right;">Rp {{ number_format($order->total, 0, ',', '.') }}</td>
            </tr>
        </tfoot>
    </table>

    <!-- Footer -->
    <div class="footer">
        <p>Thank you for shopping with us! 🩺</p>
    </div>
</body>
</html>
