<x-dashboard-layout>
    <x-slot:title>
        Manage Posts
    </x-slot:title>

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Manage Posts</h1>

        <a href="{{ route('dashboard.posts.create') }}"
            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
            + New Post
        </a>
    </div>

    {{-- SUCCESS MESSAGE --}}
    @if (session('success'))
        <div class="mb-4 p-3 bg-green-100 border border-green-300 text-green-800 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-lg shadow p-6">
        @if ($posts->count())
            <table class="w-full border-collapse">
                <thead>
                    <tr class="border-b bg-gray-50 text-left">
                        <th class="py-3 px-4 font-semibold text-gray-700">Title</th>
                        <th class="py-3 px-4 font-semibold text-gray-700">Category</th>
                        <th class="py-3 px-4 font-semibold text-gray-700">Created</th>
                        <th class="py-3 px-4 font-semibold text-gray-700 text-right">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($posts as $post)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-3 px-4">
                                <a href="{{ route('dashboard.posts.show', $post) }}"
                                   class="font-medium text-blue-600 hover:underline">
                                    {{ $post->title }}
                                </a>
                            </td>

                            <td class="py-3 px-4">
                                <span class="px-2 py-1 bg-blue-100 text-blue-700 text-sm rounded-lg">
                                    {{ $post->category->name }}
                                </span>
                            </td>

                            <td class="py-3 px-4 text-gray-600">
                                {{ $post->created_at->diffForHumans() }}
                            </td>

                            <td class="py-3 px-4 text-right flex justify-end gap-2">

                                <a href="{{ route('dashboard.posts.edit', $post) }}"
                                   class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                                    Edit
                                </a>

                                <form action="{{ route('dashboard.posts.destroy', $post) }}"
                                      method="POST"
                                      onsubmit="return confirm('Delete this post?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">
                                        Delete
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-4">
                {{ $posts->links() }}
            </div>
        @else
            <p class="text-center text-gray-600">No posts found.</p>
        @endif
    </div>
</x-dashboard-layout>
