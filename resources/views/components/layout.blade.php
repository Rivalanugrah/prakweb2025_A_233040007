<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Website' }}</title>
    <!-- Tambahkan Tailwind CSS jika menggunakan -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
    </style>
</head>
<body>
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

    <main style="max-width: 1200px; margin: 0 auto;">
        {{ $slot }}
    </main>

    <!-- Tambahkan jQuery jika perlu -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>