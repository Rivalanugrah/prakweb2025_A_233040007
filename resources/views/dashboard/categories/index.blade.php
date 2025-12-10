<x-dashboard-layout>
    <x-slot:title>
        Manage Categories
    </x-slot:title>

    <h1 class="text-3xl font-bold mb-6">Manage Categories</h1>

    {{-- SUCCESS & ERROR ALERT --}}
    @if(session('success'))
        <div class="p-4 mb-4 text-green-700 bg-green-100 border border-green-300 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="p-4 mb-4 text-red-700 bg-red-100 border border-red-300 rounded-lg">
            {{ session('error') }}
        </div>
    @endif

    {{-- CREATE BUTTON --}}
    <div class="mb-4">
        <a href="{{ route('dashboard.categories.create') }}"
           class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700">
            + Add New Category
        </a>
    </div>

    {{-- CATEGORY TABLE --}}
    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="w-full text-left border-collapse">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 border-b">Name</th>
                    <th class="p-3 border-b">Slug</th>
                    <th class="p-3 border-b">Posts</th>
                    <th class="p-3 border-b w-48">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($categories as $category)
                    <tr class="border-b">
                        <td class="p-3">{{ $category->name }}</td>
                        <td class="p-3 text-gray-600">{{ $category->slug }}</td>
                        <td class="p-3">{{ $category->posts_count }}</td>

                        <td class="p-3 flex gap-2">
                            <a href="{{ route('dashboard.categories.edit', $category->id) }}"
                               class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                               Edit
                            </a>

                            <form action="{{ route('dashboard.categories.destroy', $category->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                @if($categories->count() == 0)
                    <tr>
                        <td colspan="4" class="p-4 text-center text-gray-500">
                            No categories found.
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $categories->links() }}
    </div>

</x-dashboard-layout>
