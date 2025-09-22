@extends('layouts.admin')

@section('title','Edit User')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    <h1 class="text-xl font-bold mb-6 text-gray-800">Edit User</h1>

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="space-y-5">
        @csrf 
        @method('PUT')

        {{-- Name --}}
        <div>
            <label class="block font-medium text-gray-700 mb-1">Name</label>
            <input 
                type="text" 
                name="name" 
                value="{{ old('name', $user->name) }}" 
                required
                class="w-full border border-gray-300 rounded-lg px-3 py-2 
                       focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition"
            >
        </div>

        {{-- Email --}}
        <div>
            <label class="block font-medium text-gray-700 mb-1">Email</label>
            <input 
                type="email" 
                name="email" 
                value="{{ old('email', $user->email) }}" 
                required
                class="w-full border border-gray-300 rounded-lg px-3 py-2 
                       focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition"
            >
        </div>

        {{-- Role --}}
        <div>
            <label class="block font-medium text-gray-700 mb-1">Role</label>
            <select 
                name="role" 
                class="w-full border border-gray-300 rounded-lg px-3 py-2 
                       focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition"
            >
                <option value="user" @if($user->role=='user') selected @endif>User</option>
                <option value="admin" @if($user->role=='admin') selected @endif>Admin</option>
            </select>
        </div>

        {{-- Submit --}}
        <div>
            <button 
                type="submit" 
                class="bg-teal-600 text-white px-5 py-2.5 rounded-lg shadow-sm 
                       hover:bg-teal-500 transition font-medium"
            >
                Update
            </button>
        </div>
    </form>
</div>
@endsection
