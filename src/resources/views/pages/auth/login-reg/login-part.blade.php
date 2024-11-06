<div id="login" class="flex w-4/12 justify-center h-full p-10 absolute">
    <div class="flex flex-col w-60">
        <div class="mt-16 mb-12 text-4xl font-light text-gray-900">Login</div>
        <form id="loginContent" class="flex flex-col" action="{{ route('login') }}" method="POST">
            @csrf
            <div class="relative z-0 w-full mb-5 group">

                <input type="text" name="email" value="{{ old('email') }}"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b border-gray-500 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-gray-900 focus:outline-none focus:ring-0 focus:border-gray-900 peer"
                    placeholder=" " />
                <label for="email"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-gray-900 peer-focus:dark:text-gray-900 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                    Email address</label>
                @error('email')
                    <div class="text-sm font-light text-rose-700">{{$message}}</div>
                @enderror
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="password" name="password"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b border-gray-500 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-gray-900 focus:outline-none focus:ring-0 focus:border-gray-900 peer"
                    placeholder=" " />
                <label for="password"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-gray-900 peer-focus:dark:text-gray-900 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                    Password</label>
                @error('password')
                    <div class="text-sm font-light text-rose-700">{{$message}}</div>
                @enderror
            </div>

            <button id="loginButton"
                class="mt-8 text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                Submit
            </button>

        </form>
        <p class="text-sm"><a href="/forgot-password" class="underline text-gray-900 hover:text-gray-600">
                Forgot Password?</a></p>
        <p id="toSignUp" class="text-sm mt-4">Dont' have an account?
            <span id="signupMobile" class="link">Click Here</span>
        </p>
    </div>
</div>
