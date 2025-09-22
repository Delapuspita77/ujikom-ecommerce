@extends('layouts.app')

@section('title', 'Products - My Pharmacy')

@section('content')
    <h1 class="text-3xl font-bold text-gray-800 mb-8">All Products</h1>

    @if($products->isEmpty())
        <p class="text-gray-600">No products found.</p>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($products as $product)
                <div class="bg-white rounded-xl shadow hover:shadow-lg transition duration-300 overflow-hidden flex flex-col">
                    <!-- Link ke detail produk -->
                    <a href="{{ route('products.show', $product->id) }}" class="flex flex-col h-full">
                        <img src="{{ asset('storage/' . $product->image) }}" 
                             alt="{{ $product->name }}" 
                             class="w-full h-48 object-cover">
                        <div class="p-4 flex flex-col flex-grow">
                            <h2 class="text-lg font-semibold text-gray-800 mb-1">{{ $product->name }}</h2>
                            <p class="text-gray-500 text-sm flex-grow">{{ Str::limit($product->description, 60) }}</p>
                            <div class="mt-3 font-bold text-green-600">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </div>
                        </div>
                    </a>

                    <!-- Tombol Add to Cart -->
                    <form action="{{ route('cart.add', $product->id) }}" method="POST" class="p-4 pt-0">
                        @csrf
                        <button type="submit" 
                                class="w-full rounded-md bg-teal-600 px-4 py-2 text-sm font-semibold text-white shadow-sm 
                                       hover:bg-teal-500 hover:shadow-md transition duration-300 ease-in-out">
                            Add to Cart
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    @endif
@endsection
