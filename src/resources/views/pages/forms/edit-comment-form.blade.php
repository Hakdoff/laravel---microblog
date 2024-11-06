<form id="editForm{{ $comment->id }}" action="{{ route('posts.comments.edit', ['comment' => $comment->id]) }}"
    method="POST" class="hidden mt-1 mb-1 edit-form">
    @csrf
    @method('PUT')
    <input type="text" name="content" value="{{ $comment->content }}" class="border rounded w-full text-sm">
    <button type="submit" class="text-sm font-semibold mt-1">Save</button>
    <button type="button" class="text-sm font-semibold mt-1 ml-2"
        onclick="cancelEdit({{ $comment->id }})">Cancel</button>
</form>
