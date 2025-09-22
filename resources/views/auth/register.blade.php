@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="max-w-md mx-auto p-8 bg-white rounded-lg shadow">
    <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Create an Account</h2>

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <!-- Name -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
            <input type="text" id="name" name="name" required
                class="w-full rounded-lg border-2 border-gray-300 bg-white px-3 py-2 text-sm text-gray-800
                       focus:border-teal-500 focus:ring-2 focus:ring-teal-400 shadow-sm" />
        </div>

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

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required
                class="w-full rounded-lg border-2 border-gray-300 bg-white px-3 py-2 text-sm text-gray-800
                       focus:border-teal-500 focus:ring-2 focus:ring-teal-400 shadow-sm" />
        </div>

        <!-- Submit -->
        <button type="submit"
            class="w-full rounded-md bg-teal-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm
                   hover:bg-teal-500 hover:shadow-md transition duration-300 ease-in-out">
            Register
        </button>
    </form>

    <p class="mt-4 text-sm text-gray-600 text-center">
        Already have an account?
        <a href="{{ route('login') }}" class="text-teal-600 hover:text-teal-500 font-semibold">Login</a>
    </p>
</div>
@endsection
