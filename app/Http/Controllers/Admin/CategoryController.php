<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Categories::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        Categories::create($request->all());
        return redirect()->route('admin.categories.index')->with('success', 'Category created!');
    }

    public function edit(Categories $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Categories $category)
    {
        $request->validate(['name' => 'required']);
        $category->update($request->all());
        return redirect()->route('admin.categories.index')->with('success', 'Category updated!');
    }

    public function destroy(Categories $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted!');
    }
}
