<div class="d-dashboard__post-container mb-10">
    @if (auth()->user()->followees->contains($user->id) || auth()->user()->id == $user->id)
        <p class="pb-1">Photos</p>
        <hr class="border-gray-400 mb-1">
        <div class="flex flex-wrap">
            @forelse ($user->photos as $photo)
                @php
                    $cleanedPath = str_replace('public/', '', $photo->img_file);
                @endphp
                <div class="m-2">
                    <img src="{{ asset('/' . $cleanedPath) }}" alt="Post Image"
                        class="cursor-pointer rounded-lg w-44 h-44 object-cover">
                </div>
            @empty
                <p class="pb-1 w-full flex justify-center">No uploads</p>
            @endforelse
        </div>

    @else
        <p class="flex justify-center items-center pb-1">Photos are hidden</p>
    @endif
</div>
