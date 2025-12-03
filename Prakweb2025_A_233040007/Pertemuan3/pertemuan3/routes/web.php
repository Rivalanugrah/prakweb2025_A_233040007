<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Models\User;

// =======================
// Halaman Utama
// =======================
Route::get('/', function () {
    return view('home');
});

// Halaman About
Route::get('/about', function () {
    return view('about');
});

Route::get('/users', function () {
    return view('users', [
        'title' => 'Daftar Users',
        'users' => User::limit(5)->get()
    ]);
});

// =======================
// Posts
// =======================
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/create', [PostController::class, 'create']);

// =======================
// Categories
// =======================
Route::get('/categories', [CategoryController::class, 'index']);

// =======================
// Cek Seeder (OPSIONAL)
// =======================
Route::get('/cek-users', function () {
    return App\Models\User::all();
});
Route::get('/cek-categories', function () {
    return App\Models\Category::all();
});
Route::get('/cek-posts', function () {
    return App\Models\Post::all();
});
