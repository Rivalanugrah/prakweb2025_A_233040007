<!DOCTYPE html>
<html>
<head>
    <title>Categories</title>
</head>
<body>

    <nav style="display:flex; gap:20px; margin-bottom:20px;">
    <a href="/">Home</a>
    <a href="/about">About</a>
    <a href="/posts">Posts</a>
    <a href="/categories">Categories</a>
    <a href="/users">User</a>
</nav>

    <h1>Daftar Category</h1>

    <ul>
        @foreach ($categories as $category)
            <li>{{ $category->name }} ({{ $category->slug }})</li>
        @endforeach
    </ul>

</body>
</html>
