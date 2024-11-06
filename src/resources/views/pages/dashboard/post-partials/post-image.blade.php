@if ($post->photos->count() > 0)
    <div class="d-dashboard__image">
        @foreach ($post->photos as $photo)
            @php
                $cleanedPath = str_replace('public/', '', $photo->img_file);
            @endphp
            <a href="javascript:void(0);" onclick="showOnlyPost({{ $post->id }})">
                <img src="{{ asset('/' . $cleanedPath) }}" alt="Post Image"
                    class="cursor-pointer w-full h-full rounded-lg">
            </a>
        @endforeach
    </div>
@endif
