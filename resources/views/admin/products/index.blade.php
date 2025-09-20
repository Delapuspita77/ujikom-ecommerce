@extends('layouts.admin')

@section('title', 'Manage Products')

@section('content')
<div class="p-6 bg-white rounded-lg shadow">
    <h1 class="text-2xl font-bold mb-4">Products</h1>

    <a href="{{ route('admin.products.create') }}" 
       class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Add Product</a>

    <table class="w-full mt-4 border-collapse border border-gray-200">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">Name</th>
                <th class="border px-4 py-2">Price</th>
                <th class="border px-4 py-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr class="hover:bg-gray-50">
                <td class="border px-4 py-2">{{ $product->id }}</td>
                <td class="border px-4 py-2">{{ $product->name }}</td>
                <td class="border px-4 py-2">Rp{{ number_format($product->price, 0, ',', '.') }}</td>
                <td class="border px-4 py-2">
                    <a href="{{ route('admin.products.edit', $product->id) }}" class="text-blue-600 hover:underline">Edit</a>
                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline ml-2">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
