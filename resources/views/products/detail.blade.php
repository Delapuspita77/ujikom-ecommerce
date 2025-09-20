@extends('layouts.app')

@section('title', $product->name . ' - Ecommerce Healthcare')

@section('content')
    <div style="display: flex; flex-wrap: wrap; gap: 2rem;">
        <div style="flex: 1 1 300px; max-width: 400px;">
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="width: 100%; height: 200px; object-fit: cover;">
        </div>
        <div style="flex: 2 1 400px;">
            <h1 style="font-weight: 700; font-size: 2rem; margin-bottom: 1rem;">{{ $product->name }}</h1>
            <p style="font-size: 1rem; color: #555; margin-bottom: 1rem;">{{ $product->description }}</p>
            <div style="font-size: 1.5rem; font-weight: 700; color: #007bff; margin-bottom: 1.5rem;">
                Rp{{ number_format($product->price, 0, ',', '.') }}
            </div>
            <form action="{{ route('cart.add', $product->id) }}" method="POST" style="max-width: 200px;">
                @csrf
                <button type="submit" style="width: 100%; background: #007bff; border: none; color: white; padding: 0.75rem; border-radius: 6px; font-weight: 700; cursor: pointer;">
                    Add to Cart
                </button>
            </form>
        </div>
    </div>
@endsection