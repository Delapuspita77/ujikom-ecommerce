@extends('layouts.app')

@section('title', 'Payment - Virtual Account')

@section('content')
    <h1>Virtual Account Payment</h1>

    <p><strong>Order ID:</strong> {{ $order->id }}</p>
    <p><strong>Total:</strong> Rp {{ number_format($order->total, 0, ',', '.') }}</p>
    <p><strong>Payment Method:</strong> {{ ucfirst($order->payment_method) }}</p>

    <div style="margin-top: 1rem; padding: 1rem; border: 1px solid #ccc; border-radius: 6px;">
        <p><strong>Virtual Account Number:</strong></p>
        <p style="font-size: 1.5rem; font-weight: bold; color: #2c3e50;">
            1234 5678 9012 3456
        </p>
        <p>Please complete your transfer to this account.</p>
    </div>

    <a href="{{ route('orders.index') }}" 
       style="display:inline-block; margin-top:1rem; padding:0.5rem 1rem; background:#007bff; color:white; border-radius:6px; text-decoration:none;">
       Back to Orders
    </a>
@endsection
