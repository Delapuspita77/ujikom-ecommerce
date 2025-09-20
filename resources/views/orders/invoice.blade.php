@extends('layouts.app')

@section('title', 'Invoice - Ecommerce Healthcare')

@section('content')
    <h1 style="text-align:center; margin-bottom:1.5rem;">Invoice</h1>

    <p><strong>Order ID:</strong> #{{ $order->id }}</p>
    <p><strong>Customer:</strong> {{ $order->user->name }}</p>
    <p><strong>Address:</strong> {{ $order->address }}</p>
    <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
    <p><strong>Date:</strong> {{ $order->created_at->format('d M Y, H:i') }}</p>

    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <thead>
            <tr>
                <th style="border:1px solid #333; padding:8px;">Product</th>
                <th style="border:1px solid #333; padding:8px;">Qty</th>
                <th style="border:1px solid #333; padding:8px;">Price</th>
                <th style="border:1px solid #333; padding:8px;">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->products as $product)
                <tr>
                    <td style="border:1px solid #333; padding:8px;">{{ $product->name }}</td>
                    <td style="border:1px solid #333; padding:8px;">{{ $product->pivot->quantity }}</td>
                    <td style="border:1px solid #333; padding:8px;">
                        Rp {{ number_format($product->pivot->price, 0, ',', '.') }}
                    </td>
                    <td style="border:1px solid #333; padding:8px;">
                        Rp {{ number_format($product->pivot->price * $product->pivot->quantity, 0, ',', '.') }}
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3" style="text-align:right; border:1px solid #333; padding:8px;">Total</th>
                <th style="border:1px solid #333; padding:8px;">
                    Rp {{ number_format($order->total, 0, ',', '.') }}
                </th>
            </tr>
        </tfoot>
    </table>
@endsection
