@extends('layouts.admin')

@section('title', 'Manage Categories')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Categories</h1>

    <a href="{{ route('admin.categories.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">+ Add Category</a>

    <table class="w-full mt-6 border border-gray-300">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-3 py-2">ID</th>
                <th class="border px-3 py-2">Name</th>
                <th class="border px-3 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
                <tr>
                    <td class="border px-3 py-2">{{ $category->id }}</td>
                    <td class="border px-3 py-2">{{ $category->name }}</td>
                    <td class="border px-3 py-2">
                        <a href="{{ route('admin.categories.edit', $category->id) }}" class="text-blue-600">Edit</a> |
                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-600">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="border px-3 py-2 text-center">No categories found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
