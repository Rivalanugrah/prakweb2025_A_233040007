<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Posts in {{ $category->name }}</title>

    <style>
        body { font-family: Arial, sans-serif; background:#f5f5f5; margin:0; padding:0; }
        nav { background:white; padding:15px 20px; box-shadow:0 1px 4px rgba(0,0,0,0.1); display:flex; justify-content:space-between; }
        nav a { text-decoration:none; margin-right:20px; color:#333; }
        nav a:hover { color:#2563eb; }
        .container { max-width:900px; margin:40px auto; padding:0 20px; }

        .post-card {
            background:white; padding:20px; margin-bottom:15px;
            border-radius:8px; box-shadow:0 2px 4px rgba(0,0,0,0.1);
        }

        .post-card a { font-size:20px; color:#2563eb; text-decoration:none; }
        .post-card a:hover { text-decoration:underline; }
        .meta { color:#777; font-size:14px; margin-top:5px; }

        footer { text-align:center; margin-top:40px; padding:20px; color:#777; }
    </style>
</head>

<body>
    <nav>
        <div>
            <a href="/">Home</a>
            <a href="/about">About</a>
            <a href="/posts">Posts</a>
            <a href="/categories" style="font-weight:bold; color:#2563eb;">Categories</a>
            <a href="/users">Users</a>
        </div>

        <div>
            @auth
                <span>Hi, {{ auth()->user()->name }}</span>
                <a href="/dashboard">Dashboard</a>
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button style="background:#ef4444; color:white; padding:6px 12px; border:none; border-radius:4px; cursor:pointer;">
                        Logout
                    </button>
                </form>
            @else
                <a href="/login">Login</a>
                <a href="/register">Register</a>
            @endauth
        </div>
    </nav>

    <div class="container">
        <h1>Posts in "{{ $category->name }}"</h1>

        @forelse ($posts as $post)
            <div class="post-card">
                <a href="/posts/{{ $post->slug }}">{{ $post->title }}</a>
                <div class="meta">
                    by {{ $post->author->name }} — {{ $post->created_at->diffForHumans() }}
                </div>
            </div>
        @empty
            <p style="text-align:center; color:#666;">No posts available in this category.</p>
        @endforelse

        <div style="margin-top:20px;">
            {{ $posts->links() }}
        </div>
    </div>

    <footer>
        © {{ date('Y') }}
    </footer>
</body>
</html>
