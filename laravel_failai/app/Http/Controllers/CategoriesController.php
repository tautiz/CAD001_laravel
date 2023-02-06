<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        return view('categories.index');
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $categories = Category::create($request->all());
        return redirect()->route('categories.show', $categories);
    }

    public function show(Category $categories)
    {
        return $categories;
    }

    public function edit(Category $categories)
    {
        return view('categories.edit', compact('categories'));
    }

    public function update(Request $request, Category $categories)
    {
        $categories->update($request->all());
        return redirect()->route('categories.show', $categories);
    }

    public function destroy(Category $categories)
    {
        $categories->delete();
        return redirect()->route('categories.index');
    }
}
