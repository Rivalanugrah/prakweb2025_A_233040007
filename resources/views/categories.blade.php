<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Categories' }}</title>
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
        .categories-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }
        .category-card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.15);
        }
        .category-name {
            font-size: 24px;
            font-weight: bold;
            color: #2d3748;
            margin-bottom: 10px;
        }
        .post-count {
            color: #718096;
            font-size: 14px;
            margin-bottom: 15px;
        }
        .view-posts-btn {
            display: inline-block;
            background: #3b82f6;
            color: white;
            padding: 8px 16px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: bold;
            transition: background 0.3s;
        }
        .view-posts-btn:hover {
            background: #2563eb;
        }
        .empty-state {
            text-align: center;
            padding: 50px;
            background: white;
            border-radius: 8px;
            color: #666;
        }
        footer {
            margin-top: 50px;
            text-align: center;
            padding: 20px;
            background: #f0f0f0;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar Sama dengan Posts -->
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
                <span class="user-info">Welcome, {{ auth()->user()->name }}</span>
                <a href="/dashboard">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}" style="margin:0;">
                    @csrf
                    <button type="submit" class="logout-btn">Logout</button>
                </form>
            @else
                <div class="auth-buttons" style="display:flex; gap:10px;">
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}">Register</a>
                </div>
            @endauth
        </div>
    </nav>

    <main>
        <h1>Daftar Semua Categories</h1>

        @if ($categories->isEmpty())
            <div class="empty-state">
                <p>Tidak ada category ditemukan.</p>
            </div>
        @else
            <div class="categories-grid">
                @foreach ($categories as $category)
                    <div class="category-card">
                        <div class="category-name">
                            {{ $category->name }}
                        </div>
                        
                        <div class="post-count">
                            {{ $category->posts_count }} posts
                        </div>
                        
                        <p style="color: #4a5568; margin-bottom: 15px; line-height: 1.5;">
                            {{ $category->description ?? 'No description available.' }}
                        </p>
                        
                        <a href="/categories/{{ $category->slug }}" class="view-posts-btn">
                            View Posts →
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </main>

    <footer>
        <p>Copyright © Rival Anugrah 2025.</p>
    </footer>
</body>
</html>