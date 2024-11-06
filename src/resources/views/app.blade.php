@extends('pages.layouts.app')

@section('content')

@auth
    @if (auth()->user()->status == 1)
        <div class="dashboard">
            @include('pages.auth.dummy-dashboard')
        </div>
    @else
        <div class="verify-wait">
            @include('pages.auth.dummy-verify-wait')
        </div>
    @endif

@else
<div class="login">
    @include('pages.auth.login')
</div>
@endauth

@endsection
