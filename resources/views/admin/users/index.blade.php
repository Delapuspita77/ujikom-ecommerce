@extends('layouts.admin')

@section('title', 'Manage Users')

@section('content')
<div class="p-6">
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-2xl font-bold">Users</h1>

        <!-- 🔹 Tombol Add User -->
        <a href="{{ route('admin.users.create') }}" 
           class="bg-teal-600 text-white px-4 py-2 rounded shadow hover:bg-teal-500 transition">
            + Add New User
        </a>
    </div>

    <table class="w-full border border-gray-300 rounded-lg overflow-hidden">
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
                <tr class="hover:bg-gray-50 transition">
                    <td class="border px-3 py-2">{{ $user->id }}</td>
                    <td class="border px-3 py-2">{{ $user->name }}</td>
                    <td class="border px-3 py-2">{{ $user->email }}</td>
                    <td class="border px-3 py-2">{{ $user->role ?? 'user' }}</td>
                    <td class="border px-3 py-2 space-x-2">
                        <a href="{{ route('admin.users.edit', $user->id) }}" 
                           class="text-blue-600 hover:underline">Edit</a>
                        
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="text-red-600 hover:underline"
                                    onclick="return confirm('Are you sure?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="border px-3 py-2 text-center text-gray-500">No users found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
