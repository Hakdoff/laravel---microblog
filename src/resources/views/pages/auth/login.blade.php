@extends('pages.layouts.app')

@section('title', 'Login')

@section('content')

<div class="flex w-full min-h-screen relative overflow-y-auto">
    <!-- svg -->
    @include('svg.logo2')

    <!-- login -->
    @include('pages.auth.login-reg.login-part')

    <!-- illusion -->

    <!-- signup -->
    @include('pages.auth.login-reg.signup-part')

    <!-- slider -->
    @include('pages.auth.login-reg.slider')

</div>

<script src="{{ asset('js/loginReg.js')}}">
</script>

<style>
    .background-container {
        position: relative;
        background-image: url('{{ asset('images/coffee.webp') }}');
        background-size: cover;
        background-position: center;
    }
</style>

@endsection
