<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DashboardPostController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $posts = Post::with(['author', 'category'])
            ->where('user_id', Auth::id())
            ->when($search, function ($query) use ($search) {
                $query->where('title', 'like', "%$search%");
            })
            ->latest()
            ->paginate(10);

        return view('dashboard.posts.index', [
            'title' => 'Manage Posts',
            'posts' => $posts
        ]);
    }

    public function create()
    {
        return view('dashboard.posts.create', [
            'title' => 'Create New Post',
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|min:3|max:255',
            'category_id' => 'required|exists:categories,id',
            'excerpt'     => 'required|min:10|max:255',
            'body'        => 'required',
            'image'       => 'image|file|max:2048'
        ]);

        if ($request->file('image')) {
            $validated['image'] = $request->file('image')->store('post-images');
        }

        $validated['slug'] = Str::slug($validated['title']) . '-' . Str::random(5);
        $validated['user_id'] = Auth::id();

        Post::create($validated);

        return redirect()->route('dashboard.posts.index')
            ->with('success', 'Post berhasil dibuat!');
    }

    public function show(Post $post)
    {
        $this->authorizeAccess($post);

        return view('dashboard.posts.show', [
            'title' => 'Detail Post',
            'post' => $post
        ]);
    }

    public function edit(Post $post)
    {
        $this->authorizeAccess($post);

        return view('dashboard.posts.edit', [
            'title' => 'Edit Post',
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $this->authorizeAccess($post);

        $validated = $request->validate([
            'title'       => 'required|min:3|max:255',
            'category_id' => 'required|exists:categories,id',
            'excerpt'     => 'required|min:10|max:255',
            'body'        => 'required',
            'image'       => 'image|file|max:2048'
        ]);

        if ($request->file('image')) {
            if ($post->image) {
                Storage::delete($post->image);
            }

            $validated['image'] = $request->file('image')->store('post-images');
        }

        $validated['slug'] = Str::slug($validated['title']) . '-' . Str::random(5);

        $post->update($validated);

        return redirect()->route('dashboard.posts.index')
            ->with('success', 'Post berhasil diperbarui!');
    }

    public function destroy(Post $post)
    {
        $this->authorizeAccess($post);

        if ($post->image) {
            Storage::delete($post->image);
        }

        $post->delete();

        return redirect()->route('dashboard.posts.index')
            ->with('success', 'Post berhasil dihapus!');
    }

    private function authorizeAccess(Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            abort(403, 'Anda tidak punya akses ke post ini.');
        }
    }
}
