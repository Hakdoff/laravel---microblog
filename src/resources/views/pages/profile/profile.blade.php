@extends('pages.layouts.app')

@section('title', 'Dashboard')

@section('content')

<body>
    <div class="d-dashboard">
        @include('pages.dashboard.navbar')
        <div class="d-dashboard__main">
            <div class="d-dashboard__space"></div>
            @include('pages.profile.profile-info')
            <main class="d-dashboard__post-content">
                @include('pages.popup.message')
                @include('pages.profile.profile-header')
                @include('pages.profile.content')
            </main>
            @include('pages.dashboard.aside')
            <div class="d-dashboard__space"></div>
        </div>
    </div>
</body>

@endsection('content')
