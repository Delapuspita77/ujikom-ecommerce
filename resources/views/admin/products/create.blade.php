@extends('layouts.admin')

@section('title','Add Product')

@section('content')
<div class="bg-white p-6 rounded shadow">
    <h1 class="text-xl font-bold mb-4">Add Product</h1>
    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label class="block">Name</label>
            <input type="text" name="name" class="w-full border p-2 rounded" required>
        </div>
        <div class="mb-4">
            <label class="block">Description</label>
            <textarea name="description" class="w-full border p-2 rounded"></textarea>
        </div>
        <div class="mb-4">
            <label class="block">Price</label>
            <input type="number" name="price" class="w-full border p-2 rounded" required>
        </div>
        <div class="mb-4">
            <label class="block">Category</label>
            <select name="category_id" class="w-full border p-2 rounded">
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label class="block">Image</label>
            <input type="file" name="image" class="w-full border p-2 rounded">
        </div>
        <button class="bg-blue-600 text-white px-4 py-2 rounded">Save</button>
    </form>
</div>
@endsection
