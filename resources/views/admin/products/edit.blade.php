@extends('layouts.admin')

@section('title','Edit Product')

@section('content')
<div class="bg-white p-6 rounded shadow">
    <h1 class="text-xl font-bold mb-4">Edit Product</h1>
    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="mb-4">
            <label class="block">Name</label>
            <input type="text" name="name" class="w-full border p-2 rounded" value="{{ $product->name }}" required>
        </div>
        <div class="mb-4">
            <label class="block">Description</label>
            <textarea name="description" class="w-full border p-2 rounded">{{ $product->description }}</textarea>
        </div>
        <div class="mb-4">
            <label class="block">Price</label>
            <input type="number" name="price" class="w-full border p-2 rounded" value="{{ $product->price }}" required>
        </div>
        <div class="mb-4">
            <label class="block">Category</label>
            <select name="category_id" class="w-full border p-2 rounded">
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" @if($cat->id==$product->category_id) selected @endif>{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label class="block">Image</label>
            <input type="file" name="image" class="w-full border p-2 rounded">
            @if($product->image)
                <img src="{{ asset('storage/'.$product->image) }}" class="w-32 mt-2 rounded">
            @endif
        </div>
        <button class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
@endsection
