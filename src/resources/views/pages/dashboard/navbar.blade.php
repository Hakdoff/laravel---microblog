<body>
    <header>
        <nav class="d-dashboard__navigation">
            <div class="d-dashboard__hidden-menu">
                <!-- burger menu shows when sm -->
                <input type="checkbox" id="toggle-menu" class="hidden" />
                <div for="toggle-menu" class="cursor-pointer">
                    @include('svg.burger')
                </div>
                <div class="menu bg-mygray fixed left-0 sm:flex hidden"
                    style="height: calc(100vh - 4rem); width: 12rem; top: 4rem;">
                    <ul class="">
                        <li>
                            <a href="#" aria-label="Go to Home page" class="d-dashboard__hidden-list">Home</a>
                        </li>
                        <li>
                            <a href="#" aria-label="Go to Profile page" class="d-dashboard__hidden-list">Profile</a>
                        </li>
                        <li>
                            <a href="#" aria-label="Go to Followers list" class="d-dashboard__hidden-list">Followers</a>
                        </li>
                        <li>
                            <a href="#" aria-label="Go to Settings page" class="d-dashboard__hidden-list">Settings</a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}" aria-label="Logouts current user"
                                class="d-dashboard__hidden-list">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="d-dashboard__logo-lg gap-3">
                @include('svg.logo')<a href="{{ route('dashboard', ['id' => auth()->id()]) }}">Microblog
                    Ojt2</a>
            </div>
            <div class="d-dashboard__logo-sm">
                @include('svg.logo')
            </div>
            <div class="d-dashboard__search">
                <form action="{{ route('users.search', ['id' => auth()->id()]) }}" method="GET" class="w-full p-0 m-0">
                    <div class="relative flex justify-center items-center w-10/12 mx-auto">
                        <input type="text" name="query" placeholder="Search" id="small-input"
                            class="d-dashboard__search-bar">
                        <button type="submit" class="d-dashboard__search-btn">
                            @include('svg.search')
                        </button>
                    </div>
                </form>
            </div>
            <div class="d-dashboard__username">
                <div class="flex items-center gap-3 mb-2 rounded-lg">
                    <div class="flex justify-center items-center w-10 h-10 cursor-pointer">
                        @include('pages.dashboard.notification')
                    </div>
                    <a href="{{ route('user.profile', ['id' => auth()->id()]) }}" class="flex items-center">
                        <div class="w-10 h-10 rounded-full overflow-hidden relative">
                            <img class="object-cover w-full h-full" src='{{ auth()->user()->profile->getImageURL() }}'
                                alt='Profile Picture'>
                        </div>
                        <span class="ml-3 hidden sm:inline">{{ auth()->user()->username }}</span>
                    </a>
                </div>
            </div>
            <div class="hidden sm:flex"></div>
        </nav>
    </header>
</body>
