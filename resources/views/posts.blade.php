<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Daftar Posts' }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }
        nav {
            background: white;
            padding: 15px 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .nav-left, .nav-right {
            display: flex;
            gap: 20px;
            align-items: center;
        }
        a {
            text-decoration: none;
            color: #333;
            padding: 8px 12px;
            border-radius: 4px;
            transition: background 0.3s;
        }
        a:hover {
            background: #f0f0f0;
        }
        .auth-buttons a {
            background: #3b82f6;
            color: white;
            padding: 8px 16px;
        }
        .auth-buttons a:hover {
            background: #2563eb;
        }
        .logout-btn {
            background: #ef4444;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
        }
        .logout-btn:hover {
            background: #dc2626;
        }
        .user-info {
            color: #666;
            font-size: 14px;
        }
        main {
            max-width: 1200px;
            margin: 0 auto;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }
        article {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        article h2 {
            margin-top: 0;
            color: #2d3748;
        }
        .post-meta {
            color: #666;
            font-size: 14px;
            margin-bottom: 10px;
        }
        .post-excerpt {
            color: #4a5568;
            line-height: 1.6;
            margin-bottom: 10px;
        }
        .post-date {
            color: #718096;
            font-size: 12px;
        }
        footer {
            margin-top: 50px;
            text-align: center;
            padding: 20px;
            background: #f0f0f0;
            border-radius: 8px;
        }
        .read-more {
            display: inline-block;
            margin-top: 10px;
            color: #3b82f6;
            font-weight: bold;
        }
        .read-more:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar Sama dengan Home -->
    <nav>
        <div class="nav-left">
            <a href="/">Home</a>
            <a href="/about">About</a>
            <a href="/posts">Posts</a>
            <a href="/categories">Categories</a>
            <a href="/users">Users</a>
        </div>
        
        <div class="nav-right">
            @auth
                <!-- Jika user sudah login -->
                <span class="user-info">Welcome, {{ auth()->user()->name }}</span>
                <a href="/dashboard">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}" style="margin:0;">
                    @csrf
                    <button type="submit" class="logout-btn">Logout</button>
                </form>
            @else
                <!-- Jika user belum login -->
                <div class="auth-buttons" style="display:flex; gap:10px;">
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}">Register</a>
                </div>
            @endauth
        </div>
    </nav>

    <main>
        <h1>Daftar Semua Posts</h1>

        @if ($posts->isEmpty())
            <div style="text-align: center; padding: 40px; background: white; border-radius: 8px;">
                <p style="color: #666; font-size: 18px;">Tidak ada post ditemukan.</p>
            </div>
        @else
            @foreach ($posts as $post)
                <article>
                    <h2>{{ $post->title }}</h2>

                    <div class="post-meta">
                        <strong>Author:</strong> {{ $post->author->name }}
                        |
                        <strong>Category:</strong> {{ $post->category->name }}
                    </div>

                    <p class="post-excerpt">{{ $post->excerpt }}</p>

                    <div class="post-date">
                        <small>Dibuat pada: {{ $post->created_at->format('d M Y H:i') }}</small>
                    </div>

                    <a href="/posts/{{ $post->slug }}" class="read-more">
                        Baca selengkapnya →
                    </a>
                </article>
            @endforeach

            <!-- Pagination -->
            @if($posts->hasPages())
                <div style="text-align: center; margin-top: 30px;">
                    <div style="display: inline-block;">
                        @if ($posts->onFirstPage())
                            <span style="padding: 8px 16px; background: #e2e8f0; border-radius: 4px; margin-right: 5px;">← Previous</span>
                        @else
                            <a href="{{ $posts->previousPageUrl() }}" style="padding: 8px 16px; background: #3b82f6; color: white; border-radius: 4px; text-decoration: none; margin-right: 5px;">← Previous</a>
                        @endif

                        @foreach(range(1, $posts->lastPage()) as $page)
                            @if($page == $posts->currentPage())
                                <span style="padding: 8px 12px; background: #1d4ed8; color: white; border-radius: 4px; margin: 0 2px;">{{ $page }}</span>
                            @else
                                <a href="{{ $posts->url($page) }}" style="padding: 8px 12px; background: #93c5fd; color: white; border-radius: 4px; text-decoration: none; margin: 0 2px;">{{ $page }}</a>
                            @endif
                        @endforeach

                        @if ($posts->hasMorePages())
                            <a href="{{ $posts->nextPageUrl() }}" style="padding: 8px 16px; background: #3b82f6; color: white; border-radius: 4px; text-decoration: none; margin-left: 5px;">Next →</a>
                        @else
                            <span style="padding: 8px 16px; background: #e2e8f0; border-radius: 4px; margin-left: 5px;">Next →</span>
                        @endif
                    </div>
                </div>
            @endif
        @endif
    </main>

    <footer>
        <p>Copyright © Rival Anugrah 2025.</p>
    </footer>
</body>
</html>