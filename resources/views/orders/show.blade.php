@extends('layouts.app')

@section('title', 'Order Detail - Ecommerce Healthcare')

@section('content')
    <h1 style="margin-bottom: 1.5rem; font-weight: 700; font-size: 2rem; color: #2c3e50;">
        Order Detail
    </h1>

    <ul style="list-style:none; padding-left:0;">
        <li><strong>Order ID:</strong> #{{ $order->id }}</li>
        <li><strong>Status:</strong> {{ ucfirst($order->status) }}</li>
        <li><strong>Payment:</strong> {{ ucfirst(str_replace('_',' ', $order->payment_method)) }}</li>
        <li><strong>Total:</strong> Rp {{ number_format($order->total, 0, ',', '.') }}</li>
        <li><strong>Address:</strong> {{ $order->address }}</li>
        <li><strong>Created At:</strong> {{ $order->created_at->format('d M Y, H:i') }}</li>
    </ul>
    
    <div style="margin-top:2rem;">
        <a href="{{ route('orders.index') }}" 
           style="background:#6c757d; color:white; padding:0.75rem 1.5rem; border-radius:6px; text-decoration:none;">
            Back to My Orders
        </a>
        @if($order->status === 'pending')
            <form action="{{ route('orders.confirm', $order->id) }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" 
                        style="margin-left:1rem; background:#28a745; color:white; padding:0.75rem 1.5rem; border:none; border-radius:6px; cursor:pointer;">
                    Confirm Order
                </button>
            </form>
        @endif

        <a href="{{ route('orders.invoice', $order->id) }}" target="_blank"
        style="margin-left:1rem; background:#17a2b8; color:white; padding:0.75rem 1.5rem; border-radius:6px; text-decoration:none;">
            Cetak Invoice (PDF)
        </a>
    </div>
@endsection
