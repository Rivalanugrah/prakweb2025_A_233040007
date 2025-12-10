<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Dashboard' }}</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #f5f5f5;
            padding: 20px;
        }

        /* NAVBAR – sama seperti /posts */
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

        .logout-btn {
            background: #ef4444;
            color: white;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
            border: none;
        }
        .logout-btn:hover {
            background: #dc2626;
        }

        /* MAIN CONTAINER */
        main {
            max-width: 1200px;
            margin: 0 auto;
        }

        .content-card {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }
    </style>
</head>

<body>

    <!-- NAVBAR /posts -->
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
                <span style="color:#555;">Welcome, {{ auth()->user()->name }}</span>
                <a href="/dashboard">Dashboard</a>

                <form action="{{ route('logout') }}" method="POST" style="margin:0;">
                    @csrf
                    <button type="submit" class="logout-btn">Logout</button>
                </form>

            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth
        </div>
    </nav>

    <!-- MAIN CONTENT WRAPPED IN CARD -->
    <main>
        <div class="content-card">
            {{ $slot }}
        </div>
    </main>

    <footer style="text-align:center; margin-top:30px; color:#777;">
        <p>© Rival Anugrah 2025</p>
    </footer>

</body>
</html>
