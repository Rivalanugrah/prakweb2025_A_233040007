<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil posts milik user yang login
        $posts = Post::where('user_id', auth()->id())
                    ->with(['category', 'author'])
                    ->latest()
                    ->paginate(10);
        
        // Hitung statistik
        $totalPosts = Post::where('user_id', auth()->id())->count();
        $todayPosts = Post::where('user_id', auth()->id())
                         ->whereDate('created_at', today())
                         ->count();
        $lastUpdated = Post::where('user_id', auth()->id())
                          ->latest('updated_at')
                          ->value('updated_at');
        
        return view('dashboard', [
            'title' => 'Dashboard',
            'posts' => $posts,
            'totalPosts' => $totalPosts,
            'todayPosts' => $todayPosts,
            'lastUpdated' => $lastUpdated
        ]);
    }
}