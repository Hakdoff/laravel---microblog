@extends('pages.layouts.app')

@section('title', 'Reset Password')

@section('content')

    <body>
        <h1>Reset Your Password</h1>

        {{-- Success Message --}}
        @if (session('status'))
            <div id="successMessage" style="color: green; background-color: #ccffcc; padding: 10px; margin-bottom: 15px;">
                {{ session('status') }}
            </div>
            <script>
                setTimeout(function() {
                    window.location.href = "{{ route('login') }}";
                }, 5000);
            </script>
        @endif

        {{-- Error Messages --}}
        @if ($errors->any())
            <div style="color: red; background-color: #ffcccc; padding: 10px; margin-bottom: 15px;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <input type="password" name="password" placeholder="New Password" required>
            <input type="password" name="password_confirmation" placeholder="Confirm New Password" required>
            <button type="submit">Reset Password</button>
        </form>
    </body>
@endsection
