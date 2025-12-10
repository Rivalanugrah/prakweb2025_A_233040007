<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public function index()
    {
        // OPSI 1: Dengan pagination (REKOMENDASI)
        $posts = Post::with(['author', 'category'])
                    ->latest()
                    ->paginate(10); // 10 posts per halaman
        
        // OPSI 2: Dengan search filter + pagination
        /*
        $posts = Post::with(['author', 'category'])
                    ->latest()
                    ->filter(request(['search', 'category', 'author']))
                    ->paginate(10)
                    ->withQueryString();
        */
        
        // OPSI 3: Tanpa pagination (hanya untuk testing)
        // $posts = Post::with(['author', 'category'])->latest()->get();

        return view('posts', [
            'title' => 'Daftar Posts',
            'posts' => $posts
        ]);
    }

    public function create()
    {
        // Jika ingin membuat form create untuk public (bukan di dashboard)
        $categories = Category::all();
        
        return view('posts.create', [
            'title' => 'Create New Post',
            'categories' => $categories
        ]);
    }

    public function show(Post $post)
    {
        // Method untuk melihat detail post
        return view('posts.show', [
            'title' => $post->title,
            'post' => $post->load(['author', 'category']) // Load relationships
        ]);
    }
}