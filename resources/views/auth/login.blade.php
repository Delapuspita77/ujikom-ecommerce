@extends('layouts.app')

@section('title', 'Login - Ecommerce Healthcare')

@section('content')
<div class="max-w-md mx-auto bg-white p-8 rounded-xl shadow-md">
    <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Login</h2>

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <!-- Email -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input type="email" id="email" name="email" required 
                class="w-full rounded-lg border-2 border-gray-300 bg-white px-3 py-2 text-sm text-gray-800 
                   focus:border-teal-500 focus:ring-2 focus:ring-teal-400 shadow-sm" />
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
            <input type="password" id="password" name="password" required 
                class="w-full rounded-lg border-2 border-gray-300 bg-white px-3 py-2 text-sm text-gray-800 
                   focus:border-teal-500 focus:ring-2 focus:ring-teal-400 shadow-sm" />
        </div>

        <!-- Submit -->
        <button type="submit" 
            class="w-full rounded-md bg-teal-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm 
                   hover:bg-teal-500 hover:shadow-md transition duration-300 ease-in-out">
            Login
        </button>
    </form>

    <!-- Register link -->
    <p class="mt-6 text-center text-sm text-gray-600">
        Belum punya akun? 
        <a href="{{ route('register') }}" class="text-amber-600 font-semibold hover:text-amber-500 transition">
            Register
        </a>
    </p>
</div>
@endsection
