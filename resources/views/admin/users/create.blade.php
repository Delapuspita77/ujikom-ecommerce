@extends('layouts.admin')

@section('title', 'Add User - Admin')

@section('content')
<div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">Add New User</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block font-medium mb-1">Name</label>
            <input type="text" name="name" class="w-full border rounded px-3 py-2" required>
        </div>
        <div>
            <label class="block font-medium mb-1">Email</label>
            <input type="email" name="email" class="w-full border rounded px-3 py-2" required>
        </div>
        <div>
            <label class="block font-medium mb-1">Password</label>
            <input type="password" name="password" class="w-full border rounded px-3 py-2" required>
        </div>
        <div>
            <label class="block font-medium mb-1">Confirm Password</label>
            <input type="password" name="password_confirmation" class="w-full border rounded px-3 py-2" required>
        </div>
        <div>
            <label class="block font-medium mb-1">Role</label>
            <select name="role" class="w-full border rounded px-3 py-2" required>
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        <button type="submit" 
            class="bg-teal-600 text-white px-4 py-2 rounded hover:bg-teal-500 transition">
            Add User
        </button>
    </form>
</div>
@endsection
