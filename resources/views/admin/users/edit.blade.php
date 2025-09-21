@extends('layouts.admin')

@section('title','Edit User')

@section('content')
<div class="bg-white p-6 rounded shadow">
    <h1 class="text-xl font-bold mb-4">Edit User</h1>
    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-4">
            <label class="block">Name</label>
            <input type="text" name="name" value="{{ $user->name }}" class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block">Email</label>
            <input type="email" name="email" value="{{ $user->email }}" class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block">Role</label>
            <select name="role" class="w-full border p-2 rounded">
                <option value="user" @if($user->role=='user') selected @endif>User</option>
                <option value="admin" @if($user->role=='admin') selected @endif>Admin</option>
            </select>
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
@endsection
