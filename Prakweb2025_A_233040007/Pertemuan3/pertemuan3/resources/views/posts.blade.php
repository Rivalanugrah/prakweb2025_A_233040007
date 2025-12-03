<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Posts</title>
</head>
<body>

    <nav style="display:flex; gap:20px; margin-bottom:20px;">
        <a href="/">Home</a>
        <a href="/about">About</a>
        <a href="/posts">Posts</a>
        <a href="/categories">Categories</a>
        <a href="/users">User</a>
    </nav>


    <h1>Daftar Semua Posts</h1>

    @if ($posts->isEmpty())
        <p>Tidak ada post ditemukan.</p>
    @else
        @foreach ($posts as $post)
            <article style="margin-bottom: 20px;">
                <h2>{{ $post->title }}</h2>

                <p>
                    <strong>Author:</strong> {{ $post->author->name }}
                    |
                    <strong>Category:</strong> {{ $post->category->name }}
                </p>

                <p>{{ $post->excerpt }}</p>

                <small>Dibuat pada: {{ $post->created_at->format('d M Y H:i') }}</small>
            </article>
            <hr>
        @endforeach
    @endif

    <footer style="margin-top: 50px; text-align: center; padding: 20px; background: #f0f0f0;">
    <p>Copyright ©Rival Anugrah 2025.</p>
</footer>


</body>
</html>
