@extends('layouts.app')

@section('title', 'Products - Ecommerce Healthcare')

@section('content')
    <h1 style="margin-bottom: 1.5rem; font-weight: 700; font-size: 2rem; color: #2c3e50;">All Products</h1>

    @if($products->isEmpty())
        <p>No products found.</p>
    @else
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 1.5rem;">
            @foreach($products as $product)
                <div style="background: #fff; border-radius: 8px; box-shadow: 0 2px 8px rgb(0 0 0 / 0.1); overflow: hidden; display: flex; flex-direction: column;">
                    <a href="{{ route('products.show', $product->id) }}" style="text-decoration: none; color: inherit;">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="width: 100%; height: 200px; object-fit: cover;">
                        <div style="padding: 1rem; flex-grow: 1; display: flex; flex-direction: column; justify-content: space-between;">
                            <h2 style="font-size: 1.1rem; font-weight: 600; margin: 0 0 0.5rem;">{{ $product->name }}</h2>
                            <p style="color: #666; font-size: 0.9rem; flex-grow: 1;">{{ Str::limit($product->description, 60) }}</p>
                            <div style="margin-top: 1rem; font-weight: 700; color: #007bff;">Rp{{ number_format($product->price, 0, ',', '.') }}</div>
                        </div>
                    </a>
                    <form action="{{ route('cart.add', $product->id) }}" method="POST" style="padding: 0 1rem 1rem;">
                        @csrf
                        <button type="submit" style="width: 100%; background: #007bff; border: none; color: white; padding: 0.5rem; border-radius: 4px; cursor: pointer; font-weight: 600;">
                            Add to Cart
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    @endif
@endsection