@switch(true)
    @case(!isset($x) || $x == 1)
        @if (auth()->user()->id == $user->id)
            @include('pages.dashboard.post')
        @endif
        @if (auth()->user()->followees->contains($user->id) || auth()->user()->id == $user->id)
            @include('pages.dashboard.post-content')
        @else  
            @include('pages.dashboard.post-hidden')
        @endif
        @break

    @case($x == 2)
        @include('pages.profile.nav.follower-lists')
        @break

    @case($x == 3)
        @include('pages.profile.nav.following-lists')
        @break

    @case($x == 4)
        @include('pages.profile.nav.photos')
        @break

    @case($x == 5)
        @include('pages.profile.nav.about')
        @break
@endswitch
