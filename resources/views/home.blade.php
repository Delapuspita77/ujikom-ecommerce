@extends('layouts.app')

@section('title', 'Home - Ecommerce Healthcare')

@section('content')
    <!-- Hero Section -->
    <div style="background: linear-gradient(135deg, #007bff 0%, #00c6ff 100%); color:white; padding:4rem 2rem; border-radius:12px; text-align:center; margin-bottom:3rem;">
        <h1 style="font-size:2.5rem; font-weight:700; margin-bottom:1rem;">
            Welcome to Ecommerce Healthcare
        </h1>
        <p style="font-size:1.2rem; margin-bottom:1.5rem;">
            Your trusted store for health products, supplements, and medical supplies.
        </p>
        <a href="{{ route('products.index') }}" 
           style="background:white; color:#007bff; padding:0.75rem 1.5rem; border-radius:8px; font-weight:700; text-decoration:none;">
            Shop Now
        </a>
    </div>

    <!-- Categories Section -->
    <h2 style="font-size:1.8rem; font-weight:700; margin-bottom:1.5rem; color:#2c3e50;">Shop by Categories</h2>
    <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(180px,1fr)); gap:1.5rem; margin-bottom:3rem;">
        <div style="background:#f8f9fa; border-radius:8px; padding:2rem; text-align:center; box-shadow:0 2px 6px rgba(0,0,0,0.1);">
            <h3>Vitamins</h3>
        </div>
        <div style="background:#f8f9fa; border-radius:8px; padding:2rem; text-align:center; box-shadow:0 2px 6px rgba(0,0,0,0.1);">
            <h3>Medicines</h3>
        </div>
        <div style="background:#f8f9fa; border-radius:8px; padding:2rem; text-align:center; box-shadow:0 2px 6px rgba(0,0,0,0.1);">
            <h3>Medical Devices</h3>
        </div>
    </div>

    <!-- Featured Products -->
    <h2 style="font-size:1.8rem; font-weight:700; margin-bottom:1.5rem; color:#2c3e50;">Featured Products</h2>
    @if($products->isEmpty())
        <p>No products available at the moment.</p>
    @else
        <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(220px, 1fr)); gap:1.5rem; margin-bottom:3rem;">
            @foreach($products->take(4) as $product) <!-- cuma ambil 4 produk -->
                <div style="background:white; border-radius:8px; box-shadow:0 2px 8px rgba(0,0,0,0.1); overflow:hidden; display:flex; flex-direction:column;">
                    <a href="{{ route('products.show', $product->id) }}" style="text-decoration:none; color:inherit;">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="width: 100%; height: 200px; object-fit: cover;">
                        <div style="padding:1rem;">
                            <h3 style="font-size:1.1rem; font-weight:600;">{{ $product->name }}</h3>
                            <p style="color:#666; font-size:0.9rem;">{{ Str::limit($product->description, 50) }}</p>
                            <div style="font-weight:700; color:#007bff; margin-top:0.5rem;">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    @endif

    <!-- Why Choose Us Section -->
    <h2 style="font-size:1.8rem; font-weight:700; margin-bottom:1.5rem; color:#2c3e50;">Why Shop With Us?</h2>
    <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(220px, 1fr)); gap:1.5rem;">
        <div style="background:#fff; padding:1.5rem; border-radius:8px; text-align:center; box-shadow:0 2px 6px rgba(0,0,0,0.1);">
            <h3>✅ 100% Original Products</h3>
            <p style="color:#666; font-size:0.9rem;">All our products are guaranteed authentic and high quality.</p>
        </div>
        <div style="background:#fff; padding:1.5rem; border-radius:8px; text-align:center; box-shadow:0 2px 6px rgba(0,0,0,0.1);">
            <h3>🚚 Fast Delivery</h3>
            <p style="color:#666; font-size:0.9rem;">We provide fast and secure shipping across Indonesia.</p>
        </div>
        <div style="background:#fff; padding:1.5rem; border-radius:8px; text-align:center; box-shadow:0 2px 6px rgba(0,0,0,0.1);">
            <h3>💬 24/7 Support</h3>
            <p style="color:#666; font-size:0.9rem;">Our customer service team is always ready to help you.</p>
        </div>
    </div>
@endsection
