<x-dashboard-layout>
    <x-slot:title>Create Post</x-slot:title>

    <div class="max-w-5xl mx-auto">

        <!-- HEADER -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Create New Post</h1>
            <p class="text-gray-500 mt-1">Fill the fields below to publish a new post.</p>
        </div>

        <!-- CARD -->
        <div class="bg-white shadow-md rounded-xl p-8">

            {{-- ERROR ALERT --}}
            @if ($errors->any())
                <div class="mb-6 bg-red-50 text-red-700 border border-red-200 p-4 rounded-lg">
                    <strong class="block mb-2">Please fix the following errors:</strong>
                    <ul class="list-disc ml-6 space-y-1">
                        @foreach ($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('dashboard.posts.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- TITLE -->
                <div>
                    <label class="block font-semibold text-gray-700 mb-2">Title *</label>
                    <input type="text"
                           name="title"
                           value="{{ old('title') }}"
                           class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-300 bg-gray-50"
                           placeholder="Write your post title..."
                           required>
                </div>

                <!-- CATEGORY -->
                <div>
                    <label class="block font-semibold text-gray-700 mb-2">Category *</label>
                    <select name="category_id"
                            class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-300 bg-gray-50"
                            required>
                        <option value="">— Choose Category —</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- EXCERPT -->
                <div>
                    <label class="block font-semibold text-gray-700 mb-2">Excerpt *</label>
                    <textarea name="excerpt"
                              rows="3"
                              class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-300 bg-gray-50"
                              placeholder="Short summary of your post..."
                              required>{{ old('excerpt') }}</textarea>
                </div>

                <!-- IMAGE -->
                <div>
                    <label class="block font-semibold text-gray-700 mb-2">Featured Image</label>
                    <input type="file"
                           name="image"
                           class="w-full p-3 border rounded-lg bg-gray-50 cursor-pointer">
                    <p class="text-gray-500 mt-1 text-sm">Max 2 MB — JPG, PNG</p>
                </div>

                <!-- BODY -->
                <div>
                    <label class="block font-semibold text-gray-700 mb-2">Content *</label>
                    <textarea name="body"
                              rows="10"
                              class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-300 bg-gray-50"
                              placeholder="Write your full post content here..."
                              required>{{ old('body') }}</textarea>
                </div>

                <!-- ACTION BUTTONS -->
                <div class="flex justify-end gap-3 pt-4">

                    <a href="{{ route('dashboard.posts.index') }}"
                       class="px-5 py-2.5 border rounded-lg text-gray-700 hover:bg-gray-100 transition">
                        Cancel
                    </a>

                    <button type="submit"
                        class="px-5 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                        Publish Post
                    </button>

                </div>

            </form>

        </div>
    </div>
</x-dashboard-layout>
