@extends('layouts.app')

@section('title', 'Checkout - Ecommerce Healthcare')

@section('content')
    <h1 style="margin-bottom: 1.5rem; font-weight: 700; font-size: 2rem; color: #2c3e50;">Checkout</h1>

    <form action="{{ route('checkout.process') }}" method="POST" style="max-width: 500px;">
        @csrf
        <div style="margin-bottom: 1rem;">
            <label for="name" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Full Name</label>
            <input type="text" id="name" name="name" required style="width: 100%; padding: 0.5rem; border-radius: 4px; border: 1px solid #ccc;" />
        </div>
        <div style="margin-bottom: 1rem;">
            <label for="address" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Address</label>
            <textarea id="address" name="address" rows="3" required style="width: 100%; padding: 0.5rem; border-radius: 4px; border: 1px solid #ccc;"></textarea>
        </div>
        <div style="margin-bottom: 1rem;">
            <label for="payment_method" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Payment Method</label>
            <select id="payment_method" name="payment_method" required style="width: 100%; padding: 0.5rem; border-radius: 4px; border: 1px solid #ccc;">
                <option value="">Select payment method</option>
                <option value="credit_card">Credit Card</option>
                <option value="bank_transfer">Bank Transfer</option>
                <option value="cod">Cash on Delivery</option>
            </select>
        </div>
        <button type="submit" style="background: #007bff; color: white; padding: 0.75rem 1.5rem; border-radius: 6px; font-weight: 700; cursor: pointer;">
            Place Order
        </button>
    </form>
@endsection