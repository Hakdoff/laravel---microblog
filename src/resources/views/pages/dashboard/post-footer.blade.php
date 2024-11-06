<div class=" pt-1 flex justify-start items-start gap-1 text-xs font-light">
    <div class="group inline-block relative">
    <span id="likes-count-{{ $post->id }}" class="likes-count hoverable">
            {{ $post->likes->count() }} likes
        </span>
        <div id="like-users-{{ $post->id }}" class="hidden text-white z-50 group-hover:block absolute bg-gray-800 border border-gray-800 text-sm py-2 px-4 rounded shadow-md">
            @foreach ($post->likes->take(10) as $like)
                {{ $like->user->username }}
            @endforeach
            @if ($post->likes->count() > 10)
                <div>and {{ $post->likes->count() - 10 }} more...</div>
            @endif
        </div>
    </div>
    {{ $post->comments()->count() }} comments
    {{ $post->numberOfShares()->count() }} shares
</div>
<div class="py-1">
    <div class="flex justify-evenly m-0 relative border-t border-b border-gray-400 py-2">
        @include('pages.dashboard.like-button')

        <span href="" class="d-dashboard__like-comm cursor-pointer" onclick="openComment({{ $post->id }})">
            <span class="flex justify-center items-center gap-2 text-sm">
                @include('svg.comment')
                Comment
            </span>
        </span>

        <a href="{{ url('postDetails', $post->id) }}" class="d-dashboard__like-comm cursor-pointer">
            <span class="flex justify-center items-center gap-2 text-sm">
                @include('svg.share')
                Share
            </span>
        </a>
    </div>

    <div class="bg-whisperwhite">
        <ul class="rounded-lg max-h-40 overflow-y-scroll scrollbar-hidden">
            @foreach ($post->comments->reverse() as $comment)
                        <div class="flex flex-col border-t border-b border-gray-400">
                            <div class="relative flex px-2 pt-1 gap-2 items-start">
                                <div class="w-8 h-8 border-2 border-white rounded-full overflow-hidden flex-shrink-0">
                                    <img class="object-cover w-full h-full" src="{{ $comment->user->profile->getImageURL() }}"
                                        alt="Profile Picture">
                                </div>
                                <div class="flex flex-col w-full">
                                    <div class="flex items-center gap-1">
                                        <li class="font-semibold flex items-center">
                                            <span class="text-sm font-semibold">{{ $comment->user->username }}</span>
                                            @if ($post->user_id === $comment->user_id)
                                                <span class="font-thin text-xs ml-1">(Author)</span>
                                            @endif
                                        </li>
                                    </div>
                                    <li class="text-sm comment-content">{{ $comment->content }}</li>
                                    <div class="flex items-center gap-2 text-sm font-thin comment-actions">
                                    <span class="comment-time">{{ $comment->formatted_time }}</span>
                                        @if ($comment->user_id == auth()->id() || $post->user_id == auth()->id())
                                            @include('pages.forms.delete-comment-form')
                                            @if ($comment->user_id == auth()->id())
                                                <span class="text-sm font-semibold ml-1 cursor-pointer comment-edit-link"
                                                    onclick="editComment({{ $comment->id }})">
                                                    Edit
                                                </span>
                                            @endif
                                        @endif
                                    </div>
                                    @include('pages.forms.edit-comment-form')
                                </div>
                            </div>
                        </div>
            @endforeach
        </ul>
    </div>
    <div id="comment{{ $post->id }}"
        class="d-dashboard__border-gray mb-2 flex p-2 items-center w-full hidden transition-all duration-300">
        <div class="flex flex-col h-max-64 w-full">
            <div>
                @include('pages.forms.add-comment-form')
            </div>
        </div>
    </div>
