<form id="editPostForm{{ $post->id }}" action="{{ route('edit.post', ['post' => $post->id]) }}" method="POST"
    class="hidden mt-1 mb-1 edit-form">
    @csrf
    @method('PUT')
    <input type="text" name="content" value="{{ $post->content }}" class="border rounded w-full h-14 text-lg">
    <button type="submit" class="text-sm font-semibold mt-1">Save</button>
    <button type="button" class="text-sm font-semibold mt-1 ml-2"
        onclick="cancelEditPost({{ $post->id }})">Cancel</button>
</form>
