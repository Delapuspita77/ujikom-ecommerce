@extends('layouts.admin')

@section('title', 'Manage Products')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Products</h1>
        <a href="{{ route('admin.products.create') }}" 
           class="inline-block px-4 py-2 rounded-md bg-teal-600 text-white font-semibold shadow-sm 
                  hover:bg-teal-500 hover:shadow-md transition">
            + Add Product
        </a>
    </div>

    <!-- Tabel Produk -->
    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-500 rounded-lg overflow-hidden">
            <thead>
                <tr class="bg-gray-100 text-gray-700">
                    <th class="border px-3 py-2">ID</th>
                    <th class="border px-3 py-2">Name</th>
                    <th class="border px-3 py-2">Price</th>
                    <th class="border px-3 py-2">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($products as $product)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-4 py-2">{{ $product->id }}</td>
                        <td class="px-4 py-2 font-medium text-gray-800">{{ $product->name }}</td>
                        <td class="px-4 py-2 text-green-600 font-semibold">
                            Rp{{ number_format($product->price, 0, ',', '.') }}
                        </td>
                        <td class="px-4 py-2 text-center space-x-2">
                            <a href="{{ route('admin.products.edit', $product->id) }}" 
                               class="px-3 py-1 rounded bg-blue-500 text-white text-sm font-medium hover:bg-blue-600 transition">
                                Edit
                            </a>
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" 
                                        class="px-3 py-1 rounded bg-red-500 text-white text-sm font-medium hover:bg-red-600 transition"
                                        onclick="return confirm('Are you sure want to delete this product?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-4 text-center text-gray-500">
                            No products found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
