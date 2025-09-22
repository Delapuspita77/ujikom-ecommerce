@extends('layouts.admin')

@section('title', 'Edit Category')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Edit Category</h1>

    {{-- Error Messages --}}
    @if ($errors->any())
        <div class="mb-4 p-3 rounded bg-red-50 border border-red-200 text-red-700">
            <ul class="list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        {{-- Category Name --}}
        <div>
            <label for="name" class="block font-medium text-gray-700 mb-1">Category Name</label>
            <input type="text" name="name" id="name"
                   class="w-full border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500 px-3 py-2"
                   value="{{ old('name', $category->name) }}" required>
        </div>

        {{-- Description --}}
        <div>
            <label for="description" class="block font-medium text-gray-700 mb-1">Description (optional)</label>
            <textarea name="description" id="description" rows="3"
                      class="w-full border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500 px-3 py-2">{{ old('description', $category->description) }}</textarea>
        </div>

        {{-- Actions --}}
        <div class="flex gap-3">
            <button type="submit"
                    class="px-4 py-2 bg-teal-600 text-white rounded-md font-medium hover:bg-teal-700 transition">
                Update
            </button>
            <a href="{{ route('admin.categories.index') }}"
               class="px-4 py-2 bg-gray-500 text-white rounded-md font-medium hover:bg-gray-600 transition">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
