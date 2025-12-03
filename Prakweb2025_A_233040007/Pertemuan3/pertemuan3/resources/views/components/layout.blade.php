<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Website' }}</title>
</head>
<body>
    <nav style="display:flex; gap:20px; margin-bottom:20px;">
    <a href="/">Home</a>
    <a href="/about">About</a>
    <a href="/posts">Posts</a>
    <a href="/categories">Categories</a>
    <a href="/users">User</a>
</nav>


    {{ $slot }}
</body>
</html>
