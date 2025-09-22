@extends('layouts.app')

@section('title', 'Checkout - Ecommerce Healthcare')

@section('content')
    <h1 class="text-2xl font-bold text-gray-900 mb-6 text-center">Checkout</h1>

    <div class="max-w-lg mx-auto bg-white shadow rounded-xl p-6">
        <form action="{{ route('checkout.process') }}" method="POST" class="space-y-5">
            @csrf

            <!-- Full Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                <input type="text" id="name" name="name" required
                    class="w-full rounded-md border border-gray-300 bg-white text-gray-900 shadow-sm focus:border-teal-500 focus:ring-teal-500 text-sm px-3 py-2 placeholder-gray-400" />
            </div>

            <!-- Address -->
            <div>
                <label for="address" class="block text-sm font-medium text-gray-700 mb-2">Address</label>
                <textarea id="address" name="address" rows="3" required
                    class="w-full rounded-md border border-gray-300 bg-white text-gray-900 shadow-sm focus:border-teal-500 focus:ring-teal-500 text-sm px-3 py-2 placeholder-gray-400"></textarea>
            </div>

            <!-- Payment Method -->
            <div>
                <label for="payment_method" class="block text-sm font-medium text-gray-700 mb-2">Payment Method</label>
                <select id="payment_method" name="payment_method" required
                    class="w-full rounded-md border border-gray-300 bg-white text-gray-900 shadow-sm focus:border-teal-500 focus:ring-teal-500 text-sm px-3 py-2">
                    <option value="">Select payment method</option>
                    <option value="credit_card">Credit Card</option>
                    <option value="bank_transfer">Bank Transfer</option>
                    <option value="cod">Cash on Delivery</option>
                </select>
            </div>

            <!-- Submit Button -->
            <div class="pt-2">
                <button type="submit"
                    class="w-full rounded-md bg-teal-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm 
                           hover:bg-teal-500 hover:shadow-md transition duration-300 ease-in-out">
                    Place Order
                </button>
            </div>
        </form>
    </div>
@endsection
