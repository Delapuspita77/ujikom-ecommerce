@extends('layouts.app')

@section('title', 'Bank Transfer Payment - My Pharmacy')

@section('content')
    <h1 style="margin-bottom: 1.5rem; font-weight: 700; font-size: 2rem; color: #2c3e50;">
        Bank Transfer Payment
    </h1>

    <p>Your order has been created. Please transfer to the following virtual account:</p>

    <ul style="list-style: none; padding-left: 0;">
        <li><strong>Order ID:</strong> {{ $order->id }}</li>
        <li><strong>Amount:</strong> Rp {{ number_format($order->total, 0, ',', '.') }}</li>
        <li><strong>Virtual Account:</strong> 1234 5678 9012 3456</li>
    </ul>

    <p style="margin-top:1rem; color:#555;">
        After making the payment, your order will be verified automatically.
    </p>

    <div style="margin-top:2rem;">
        <a href="{{ route('orders.index') }}" 
           style="background:#007bff; color:white; padding:0.75rem 1.5rem; border-radius:6px; text-decoration:none; font-weight:700;">
            Go to My Orders
        </a>
    </div>
@endsection
