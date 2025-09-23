@extends('layouts.app')

@section('title', 'My Orders - My Pharmacy')

@section('content')
    <h1 class="mb-6 text-2xl font-bold text-gray-800">My Orders</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if($orders->isEmpty())
        <p class="text-gray-600">You don’t have any orders yet.</p>
    @else
        <div class="overflow-x-auto bg-white rounded-xl shadow">
            <table class="w-full border-collapse text-sm">
                <thead>
                    <tr class="bg-gray-100 text-left text-gray-700">
                        <th class="p-3 border">Order ID</th>
                        <th class="p-3 border">Total</th>
                        <th class="p-3 border">Order Status</th>
                        <th class="p-3 border">Payment Status</th>
                        <th class="p-3 border">Payment Method</th>
                        <th class="p-3 border text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($orders as $order)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="p-3 font-medium text-gray-800">#{{ $order->id }}</td>
                            <td class="p-3 font-semibold text-teal-600">
                                Rp {{ number_format($order->total, 0, ',', '.') }}
                            </td>
                            <td class="p-3">
                                <span class="px-2 py-1 rounded text-xs font-medium 
                                    @if($order->status_order === 'pending') bg-yellow-100 text-yellow-700
                                    @elseif($order->status_order === 'processed') bg-blue-100 text-blue-700
                                    @elseif($order->status_order === 'shipped') bg-teal-100 text-teal-700
                                    @elseif($order->status_order === 'cancelled') bg-red-100 text-red-700
                                    @else bg-green-100 text-green-700 @endif">
                                    {{ ucfirst($order->status_order) }}
                                </span>
                            </td>
                            <td class="p-3">{{ ucfirst(str_replace('_',' ', $order->status)) }}</td>
                            <td class="p-3">{{ $order->payment ? ucfirst($order->payment->method) : '-' }}</td>
                            <td class="p-3 text-center space-x-2">
                                {{-- Cancel selalu ada jika pending (semua metode pembayaran) --}}
                                @if($order->status_order === 'pending')
                                    <form action="{{ route('orders.cancel', $order->id) }}" method="POST" 
                                        onsubmit="return confirm('Cancel this order?')" class="inline">
                                        @csrf
                                        <button type="submit" 
                                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md text-xs font-semibold transition">
                                            Cancel
                                        </button>
                                    </form>
                                @endif

                                {{-- Confirm Payment --}}
                                @if($order->status_order === 'pending' && $order->payment && $order->payment->method !== 'cod')
                                    {{-- Non-COD: confirm saat pending --}}
                                    <form action="{{ route('orders.confirm', $order->id) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" 
                                            class="bg-teal-600 hover:bg-teal-500 text-white px-3 py-1 rounded-md text-xs font-semibold transition">
                                            Confirm Payment
                                        </button>
                                    </form>
                                @endif

                                <!-- @if($order->payment && $order->payment->method === 'cod' && $order->status_order === 'shipped')
                                    {{-- COD: confirm setelah shipped --}}
                                    <form action="{{ route('orders.confirm', $order->id) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" 
                                            class="bg-green-600 hover:bg-green-500 text-white px-3 py-1 rounded-md text-xs font-semibold transition">
                                            Confirm COD Payment
                                        </button>
                                    </form>
                                @endif -->

                                {{-- View selalu ada --}}
                                <a href="{{ route('orders.show', $order->id) }}" 
                                class="bg-indigo-600 hover:bg-indigo-500 text-white px-3 py-1 rounded-md text-xs font-semibold transition">
                                    View
                                </a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
