<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Categories;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // Query produk dengan relasi kategori
        $query = Product::with('category');

        // Jika ada parameter category di URL, filter produk berdasarkan kategori
        if ($request->has('category')) {
            $query->where('category_id', $request->category);
        }

        $products = $query->get();
        $categories = Categories::all();

        return view('products.index', compact('products', 'categories'));
    }

    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);
        return view('products.detail', compact('product'));
    }
}

