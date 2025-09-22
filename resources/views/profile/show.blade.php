@extends('layouts.app')

@section('title', 'My Account - My Pharmacy')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-sm max-w-2xl mx-auto">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">My Account</h1>

    <div class="space-y-3 text-gray-700">
        <p><span class="font-semibold">Name:</span> {{ $user->name }}</p>
        <p><span class="font-semibold">Email:</span> {{ $user->email }}</p>
        <p><span class="font-semibold">Role:</span> {{ ucfirst($user->role ?? 'user') }}</p>
        <p><span class="font-semibold">Created At:</span> {{ $user->created_at->format('d M Y') }}</p>
    </div>

    <div class="mt-6">
        <a href="{{ route('logout') }}" 
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
           class="inline-block rounded-md bg-amber-500 px-4 py-2 text-sm font-semibold text-white shadow-sm 
                  hover:bg-amber-400 hover:shadow-md transition duration-300 ease-in-out">
            Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
        </form>
    </div>
</div>
@endsection
