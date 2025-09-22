@extends('layouts.admin')

@section('title','Edit Product')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    <h1 class="text-xl font-bold mb-6 text-gray-800">Edit Product</h1>

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf 
        @method('PUT')

        {{-- Product Name --}}
        <div>
            <label class="block font-medium text-gray-700 mb-1">Name</label>
            <input 
                type="text" 
                name="name" 
                value="{{ old('name', $product->name) }}" 
                required
                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition"
            >
        </div>

        {{-- Description --}}
        <div>
            <label class="block font-medium text-gray-700 mb-1">Description</label>
            <textarea 
                name="description" 
                rows="4"
                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition"
            >{{ old('description', $product->description) }}</textarea>
        </div>

        {{-- Price --}}
        <div>
            <label class="block font-medium text-gray-700 mb-1">Price</label>
            <input 
                type="number" 
                name="price" 
                value="{{ old('price', $product->price) }}" 
                required
                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition"
            >
        </div>

        {{-- Category --}}
        <div>
            <label class="block font-medium text-gray-700 mb-1">Category</label>
            <select 
                name="category_id" 
                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition"
            >
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
        <div>
            <label class="block font-medium text-gray-700 mb-1">Image</label>
            <input 
                type="file" 
                name="image" 
                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition"
            >
            @if($product->image)
                <div class="mt-3">
                    <img src="{{ asset('storage/'.$product->image) }}" 
                         alt="{{ $product->name }}" 
                         class="w-32 h-32 object-cover rounded border">
                </div>
            @endif
        </div>

        {{-- Submit --}}
        <div>
            <button 
                type="submit" 
                class="bg-teal-600 text-white px-5 py-2.5 rounded-lg shadow-sm hover:bg-teal-500 transition font-medium"
            >
                Update
            </button>
        </div>
    </form>
</div>
@endsection
