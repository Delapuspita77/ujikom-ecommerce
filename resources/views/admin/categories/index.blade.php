@extends('layouts.admin')

@section('title', 'Manage Categories')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Categories</h1>

    <a href="{{ route('admin.categories.create') }}" 
       class="inline-block px-4 py-2 mb-4 bg-teal-600 text-white rounded-md hover:bg-teal-700 transition">
        + Add Category
    </a>

    <div class="overflow-x-auto">
        <table class="w-full border border-gray-200 rounded-lg overflow-hidden">
            <thead>
                <tr class="bg-gray-50 text-left text-gray-700">
                    <th class="p-3 border">ID</th>
                    <th class="p-3 border">Name</th>
                    <th class="p-3 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="p-3 border font-medium text-gray-800">{{ $category->id }}</td>
                        <td class="p-3 border">{{ $category->name }}</td>
                        <td class="p-3 border space-x-2">
                            <a href="{{ route('admin.categories.edit', $category->id) }}" 
                               class="text-blue-600 hover:underline font-medium">Edit</a>
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" 
                                    onclick="return confirm('Are you sure?')"
                                    class="text-red-600 hover:underline font-medium">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="p-3 border text-center text-gray-500 italic">
                            No categories found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
