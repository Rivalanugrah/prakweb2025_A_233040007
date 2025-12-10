<x-dashboard-layout>
    <x-slot:title>Dashboard</x-slot:title>

    <h1 class="text-3xl font-bold mb-6">Welcome, {{ auth()->user()->name }}!</h1>

    <p style="color:#555; margin-bottom:20px;">
        Manage your posts and categories from this dashboard.
    </p>

    <!-- Example Summary Cards -->
    <div style="display: flex; gap: 20px; margin-bottom: 30px;">

        <div style="flex: 1; background:white; padding:20px; border-radius:8px;
                     box-shadow:0 2px 4px rgba(0,0,0,0.1);">
            <h3 style="margin:0; color:#555;">Total Posts</h3>
            <p style="font-size:28px; margin-top:10px;">
                {{ $totalPosts ?? 0 }}
            </p>
        </div>

        <div style="flex: 1; background:white; padding:20px; border-radius:8px;
                    box-shadow:0 2px 4px rgba(0,0,0,0.1);">
            <h3 style="margin:0; color:#555;">Total Categories</h3>
            <p style="font-size:28px; margin-top:10px;">
                {{ $totalCategories ?? 0 }}
            </p>
        </div>

    </div>

    <a href="{{ route('dashboard.posts.index') }}"
       style="display:inline-block; padding:12px 20px; background:#3b82f6;
              color:white; border-radius:6px; text-decoration:none;">
        Manage Posts →
    </a>

    <a href="{{ route('dashboard.categories.index') }}"
       style="display:inline-block; padding:12px 20px; background:#10b981;
              color:white; border-radius:6px; margin-left:10px;
              text-decoration:none;">
        Manage Categories →
    </a>

</x-dashboard-layout>
