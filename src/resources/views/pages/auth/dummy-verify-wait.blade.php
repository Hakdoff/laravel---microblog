@section('title', 'Login')

@section('content')

<div class="flex min-h-screen flex-col items-center justify-center gap-4">
    <div class="relative mb-14 flex w-2/3 flex-col items-center justify-center text-6xl">
        @include ('svg.bouncing')
        <span class="absolute top-12">Microblog</span>
        <span class="absolute top-28 text-sm">Your Microblogging Playground</span>
    </div>

    <div class="flex flex-col items-center justify-center text-center">
        <span class="w-2/3  px-8 py-2 mt-3"> Welcome to the sharing idea journey! Before you begin, please verify your
            email to unlock all the features. Check your inbox for the verification email. </span>
        <span class="w-2/3  px-8"> If you haven't received it, you can click the button below to resend the verification
            email. </span>
    </div>

    <div class="mb-12 mt-8 w-2/3 flex flex-col items-center justify-evenly relative">
        <div id="resendEmailText" class="hidden absolute p-2 -top-10 text-red-800">Resend email again on: <span
                id="countdown">30</span> sec</div>
        <a href="/resend-email" id="resendButton" onclick="startCountdown(event)"
            class="border-black border-2 p-5 rounded-3xl text-slate-100 bg-gray-500 hover:bg-gray-900">Resend Email
            Verification</a>
        <a href="{{ route('logout')}}" aria-label="Logout Account" class="mt-3 underline text-red-800">Logout</a>
    </div>

    <script>
        function startCountdown(event) {
            var countdownElement = document.getElementById('countdown');
            var resendButton = document.getElementById('resendButton');

            if (resendButton.disabled) {
                event.preventDefault();
                return;
            }

            resendButton.removeEventListener('click', startCountdown);
            resendButton.disabled = true;
            resendButton.classList.remove('hover:bg-warmbeige');
            resendButton.classList.add('bg-mygray', 'text-white', 'cursor-not-allowed');

            document.getElementById('resendEmailText').classList.remove('hidden');

            var seconds = 30;
            var countdownInterval = setInterval(function () {
                seconds--;
                countdownElement.textContent = seconds;
                if (seconds <= 0) {
                    clearInterval(countdownInterval);
                    resendButton.disabled = false;
                    resendButton.addEventListener('click', startCountdown);
                    resendButton.classList.remove('bg-mygray', 'text-white', 'cursor-not-allowed');
                    resendButton.classList.add('hover:bg-warmbeige');
                    document.getElementById('resendEmailText').classList.add('hidden');
                }
            }, 1000);
        }

        document.addEventListener('DOMContentLoaded', function () {
            startCountdown();
        });
    </script>
