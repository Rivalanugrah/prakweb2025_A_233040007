<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        // Mengambil semua post dengan relasi author & category
        $posts = Post::with(['author', 'category'])->latest()->get();

        // Mengirim data ke view posts.blade.php
        return view('posts', [
            'posts' => $posts
        ]);
    }

    public function create()
    {
        return "Ini adalah halaman create post";
    }
}
