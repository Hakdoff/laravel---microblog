@extends('pages.layouts.app')

@section('title', 'Forgot Password')

@section('content')

    <body>
        <h1>Forgot Password</h1>

        {{-- Check for success message --}}
        @if (session('status'))
            <div style="color: green; background-color: #ccffcc; padding: 10px; margin-bottom: 15px;">
                {{ session('status') }}
            </div>
        @endif

        {{-- Check for errors and display them --}}
        @if ($errors->any())
            <div style="color: red; background-color: #ffcccc; padding: 10px; margin-bottom: 15px;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <input type="email" name="email" placeholder="Your email address" required>
            <button type="submit">Send Password Reset Link</button>
        </form>
    </body>
@endsection
