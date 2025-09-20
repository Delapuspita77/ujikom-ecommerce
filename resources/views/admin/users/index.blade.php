@extends('layouts.admin')

@section('title', 'Manage Users')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Users</h1>

    <table class="w-full border border-gray-300">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-3 py-2">ID</th>
                <th class="border px-3 py-2">Name</th>
                <th class="border px-3 py-2">Email</th>
                <th class="border px-3 py-2">Role</th>
                <th class="border px-3 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
                <tr>
                    <td class="border px-3 py-2">{{ $user->id }}</td>
                    <td class="border px-3 py-2">{{ $user->name }}</td>
                    <td class="border px-3 py-2">{{ $user->email }}</td>
                    <td class="border px-3 py-2">{{ $user->role ?? 'user' }}</td>
                    <td class="border px-3 py-2">
                        <a href="#" class="text-blue-600">Edit</a> |
                        <a href="#" class="text-red-600">Delete</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="border px-3 py-2 text-center">No users found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
