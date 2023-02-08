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
        $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'slug' => ['required', 'string', 'min:3', 'max:255'],
            'description' => ['nullable', 'string', 'min:3', 'max:255'],
            'image' => ['nullable'],
            'status_id' => ['required', 'integer', 'exists:statuses,id'],
            'parent_id' => ['nullable', 'integer', 'exists:categories,id'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

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
