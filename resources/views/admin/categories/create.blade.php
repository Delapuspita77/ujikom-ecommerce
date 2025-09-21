@extends('layouts.admin')

@section('title', 'Add Category')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Add New Category</h1>

    @if ($errors->any())
        <div class="mb-4 text-red-600">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block font-medium">Category Name</label>
            <input type="text" name="name" id="name" 
                   class="w-full border px-3 py-2 rounded" 
                   value="{{ old('name') }}" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block font-medium">Description (optional)</label>
            <textarea name="description" id="description" 
                      class="w-full border px-3 py-2 rounded">{{ old('description') }}</textarea>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Save</button>
        <a href="{{ route('admin.categories.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</a>
    </form>
</div>
@endsection
