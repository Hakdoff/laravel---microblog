<div class="d-dashboard__create-post">
    <p class="mb-2 font-semibold">Search results for: {{ request('query') }}</p>
    @if($results->isNotEmpty())
        @foreach($results as $result)
            <a href="{{ route('user.profile', ['id' => $result->id]) }}">
                <div class="flex gap-2 items-center hover:bg-gray-300 p-2">
                    <img class="object-cover w-14 h-14 border-2 border-white rounded-full"
                        src='{{ $result->profile->getImageURL() }}' alt='Profile Picture'>
                    <div class="flex flex-col">
                        <div>
                            {{ $result->username }}
                        </div>
                        <div class="font-light text-sm">
                            {{ $result->profile->address }}
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    @else
        <div>No "{{ request('query') }}" found.</div>
    @endif
</div>
</body>
