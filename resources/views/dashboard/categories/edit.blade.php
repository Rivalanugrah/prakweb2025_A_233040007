<x-dashboard-layout>
    <x-slot:title>
        Edit Category
    </x-slot:title>

    <h1 class="text-3xl font-bold mb-6">Edit Category</h1>

    <div class="bg-white p-6 rounded-lg shadow">
        <form action="{{ route('dashboard.categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="font-medium">Category Name *</label>
                <input type="text" name="name"
                       value="{{ old('name', $category->name) }}"
                       class="w-full p-2 border rounded-lg">
                @error('name')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="font-medium">Description</label>
                <textarea name="description" rows="4"
                          class="w-full p-2 border rounded-lg">{{ old('description', $category->description) }}</textarea>
            </div>

            <div class="flex gap-3">
                <button class="px-4 py-2 bg-blue-600 text-white rounded-lg">
                    Update
                </button>

                <a href="{{ route('dashboard.categories.index') }}"
                   class="px-4 py-2 border rounded-lg">
                    Cancel
                </a>
            </div>

        </form>
    </div>
</x-dashboard-layout>
