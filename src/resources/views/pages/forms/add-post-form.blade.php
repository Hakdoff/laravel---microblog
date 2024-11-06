<!-- Add Post Form -->
<form id="postContent" action="{{ route('post') }}" method="POST" enctype="multipart/form-data" class="mb-0">
    @csrf
    <div class="d-dashboard__create-post">

        <label for="large-input" class="text-lg font-semibold">Share your mind with us</label>

        @if ($errors->has('content'))
            <div class="text-[14px] text-rose-600">Post cannot exceed more the 140 characters </div>
        @endif

        <div class="mt-2">
            <textarea id="auto-resize-textarea" class="d-dashboard__write-post mb-3" name='content'></textarea>
            <div id="image-preview-container" class="flex justify-center hidden"></div>
        </div>

        <div id="text-counter" class="text-sm ml-1 hidden">
            0/140
        </div>

        <div class="d-dashboard__imageicon">
            <input type="file" id="image-upload" name="images[]" multiple accept="image/*" style="display: none;">
            @include('svg.image-upload') 
            <button id="shareButton" class="d-dashboard__post-btn">Post</button>
        </div>

        <script src="{{ asset('js/text-counter.js') }}"></script>
</form>
