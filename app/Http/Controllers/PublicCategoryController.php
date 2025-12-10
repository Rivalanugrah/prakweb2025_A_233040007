<?php

namespace App\Http\Controllers;

use App\Models\Category;

class PublicCategoryController extends Controller
{
    public function index()
    {
        return view('categories.index', [
            'title' => 'All Categories',
            'categories' => Category::withCount('posts')->get()
        ]);
    }

    public function show(Category $category)
    {
        return view('categories.show', [
            'title' => $category->name,
            'category' => $category->load('posts')
        ]);
    }
}
