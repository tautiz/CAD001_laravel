<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the categories.
     *
     * @return CategoryResource
     */
    public function index()
    {
        $categories = Category::all();
        return new CategoryResource($categories);
    }
}
