@extends('layouts.app')

@section('title', $product->name . ' - My Pharmacy')

@section('content')
<div class="max-w-5xl mx-auto bg-white rounded-xl shadow p-8 flex flex-col md:flex-row gap-8">
    <!-- Gambar Produk -->
    <div class="flex-1 max-w-sm mx-auto md:mx-0">
        <img src="{{ asset('storage/' . $product->image) }}" 
             alt="{{ $product->name }}" 
             class="w-full h-72 object-cover rounded-lg shadow-sm">
    </div>

    <!-- Detail Produk -->
    <div class="flex-1">
        <h1 class="text-2xl font-bold text-gray-900 mb-4">{{ $product->name }}</h1>
        <p class="text-gray-600 mb-4">{{ $product->description }}</p>
        <div class="text-2xl font-bold text-green-600 mb-6">
            Rp {{ number_format($product->price, 0, ',', '.') }}
        </div>

        <!-- Tombol Add to Cart -->
        <form action="{{ route('cart.add', $product->id) }}" method="POST" class="max-w-xs">
            @csrf
            <button type="submit" 
                    class="w-full rounded-md bg-teal-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm 
                           hover:bg-teal-500 hover:shadow-md transition">
                Add to Cart
            </button>
        </form>
    </div>
</div>

<!-- Feedback Section -->
<div class="max-w-5xl mx-auto mt-10 bg-white rounded-xl shadow p-8">
    <h2 class="text-xl font-bold text-gray-900 mb-6">Customer Feedback</h2>

    <!-- List Feedback -->
    <div class="space-y-4 mb-8">
        @forelse($product->feedbacks as $feedback)
            <div class="p-4 border rounded-lg bg-gray-50">
                <div class="flex justify-between items-center mb-2">
                    <span class="font-semibold text-gray-800">{{ $feedback->user->name }}</span>
                    <span class="text-yellow-500">⭐ {{ $feedback->rating }}</span>
                </div>
                <p class="text-gray-700">{{ $feedback->comment }}</p>
                <p class="text-xs text-gray-500 mt-1">Posted on {{ $feedback->created_at->format('d M Y') }}</p>
            </div>
        @empty
            <p class="text-gray-500">There is no feedback for this product yet.</p>
        @endforelse
    </div>

    <!-- Info untuk isi feedback -->
    @auth
        <p class="text-sm text-gray-600">
            Feedback can only be provided after your order has shipped. Please check your order details to provide feedback.
        </p>
    @else
        <p class="text-sm text-gray-600">
            <a href="{{ route('login') }}" class="text-blue-600 underline">Login</a> untuk memberikan feedback.
        </p>
    @endauth
</div>
@endsection
