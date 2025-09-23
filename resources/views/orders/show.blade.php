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
<div class="flex flex-wrap gap-3 mb-6">
    <a href="{{ route('orders.index') }}" 
       class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md text-sm font-semibold transition">
        Back to My Orders
    </a>

    {{-- Konfirmasi pembayaran non-COD (seperti semula) --}}
    @if($order->status_order === 'pending' && $order->payment && $order->payment->method !== 'cod')
        <form action="{{ route('orders.confirm', $order->id) }}" method="POST" class="inline">
            @csrf
            <button type="submit" 
                    class="bg-teal-600 hover:bg-teal-500 text-white px-4 py-2 rounded-md text-sm font-semibold transition">
                Confirm Payment
            </button>
        </form>
    @endif

    <!-- {{-- Konfirmasi pembayaran COD setelah shipped --}}
    @if($order->payment && $order->payment->method === 'cod' && $order->status_order === 'shipped')
        <form action="{{ route('orders.confirm', $order->id) }}" method="POST" class="inline">
            @csrf
            <button type="submit" 
                    class="bg-green-600 hover:bg-green-500 text-white px-4 py-2 rounded-md text-sm font-semibold transition">
                Confirm COD Payment
            </button>
        </form>
    @endif -->

    <a href="{{ route('orders.invoice', $order->id) }}" target="_blank"
       class="bg-indigo-600 hover:bg-indigo-500 text-white px-4 py-2 rounded-md text-sm font-semibold transition">
        Print Invoice (PDF)
    </a>

    <form action="{{ route('orders.sendInvoice', $order->id) }}" method="POST" class="inline">
        @csrf
        <button type="submit" class="bg-teal-600 text-white px-3 py-1 rounded hover:bg-teal-700">
            Send to Email
        </button>
    </form>
</div>


{{-- Feedback Section --}}
@if($order->status_order === 'shipped')
    <div class="bg-white shadow rounded-xl p-6">
        <h2 class="text-lg font-bold text-gray-800 mb-4">Feedback for Products</h2>

        @foreach($order->items as $item)
            <div class="border-b py-4 last:border-0">
                <h3 class="font-semibold text-gray-900 mb-2">{{ $item->product->name }}</h3>

                @php
                    $userFeedback = $item->product->feedbacks()
                        ->where('user_id', auth()->id())
                        ->first();
                @endphp

                @if($userFeedback)
                    <div class="p-3 bg-gray-50 rounded">
                        <div class="flex justify-between items-center">
                            <span class="text-yellow-500">⭐ {{ $userFeedback->rating }}</span>
                            <span class="text-xs text-gray-500">{{ $userFeedback->created_at->format('d M Y') }}</span>
                        </div>
                        <p class="mt-2 text-gray-700">{{ $userFeedback->comment ?? '-' }}</p>
                    </div>
                @else
                    <form action="{{ route('feedback.store', $item->product->id) }}" method="POST" class="space-y-2">
                        @csrf
                        <div>
                            <label for="rating-{{ $item->id }}" class="block text-sm font-medium">Rating</label>
                            <select name="rating" id="rating-{{ $item->id }}" class="w-full border rounded p-2">
                                <option value="5">⭐ 5 - Very Satisfied</option>
                                <option value="4">⭐ 4 - Satisfied</option>
                                <option value="3">⭐ 3 - Neutral</option>
                                <option value="2">⭐ 2 - Dissatisfied</option>
                                <option value="1">⭐ 1 - Very Poor</option>
                            </select>
                        </div>

                        <div>
                            <label for="comment-{{ $item->id }}" class="block text-sm font-medium">Comment</label>
                            <textarea name="comment" id="comment-{{ $item->id }}" rows="2"
                                class="w-full border rounded p-2" placeholder="Write Comment..."></textarea>
                        </div>

                        <button type="submit" 
                            class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">
                            Send Feedback
                        </button>
                    </form>
                @endif
            </div>
        @endforeach
    </div>
@endif
@endsection
