@extends('pages.layouts.app')

@section('title', 'Search')

@section('content')

<body>
    <div class="d-dashboard">
        @include('pages.dashboard.navbar')
        <div class="d-dashboard__main">
            <div class="d-dashboard__space"></div>
                @include('pages.profile.profile-info')
                    <main class="d-dashboard__post-content">
                        @include('pages.dashboard.search-result-page')
                    </main>
                @include('pages.dashboard.aside')
            <div class="d-dashboard__space"></div>
        </div>
    </div>
</body>

@endsection
