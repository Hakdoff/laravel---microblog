@foreach ($posts as $post)
    <div id="container-{{ $post->id }}" class="d-dashboard__post-container relative">

        @include('pages.dashboard.post-partials.post-header')

        <a href="javascript:void(0);" onclick="showOnlyPost({{ $post->id }})">
            <div class="mb-2 relative w-full text-xl post-content break-words">{{ $post->content }}</div>
        </a>

        @include('pages.forms.edit-post-form')

        @include('pages.dashboard.post-partials.shared-post')

        @include('pages.dashboard.post-partials.post-image')

        @include('pages.dashboard.post-footer')
    </div>
    </div>
@endforeach

<div id="postModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <div id="modalPostContent"></div>
    </div>
</div>

<div id="postModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <div id="modalPostContent"></div>
    </div>
</div>

<div class="my-4">
    {{ $posts->links('vendor.pagination.tailwind') }}
</div>
