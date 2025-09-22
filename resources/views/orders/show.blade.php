@extends('layouts.app')

@section('title', 'Order Detail - My Pharmacy')

@section('content')
    <h1 class="mb-6 text-2xl font-bold text-gray-800">Order Detail</h1>

    <div class="bg-white shadow rounded-xl p-6 mb-6">
        <ul class="space-y-2 text-gray-700">
            <li><strong class="font-semibold text-gray-900">Order ID:</strong> #{{ $order->id }}</li>
            <li>
                <strong class="font-semibold text-gray-900">Order Status:</strong> 
                <span class="px-2 py-1 rounded text-xs font-medium
                    {{ $order->status_order === 'pending' ? 'bg-yellow-100 text-yellow-700' : 
                       ($order->status_order === 'shipped' ? 'bg-blue-100 text-blue-700' : 'bg-green-100 text-green-700') }}">
                    {{ ucfirst($order->status_order) }}
                </span>
            </li>
            <li><strong class="font-semibold text-gray-900">Payment Status:</strong> {{ ucfirst(str_replace('_',' ', $order->status)) }}</li>
            <li><strong class="font-semibold text-gray-900">Payment Method:</strong> {{ $order->payment ? ucfirst(str_replace('_',' ', $order->payment->method)) : '-' }}</li>
            <li><strong class="font-semibold text-gray-900">Total:</strong> Rp {{ number_format($order->total, 0, ',', '.') }}</li>
            <li><strong class="font-semibold text-gray-900">Address:</strong> {{ $order->address }}</li>
            <li><strong class="font-semibold text-gray-900">Created At:</strong> {{ $order->created_at->format('d M Y, H:i') }}</li>
        </ul>
    </div>

    {{-- Detail Produk --}}
    @if($order->items && $order->items->count() > 0)
        <div class="bg-white shadow rounded-xl p-6 mb-6">
            <h2 class="text-lg font-bold text-gray-800 mb-4">Ordered Products</h2>
            <div class="overflow-x-auto">
                <table class="w-full border-collapse text-sm">
                    <thead>
                        <tr class="bg-gray-100 text-left text-gray-700">
                            <th class="p-3 border">Product</th>
                            <th class="p-3 border text-center">Qty</th>
                            <th class="p-3 border text-right">Price</th>
                            <th class="p-3 border text-right">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->items as $item)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="p-3">{{ $item->product->name }}</td>
                                <td class="p-3 text-center">{{ $item->quantity }}</td>
                                <td class="p-3 text-right">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                <td class="p-3 text-right">Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

    {{-- Tombol Aksi --}}
    <div class="flex flex-wrap gap-3">
        <a href="{{ route('orders.index') }}" 
           class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md text-sm font-semibold transition">
            Back to My Orders
        </a>

        @if($order->status_order === 'pending')
            <form action="{{ route('orders.confirm', $order->id) }}" method="POST" class="inline">
                @csrf
                <button type="submit" 
                        class="bg-teal-600 hover:bg-teal-500 text-white px-4 py-2 rounded-md text-sm font-semibold transition">
                    Confirm Order
                </button>
            </form>
        @endif

        <a href="{{ route('orders.invoice', $order->id) }}" target="_blank"
           class="bg-indigo-600 hover:bg-indigo-500 text-white px-4 py-2 rounded-md text-sm font-semibold transition">
            Cetak Invoice (PDF)
        </a>
    </div>
@endsection
