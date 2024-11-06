@if ($post->child_post_id && (!$post->sharedPost || $post->sharedPost->deleted_at ||
            !(auth()->user()->followees->contains($post->sharedPost->user->id) ||
                auth()->user()->id == $post->sharedPost->user->id)))
    <div class="mb-2 relative w-auto text-normal font-normal border-2 p-3">
        <p>Content not Available</p>
    </div>
@elseif ($post->child_post_id)
    <a href="javascript:void(0);" onclick="showOnlyPost({{ $post->sharedPost->id }})">
        <div class="mb-2 relative w-auto text-xl border-2 p-3">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 border-2 border-white rounded-full overflow-hidden relative">
                    <img class="object-cover w-full h-full" src='{{ $post->sharedPost->user->profile->getImageURL() }}'
                        alt='Profile Picture'>
                </div>
                <div>
                    <span>{{ $post->sharedPost->user->username }}</span>
                    <span class="font-thin text-xs">{{ $post->sharedPost->created_at->diffForHumans() }}</span>
                </div>
            </div>
            <p>{{ $post->sharedPost->content }}</p>
            <div class="flex items-center gap-3 mt-2">
                <div class="w-50 h-50 border-2 border-white relative">
                    @foreach ($post->sharedPost->photos as $photo)
                                @php
                                    $cleanedPath = str_replace('public/', '', $photo->img_file);
                                @endphp
                                <img class="object-cover w-full h-full" src='{{ asset('/' . $cleanedPath) }}'
                                    alt='Shared Post Image'>
                    @endforeach
                </div>
            </div>
        </div>
    </a>
@endif
