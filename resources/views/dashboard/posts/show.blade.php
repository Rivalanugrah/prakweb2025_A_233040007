<x-dashboard-layout>
    <x-slot:title>{{ $post->title }}</x-slot:title>

    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold mb-4">{{ $post->title }}</h1>

        <p class="text-gray-600 mb-3">
            Category: <strong>{{ $post->category->name }}</strong>
        </p>

        @if($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" class="rounded-lg mb-4">
        @endif

        <p class="text-lg leading-relaxed mb-6">{{ $post->body }}</p>

        <a href="{{ route('dashboard.posts.index') }}" class="px-4 py-2 bg-gray-200 rounded">
            Back to Posts
        </a>
    </div>
</x-dashboard-layout>
