<x-dashboard-layout>
    <x-slot:title>
        Create Category
    </x-slot:title>

    <h1 class="text-3xl font-bold mb-6">Create Category</h1>

    <div class="bg-white p-6 rounded-lg shadow">
        <form action="{{ route('dashboard.categories.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="font-medium">Category Name *</label>
                <input type="text" name="name"
                       value="{{ old('name') }}"
                       class="w-full p-2 border rounded-lg">
                @error('name')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="font-medium">Description</label>
                <textarea name="description" rows="4"
                          class="w-full p-2 border rounded-lg">{{ old('description') }}</textarea>
            </div>

            <div class="flex gap-3">
                <button class="px-4 py-2 bg-blue-600 text-white rounded-lg">
                    Create
                </button>

                <a href="{{ route('dashboard.categories.index') }}"
                   class="px-4 py-2 border rounded-lg">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</x-dashboard-layout>
