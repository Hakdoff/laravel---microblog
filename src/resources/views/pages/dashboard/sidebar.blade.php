@section('content')

<body>
    <aside class="d-dashboard__sidebar sticky top-20">
            <ul class="d-dashboard__side-nav">
                <li class="d-dashboard__side-list"><a href="#" aria-label="Go to Home page">Home</a></li>
                <li class="d-dashboard__side-list"><a href="#" aria-label="Go to Profile page">Profile</a></li>
                <li class="d-dashboard__side-list"><a href="#" aria-label="Go to Friends page">Friends</a></li>
                <li class="d-dashboard__side-list"><a href="#" aria-label="Go to Settings page">Settings</a></li>
                <hr class="border border-gray-600 mt-2 mb-2 shadow:md w-full">
                <li class="d-dashboard__side-list"><a href="{{ route('logout')}}" aria-label="Logout Account" class="transition-transform hover:scale-150 hover:text-red-900">Logout</a></li>
            </ul>
    </aside>
</body>
