@extends('layouts.app')

@section('title', 'My Orders - Ecommerce Healthcare')

@section('content')
    <h1 class="mb-6 text-2xl font-bold text-gray-800">My Orders</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if($orders->isEmpty())
        <p>You don’t have any orders yet.</p>
    @else
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="p-2 border">Order ID</th>
                    <th class="p-2 border">Total</th>
                    <th class="p-2 border">Order Status</th>
                    <th class="p-2 border">Payment Status</th>
                    <th class="p-2 border">Payment Method</th>
                    <th class="p-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td class="p-2 border">#{{ $order->id }}</td>
                    <td class="p-2 border">Rp {{ number_format($order->total, 0, ',', '.') }}</td>
                    <td class="p-2 border">{{ ucfirst($order->status_order) }}</td>
                    <td class="p-2 border">{{ ucfirst(str_replace('_',' ', $order->status)) }}</td>
                    <td class="p-2 border">{{ $order->payment ? ucfirst(str_replace('_',' ', $order->payment->method)) : '-' }}</td>
                    <td class="p-2 border">
                        {{-- Tombol Cancel & Confirm hanya kalau order masih pending --}}
                        @if($order->status_order === 'pending')
                            <form action="{{ route('orders.cancel', $order->id) }}" method="POST" 
                                  onsubmit="return confirm('Cancel this order?')" class="inline">
                                @csrf
                                <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">
                                    Cancel
                                </button>
                            </form>

                            <form action="{{ route('orders.confirm', $order->id) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="bg-green-500 text-white px-2 py-1 rounded">
                                    Confirm
                                </button>
                            </form>
                        @endif

                        {{-- Selalu ada tombol view --}}
                        <a href="{{ route('orders.show', $order->id) }}" 
                           class="bg-blue-500 text-white px-2 py-1 rounded ml-1">
                            View
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
