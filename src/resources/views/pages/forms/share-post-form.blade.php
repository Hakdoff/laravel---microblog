<form id="postContent" action="{{ route('share.post', ['id' => $post->id]) }}" method="POST" enctype="multipart/form-data" class="mb-0">
    @csrf
    <div class="d-dashboard__create-post">
        <label for="large-input" class="text-lg font-semibold">Share this post</label>
        @if ($errors->has('content'))
            <div class="text-[14px] text-rose-600">
                Post cannot exceed more than 140 characters
            </div>
        @endif
        <div class="mt-2">
            <textarea id="auto-resize-textarea" class="d-dashboard__write-post mb-3" name='content'></textarea>
            <div id="image-preview-container" class="flex justify-center hidden"></div>
        </div>
        <input type="hidden" name="post_id" id="sharePostId">
        <div class="flex justify-end">
            <button id="shareButton" class="d-dashboard__post-btn">Share</button>
        </div>
    </div>
</form>
