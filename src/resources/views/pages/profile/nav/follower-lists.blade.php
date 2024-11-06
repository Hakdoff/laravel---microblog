<div class="d-dashboard__post-container mb-10 pb-3">
    @if (auth()->user()->followees->contains($user->id) || auth()->user()->id == $user->id)
        <p class="pb-1">Followers</p>
        <hr class="border-gray-400 mb-1">
        @foreach($user->followers as $follower)
            <a href="{{ route('user.profile', ['id' => $follower->id]) }}">
                <div class="flex gap-2 items-center hover:bg-gray-300 p-2">
                    <img class="object-cover w-14 h-14 border-2 border-white rounded-full"
                        src='{{ $follower->profile->getImageURL() }}' alt='Profile Picture'>
                    <div class="flex flex-col">
                        <div>
                            {{ $follower->username }}
                        </div>
                        <div class="font-light text-sm">
                            {{ $follower->profile->address }}
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    @else
        <p class="flex justify-center items-center pb-1">Followers are hidden</p>
    @endif
</div>
