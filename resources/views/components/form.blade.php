@props(['categories', 'post' => null])

{{-- Form Body --}}
<form action="{{ $post ? route('dashboard.update', $post->id) : route('dashboard.store') }}" 
      method="POST" 
      enctype="multipart/form-data">
    @csrf
    @if($post)
        @method('PUT')
    @endif
    
    <div class="grid gap-4 md:grid-cols-2">
        {{-- Title --}}
        <div class="md:col-span-2">
            <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Title *</label>
            <input type="text" name="title" id="title" 
                   value="{{ old('title', $post->title ?? '') }}" 
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
                   placeholder="Enter post title" required>
            @error('title')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Category --}}
        <div class="md:col-span-1">
            <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900">Category *</label>
            <select name="category_id" id="category_id" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                <option value="">Select category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" 
                        {{ old('category_id', $post->category_id ?? '') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Image Upload --}}
        <div class="md:col-span-1">
            <label class="block mb-2 text-sm font-medium text-gray-900">
                Featured Image (Optional)
            </label>
            <div class="flex items-center justify-center w-full">
                <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6" id="upload-placeholder">
                        <svg class="w-8 h-8 mb-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                        </svg>
                        <p class="mb-2 text-sm text-gray-500">
                            <span class="font-semibold">Click to upload</span>
                        </p>
                        <p class="text-xs text-gray-500">PNG, JPG, JPEG (MAX. 2MB)</p>
                    </div>
                    <input id="dropzone-file" type="file" name="image" class="hidden" accept="image/*" />
                </label>
            </div>
            
            @if($post && $post->image)
                <div class="mt-3">
                    <p class="text-sm text-gray-600 mb-1">Current image:</p>
                    <div class="flex items-center space-x-3">
                        <img src="{{ asset('storage/' . $post->image) }}" 
                             alt="{{ $post->title }}" 
                             class="w-16 h-16 object-cover rounded border">
                        <div>
                            <p class="text-sm font-medium text-gray-900">{{ basename($post->image) }}</p>
                            <button type="button" onclick="removeImage()" class="text-sm text-red-600 hover:text-red-800">
                                Remove image
                            </button>
                            <input type="hidden" name="remove_image" id="remove-image" value="0">
                        </div>
                    </div>
                </div>
            @endif
            
            @error('image')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Excerpt --}}
        <div class="md:col-span-2">
            <label for="excerpt" class="block mb-2 text-sm font-medium text-gray-900">Excerpt (Summary)</label>
            <textarea name="excerpt" id="excerpt" rows="3" 
                      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
                      placeholder="Write a short excerpt or summary">{{ old('excerpt', $post->excerpt ?? '') }}</textarea>
            @error('excerpt')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Body --}}
        <div class="md:col-span-2">
            <label for="body" class="block mb-2 text-sm font-medium text-gray-900">Content *</label>
            <textarea name="body" id="body" rows="8" 
                      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
                      placeholder="Write your post content here" required>{{ old('body', $post->body ?? '') }}</textarea>
            @error('body')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Form Footer --}}
        <div class="md:col-span-2 flex items-center space-x-4 border-t border-gray-200 pt-4 mt-4">
            <button type="submit" 
                    class="px-5 py-2.5 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 focus:outline-none">
                @if($post)
                    <i class="fas fa-save mr-2"></i> Update Post
                @else
                    <i class="fas fa-plus mr-2"></i> Create Post
                @endif
            </button>
            <a href="{{ route('dashboard.index') }}" 
               class="px-5 py-2.5 text-sm font-medium text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-200">
                Cancel
            </a>
        </div>
    </div>
</form>

<script>
    // Preview image on upload
    document.getElementById('dropzone-file').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            // Check file size (2MB max)
            if (file.size > 2 * 1024 * 1024) {
                alert('File size should be less than 2MB');
                this.value = '';
                return;
            }
            
            const reader = new FileReader();
            reader.onload = function(e) {
                const placeholder = document.getElementById('upload-placeholder');
                placeholder.innerHTML = `
                    <div class="text-center">
                        <img src="${e.target.result}" class="w-20 h-20 mx-auto object-cover rounded mb-2">
                        <p class="text-sm text-gray-600 truncate">${file.name}</p>
                        <p class="text-xs text-gray-500">${(file.size / 1024 / 1024).toFixed(2)} MB</p>
                    </div>
                `;
            }
            reader.readAsDataURL(file);
        }
    });
    
    // Function to remove image (for edit form)
    function removeImage() {
        document.getElementById('remove-image').value = '1';
        document.querySelector('[for="dropzone-file"]').style.display = 'block';
        document.querySelector('.mt-3').style.display = 'none';
    }
    
    // Show file name when selected
    document.getElementById('dropzone-file').addEventListener('change', function() {
        if (this.files.length > 0) {
            const fileName = this.files[0].name;
            console.log('Selected file:', fileName);
        }
    });
</script>