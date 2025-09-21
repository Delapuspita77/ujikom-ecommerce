@extends('layouts.admin')

@section('title','Edit Product')

@section('content')
<div class="bg-white p-6 rounded shadow">
    <h1 class="text-xl font-bold mb-4">Edit Product</h1>

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf 
        @method('PUT')

        {{-- Product Name --}}
        <div class="mb-4">
            <label class="block font-semibold mb-1">Name</label>
            <input 
                type="text" 
                name="name" 
                class="w-full border p-2 rounded" 
                value="{{ old('name', $product->name) }}" 
                required
            >
        </div>

        {{-- Description --}}
        <div class="mb-4">
            <label class="block font-semibold mb-1">Description</label>
            <textarea 
                name="description" 
                class="w-full border p-2 rounded"
            >{{ old('description', $product->description) }}</textarea>
        </div>

        {{-- Price --}}
        <div class="mb-4">
            <label class="block font-semibold mb-1">Price</label>
            <input 
                type="number" 
                name="price" 
                class="w-full border p-2 rounded" 
                value="{{ old('price', $product->price) }}" 
                required
            >
        </div>

        {{-- Category --}}
        <div class="mb-4">
            <label class="block font-semibold mb-1">Category</label>
            <select name="category_id" class="w-full border p-2 rounded">
                @foreach($categories as $cat)
                    <option 
                        value="{{ $cat->id }}" 
                        {{ old('category_id', $product->category_id) == $cat->id ? 'selected' : '' }}
                    >
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Image --}}
        <div class="mb-4">
            <label class="block font-semibold mb-1">Image</label>
            <input type="file" name="image" class="w-full border p-2 rounded">
            @if($product->image)
                <div class="mt-2">
                    <img src="{{ asset('storage/'.$product->image) }}" 
                         alt="{{ $product->name }}" 
                         class="w-32 rounded border">
                </div>
            @endif
        </div>

        {{-- Submit --}}
        <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Update
        </button>
    </form>
</div>
@endsection
