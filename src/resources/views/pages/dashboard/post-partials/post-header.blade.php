<div class="flex justify-between font-semibold py-2 text-xl">
    <div class="flex items-center gap-2 rounded-lg">
        <div class="w-16 h-16 border-2 border-white rounded-full overflow-hidden relative">
            <img class="object-cover w-full h-full" src='{{ $post->user->profile->getImageURL() }}'
                alt='Profile Picture'>
        </div>

        <div class="flex flex-col text-3xl">
            <span>
                <a href="{{ route('user.profile', ['id' => $post->user->id]) }}">{{ $post->user->username }}</a>
            </span>
            <span class="font-thin text-sm">
                {{ $post->created_at->diffForHumans() }}
            </span>
        </div>
    </div>

    <div class="flex justify-between font-semibold py-2">
        <div class="flex-col">
            @if ($post->user_id === auth()->id())
                <div id="mySidenav{{ $post->id }}" class="text-sm flex space-x-2 font-semibold cursor-pointer">
                    <span>
                        @include('pages.forms.delete-post-form')
                    </span>
                    <div>
                        <span class="text-sm flex items-center font-semibold underline cursor-pointer"
                            onclick="editPost({{ $post->id }})">
                            Edit
                        </span>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
