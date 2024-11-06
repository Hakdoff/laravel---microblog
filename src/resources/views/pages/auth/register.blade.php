@extends('pages.layouts.app')

@section('title', 'Register')

@section('content')

<body>
    <div class="register">
        <div class="register_mainbox">
            <div class="register_box1">
                <figure class="register_figureStyle">
                    <div class="register_justifyCenter">
                        <div class="register_roundedStyle"></div>
                        <img class="register_userIcon"
                            src="https://icons.veryicon.com/png/o/miscellaneous/user-avatar/user-avatar-male-5.png"
                            alt="User Icon" type="image" />
                    </div>
                    <figcaption class="register_leftText1">
                        Let’s Get You Set Up
                    </figcaption>
                    <figcaption class="register_leftText2">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                        voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                        cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </figcaption>
                </figure>
            </div>

            <div class="register_box2">
                @auth
                @if(auth()->user()->status === 0)
                @include('pages.auth.dummy-verify-wait') <!-- dummy-verify-wait.blade.php -->
                @elseif(auth()->user()->status === 1)
                @include('pages.auth.dummy-dashboard') <!-- dummy-dashboard.blade.php -->
                @endif
                @else
                @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif
                <form action="/register" method="POST">
                    @csrf
                    <div class="register_flexRow">
                        <div class="w-full">
                            <label for="first_name" class="register_inputBoxLabel">First Name</label>
                            <input type="text" id="first_name" name="first_name" class="register_inputBox" />
                            @error('first_name')
                            <div style="color:red;">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label for="middle_name" class="register_inputBoxLabel">Middle Name</label>
                            <input type="text" id="middle_name" name="middle_name" class="register_inputBox" />
                            
                        </div>
                        <div class="w-full">
                            <label for="last_name" class="register_inputBoxLabel">Last Name</label>
                            <input type="text" id="last_name" name="last_name" class="register_inputBox" />
                            @error('last_name')
                            <div style="color:red;">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="register_flexRow">
                        <div class="w-full">
                            <div class="relative">
                                <label for="birthday" class="register_inputBoxLabel">Birthday</label>
                            <input type="date" id="birthday" name="birthday" class="register_inputBox" />
                                @error('birthday')
                                <div style="color:red;">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full">
                            <label for="email" class="register_inputBoxLabel">Email</label>
                            <input type="email" id="email" name="email" class="register_inputBox" />
                            @error('email')
                            <div style="color:red;">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    

                    <div class="register_flexRow">
                        <div class="w-full">
                            <label for="lot_block" class="register_inputBoxLabel">Lot & Block</label>
                            <input type="text" id="lot_block" name="lot_block" class="register_inputBox" />
                            @error('lot_block')
                            <div style="color:red;">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label for="street" class="register_inputBoxLabel">Street</label>
                            <input type="text" id="street" name="street" class="register_inputBox" />
                            @error('street')
                            <div style="color:red;">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="register_flexRow">
                        <div class="w-full">
                            <label for="city" class="register_inputBoxLabel">City</label>
                            <input type="text" id="city" name="city" class="register_inputBox" />
                            @error('city')
                            <div style="color:red;">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label for="province" class="register_inputBoxLabel">Province</label>
                            <input type="text" id="province" name="province" class="register_inputBox" />
                            @error('province')
                            <div style="color:red;">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="register_flexRow">
                        <div class="w-full">
                            <label for="country" class="register_inputBoxLabel">Country</label>
                            <input type="text" id="country" name="country" class="register_inputBox" />
                            @error('country')
                            <div style="color:red;">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label for="zip_code" class="register_inputBoxLabel">Zip Code</label>
                            <input type="text" id="zip_code" name="zip_code" class="register_inputBox" />
                            @error('zip_code')
                            <div style="color:red;">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="register_flexRow">
                        <div class="w-full">
                            <label for="username" class="register_inputBoxLabel">Username</label>
                            <input type="text" id="username" name="username" class="register_inputBox" />
                            @error('username')
                            <div style="color:red;">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label for="phone_number" class="register_inputBoxLabel">Phone Number</label>
                            <input type="text" id="phone_number" name="phone_number" class="register_inputBox" />
                            @error('phone_number')
                            <div style="color:red;">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="register_flexRow">
                        <div class="w-full">
                            <label for="password" class="register_inputBoxLabel">Password</label>
                            <input type="password" id="password" name="password" class="register_inputBox" />
                            @error('password')
                            <div style="color:red;">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label for="password_confirmation" class="register_inputBoxLabel">Confirm Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="register_inputBox" required/>
                            @error('password_confirmation')
                            <div style="color:red;">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="flex justify-end mt-6">
                        <button type="submit" class="register_saveButton">Save</button>
                    </div>
                    <div class="mt-4 flex justify-center">
                        <p>Already have an account? <u><a href="{{ route('login') }}">Login</a></u></p>
                    </div>
                </form>
                @endauth
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>
