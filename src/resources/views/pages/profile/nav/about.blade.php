<div class="d-dashboard__post-container mb-10">
    <p class="pb-1">About</p>
    <hr class="border-gray-400 mb-1">
    <div class="flex">
        <div class="flex flex-col w-2/6 p-2 border-gray-300 border-r border-gray-400">
            <p>First name</p>
            <p>Middle name</p>
            <p>Last name</p>
            <p>Email address</p>
            <p>Age</p>
            <p>Birthdate</p>
            <p>Phone number</p>
        </div>
        <div class="flex flex-col w-full p-2">
            <p>{{$user->profile->first_name}}</p>
            <p>{{ $user->profile->middle_name ? $user->profile->middle_name : 'NA' }}</p>
            <p>{{$user->profile->last_name}}</p>
            <p>{{$user->email}}</p>
            <p>{{$age}}</p>
            <p>{{ date('F j, Y', strtotime($user->profile->birth_date)) }}</p>
            <p>{{$user->profile->phone_number}}</p>
        </div>
    </div>
</div>
