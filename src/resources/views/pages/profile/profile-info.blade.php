<body>
    <aside class="p-profile__aside">
        <ul class="d-dashboard__side-nav">
            <div class="flex flex-col items-center w-full">
                <div class="w-20 h-20 border-2 border-white rounded-full overflow-hidden relative">
                    <img class="object-cover w-full h-full" src='{{ auth()->user()->profile->getImageURL() }}'
                        alt='Profile Picture'>
                </div>
                <div class="flex flex-col justify-center pl-2 items-center">
                    <div class="text-sm text-xl font-bold">
                        {{ auth()->user()->profile->first_name }}
                        {{ auth()->user()->profile->middle_name ? auth()->user()->profile->middle_name[0] . '.' : '' }}
                        {{ auth()->user()->profile->last_name }}
                    </div>
                    <div class="text-sm font-normal">
                        {{ auth()->user()->email }}
                    </div>
                </div>
            </div>
            <hr class="border border-gray-600 mt-2 mb-2 shadow:md w-full">

            <li>
                <div class="p-profile__icons d-dashboard__side-list">
                    <div class="col-span-2">
                        @include('svg.home')
                    </div>
                    <div class="col-span-2 text-lg ">
                        <a href="{{ route('dashboard', ['id' => auth()->id()]) }}" aria-label="Go to Home page">
                            Home
                        </a>
                    </div>
                </div>
            </li>

            <li>
                <div class="p-profile__icons d-dashboard__side-list">
                    <div class="col-span-2">
                        @include('svg.profile')
                    </div>
                    <div class="col-span-2 text-lg ">
                        <a href="{{ route('user.profile', ['id' => auth()->id()]) }}" aria-label="Go to Profile page">
                            Profile
                        </a>
                    </div>
                </div>
            </li>

            <li>
                <div class="p-profile__icons d-dashboard__side-list">
                    <div class="col-span-2">
                        @include('svg.friends')
                    </div>
                    <div class="col-span-2 text-lg">
                        <a href="{{ route('followers', ['id' => $user->id, 'x' => 2]) }}" aria-label="Go to Friends page">
                            Followers
                        </a>
                    </div>
                </div>
            </li>

            <li>
                <div class="p-profile__icons d-dashboard__side-list">
                    <div class="col-span-2">
                        @include('svg.settings')
                    </div>
                    <div class="col-span-2 text-lg "><a href="#"
                            aria-label="Go to Settings page">Settings</a>
                    </div>
                </div>
            </li>

            <hr class="border border-gray-600 mt-2 mb-2 shadow:md w-full">

            <li>
                <div class="p-profile__icons d-dashboard__side-list">
                    <div class="col-span-2">
                        @include('svg.logout')
                    </div>
                    <div class="p-profile__logout"><a href="{{ route('logout') }}"
                            aria-label="Logout Account">Logout</a>
                    </div>
                </div>
            </li>
        </ul>
    </aside>
</body>
