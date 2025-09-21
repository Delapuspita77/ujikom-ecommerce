<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Categories;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::latest()->take(8)->get(); // ambil sebagian buat featured
        // return view('home', compact('products'));

        // $products = Product::latest()->take(8)->get();
        $categories = Categories::all();
        return view('home', compact('products', 'categories'));

    }

    
}

