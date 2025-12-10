<td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
    <a href="{{ route('dashboard.show', $post) }}" 
       class="text-blue-600 hover:text-blue-900 mr-3">View</a>
    <a href="{{ route('dashboard.edit', $post) }}" 
       class="text-green-600 hover:text-green-900 mr-3">Edit</a>
    <form action="{{ route('dashboard.destroy', $post) }}" 
          method="POST" 
          class="inline"
          onsubmit="return confirm('Are you sure you want to delete this post?')">
        @csrf
        @method('DELETE')
        <button type="submit" 
                class="text-red-600 hover:text-red-900">
            Delete
        </button>
    </form>
</td>