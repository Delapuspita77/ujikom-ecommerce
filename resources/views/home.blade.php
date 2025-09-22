@extends('layouts.app')

@section('title', 'Home - My Pharmacy')

@section('content')
    <!-- Hero Section -->
    <div class="relative isolate px-6 pt-20 lg:px-8 bg-white">
        <!-- Gradient Background -->
        <div aria-hidden="true" 
            class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80 pointer-events-none">
            <div class="relative left-[calc(50%-8rem)] aspect-[1155/678] w-[28rem] -translate-x-1/2 rotate-[30deg] 
                        bg-gradient-to-tr from-teal-400 to-amber-300 opacity-40 
                        sm:left-[calc(50%-20rem)] sm:w-[50rem]">
            </div>
        </div>

        <!-- Content -->
        <div class="mx-auto max-w-2xl py-20 sm:py-28 lg:py-32 text-center relative z-10">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                Stay Healthy, Shop Smart 🩺
            </h1>
            <p class="mt-4 text-base leading-7 text-gray-600 sm:text-lg">
                Produk kesehatan, suplemen, dan alat medis pilihan dengan pengiriman cepat dan layanan terpercaya.
            </p>
            <div class="mt-8 flex items-center justify-center gap-x-4">
                <a href="{{ route('products.index') }}" 
                    class="rounded-md bg-teal-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm 
                        hover:bg-teal-500 hover:shadow-md transition duration-300 ease-in-out">
                    Shop Now
                </a>
                <a href="{{ route('orders.index') }}" 
                    class="text-sm font-semibold leading-6 text-gray-800 hover:text-amber-500 transition duration-300">
                    My Orders →
                </a>
            </div>
        </div>

        <!-- Bottom gradient -->
        <div aria-hidden="true" 
            class="absolute inset-x-0 top-[calc(100%-10rem)] -z-10 transform-gpu overflow-hidden blur-2xl 
                    sm:top-[calc(100%-20rem)] pointer-events-none">
            <div class="relative left-[calc(50%+2rem)] aspect-[1155/678] w-[28rem] -translate-x-1/2 
                        bg-gradient-to-tr from-pink-300 to-teal-400 opacity-30 
                        sm:left-[calc(50%+24rem)] sm:w-[50rem]">
            </div>
        </div>
    </div> <!-- ✅ Hero ditutup di sini -->

    <!-- Categories Section -->
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Categories</h2>
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4 mb-12">
        @foreach($categories as $category)
            <a href="{{ route('products.index', ['category' => $category->id]) }}" 
            class="bg-white px-4 py-3 rounded-lg shadow text-center font-medium text-gray-700 
                    hover:text-teal-600 hover:shadow-md transition duration-300 ease-in-out">
                {{ $category->name }}
            </a>
        @endforeach
    </div>

    <!-- Featured Products -->
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Featured Products</h2>
    @if($products->isEmpty())
        <p class="text-gray-600">No products available at the moment.</p>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-12">
            @foreach($products->take(4) as $product)
                <div class="bg-white rounded-xl shadow hover:shadow-lg transition duration-300 overflow-hidden flex flex-col">
                    <a href="{{ route('products.show', $product->id) }}" class="flex flex-col h-full">
                        <img src="{{ asset('storage/' . $product->image) }}" 
                             alt="{{ $product->name }}" 
                             class="w-full h-48 object-cover">
                        <div class="p-4 flex flex-col flex-grow">
                            <h3 class="text-lg font-semibold text-gray-800 mb-1">{{ $product->name }}</h3>
                            <p class="text-gray-500 text-sm flex-grow">{{ Str::limit($product->description, 60) }}</p>
                            <div class="mt-3 font-bold text-teal-600">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    @endif

    <!-- Why Choose Us Section -->
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Why Shop With Us?</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-xl text-center shadow hover:shadow-lg transition duration-300">
            <h3 class="text-lg font-semibold mb-2">✅ 100% Original Products</h3>
            <p class="text-gray-500 text-sm">All our products are guaranteed authentic and high quality.</p>
        </div>
        <div class="bg-white p-6 rounded-xl text-center shadow hover:shadow-lg transition duration-300">
            <h3 class="text-lg font-semibold mb-2">🚚 Fast Delivery</h3>
            <p class="text-gray-500 text-sm">We provide fast and secure shipping across Indonesia.</p>
        </div>
        <div class="bg-white p-6 rounded-xl text-center shadow hover:shadow-lg transition duration-300">
            <h3 class="text-lg font-semibold mb-2">💬 24/7 Support</h3>
            <p class="text-gray-500 text-sm">Our customer service team is always ready to help you.</p>
        </div>
    </div>
@endsection