@extends('layouts.app')

@section('title', 'Payment - Virtual Account')

@section('content')
    <div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow-md">
        <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">Virtual Account Payment</h1>

        <!-- Order Info -->
        <div class="space-y-2 mb-6">
            <p><strong>Order ID:</strong> #{{ $order->id }}</p>
            <p><strong>Total:</strong> 
                <span class="font-semibold text-teal-600">
                    Rp {{ number_format($order->total, 0, ',', '.') }}
                </span>
            </p>
            <p><strong>Payment Method:</strong> {{ ucfirst($order->payment_method) }}</p>
        </div>

        <!-- Virtual Account Box -->
        <div class="p-4 border border-gray-200 rounded-lg bg-gray-50 text-center mb-6">
            <p class="text-gray-700 font-medium mb-2">Virtual Account Number:</p>
            <p class="text-2xl font-bold tracking-widest text-gray-900">
                1234 5678 9012 3456
            </p>
            <p class="text-sm text-gray-600 mt-2">Please complete your transfer to this account.</p>
        </div>

        <!-- Back Button -->
        <div class="text-center">
            <a href="{{ route('orders.index') }}" 
               class="inline-block rounded-md bg-teal-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm 
                      hover:bg-teal-500 hover:shadow-md transition duration-300 ease-in-out">
                ← Back to Orders
            </a>
        </div>
    </div>
@endsection
