<x-dashboard-layout>
    <x-slot:title>Edit Post</x-slot:title>

    <div class="max-w-5xl mx-auto">

        <!-- HEADER -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Edit Post</h1>
            <p class="text-gray-500 mt-1">Update the post information below.</p>
        </div>

        <!-- CARD -->
        <div class="bg-white shadow-md rounded-xl p-8">

            @if ($errors->any())
                <div class="mb-6 bg-red-50 text-red-700 border border-red-200 p-4 rounded-lg">
                    <strong class="block mb-2">There are some problems:</strong>
                    <ul class="ml-6 list-disc space-y-1">
                        @foreach ($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('dashboard.posts.update', $post) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- TITLE -->
                <div>
                    <label class="block font-semibold text-gray-700 mb-2">Title *</label>
                    <input type="text"
                           name="title"
                           value="{{ old('title', $post->title) }}"
                           class="w-full p-3 border rounded-lg bg-gray-50 focus:ring focus:ring-blue-300"
                           required>
                </div>

                <!-- CATEGORY -->
                <div>
                    <label class="block font-semibold text-gray-700 mb-2">Category *</label>
                    <select name="category_id"
                            class="w-full p-3 border rounded-lg bg-gray-50 focus:ring focus:ring-blue-300"
                            required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                @selected(old('category_id', $post->category_id) == $category->id)>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- CURRENT IMAGE -->
                @if ($post->image)
                    <div>
                        <label class="block font-semibold text-gray-700 mb-2">Current Image:</label>
                        <img src="{{ asset('storage/' . $post->image) }}"
                             class="h-40 rounded-lg border mb-3">
                    </div>
                @endif

                <!-- NEW IMAGE -->
                <div>
                    <label class="block font-semibold text-gray-700 mb-2">Replace Image</label>
                    <input type="file"
                           name="image"
                           class="w-full p-3 border rounded-lg bg-gray-50 cursor-pointer">
                </div>

                <!-- EXCERPT -->
                <div>
                    <label class="block font-semibold text-gray-700 mb-2">Excerpt *</label>
                    <textarea name="excerpt" rows="3"
                              class="w-full p-3 border rounded-lg bg-gray-50 focus:ring focus:ring-blue-300"
                              required>{{ old('excerpt', $post->excerpt) }}</textarea>
                </div>

                <!-- BODY -->
                <div>
                    <label class="block font-semibold text-gray-700 mb-2">Content *</label>
                    <textarea name="body" rows="10"
                              class="w-full p-3 border rounded-lg bg-gray-50 focus:ring focus:ring-blue-300"
                              required>{{ old('body', $post->body) }}</textarea>
                </div>

                <!-- ACTION -->
                <div class="flex justify-end gap-3">

                    <a href="{{ route('dashboard.posts.index') }}"
                       class="px-5 py-2.5 border rounded-lg text-gray-700 hover:bg-gray-100 transition">
                        Cancel
                    </a>

                    <button type="submit"
                        class="px-5 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                        Update Post
                    </button>

                </div>

            </form>

        </div>
    </div>

</x-dashboard-layout>
