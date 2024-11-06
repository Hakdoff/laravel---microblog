@auth
    @php
        $isLiked = auth()->user()->likes->where('post_id', $post->id)->isNotEmpty();
    @endphp

    <button id="like-button-{{ $post->id }}" class="d-dashboard__like-comm like-button"
        data-liked="{{ $isLiked ? 'true' : 'false' }}"
        onclick="toggleLike({{ $post->id }})">
        <span class="flex justify-center items-center gap-2 text-sm">
            @include('svg.like')
            <span class="like-text">{{ $isLiked ? 'Unlike' : 'Like' }}</span>
        </span>
    </button>
@endauth
<script src="{{ asset('js/like-ajax.js') }}"></script>
