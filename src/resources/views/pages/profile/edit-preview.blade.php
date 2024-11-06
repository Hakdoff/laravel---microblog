<div class="p-profile">
    <div class="p-profile__container">
        <div class="h-80 overflow-hidden rounded-lg">
            <img class="object-cover w-full h-full" id="preview-coverpic" src='{{ $user->profile->getCoverURL() }}' alt='Cover Picture'>
        </div>
        <div class="p-profile__cover">
            <div class="p-profile__name text-black">
                <p>
                <span id="preview-first-name">{{ $user->profile->first_name }}</span>
                <span id="preview-middle-name">{{ $user->profile->middle_name ?? ''}}</span>
                <span id="preview-last-name">{{ $user->profile->last_name }}</span>
                </p>
                <div class="flex gap-2 mt-2 ml-2 font-thin text-base text-black">

                    <div class="group relative">
                        <p class="cursor-pointer hover:underline">{{ $user->followers_count }} followers</p>
                        @if (auth()->user()->followees->contains($user->id) || auth()->user()->id == $user->id)
                            <div
                                class="hidden text-white z-50 group-hover:block absolute bg-gray-800 border border-gray-800 text-sm py-2 px-4 rounded shadow-md">
                                <ul>
                                    @foreach($user->followers->take(10) as $follower)
                                        <li>{{ $follower->username }}</li>
                                        @if ($user->followers->count() > 10)
                                            <li>and {{ $user->followers->count() - 1 }} more...</li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>

                    <div class="group relative">
                        <p class="cursor-pointer hover:underline">{{ $user->followees_count }} following</p>
                        @if (auth()->user()->followees->contains($user->id) || auth()->user()->id == $user->id)
                            <div
                                class="hidden text-white z-50 group-hover:block absolute bg-gray-800 border border-gray-800 text-sm py-2 px-4 rounded shadow-md">
                                <ul>
                                    @foreach($user->followees->take(10) as $followee)
                                        <li>{{ $followee->username }}</li>
                                        @if ($user->followees->count() > 10)
                                            <li>and {{$user->followees->count() - 1 }} more...</li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>

                </div>
            </div>
            <div class="-mt-16 w-40 h-40 border-4 border-white rounded-full overflow-hidden relative">
                <img class="object-cover w-full h-full" id="preview-profilepic" src='{{ $user->profile->getImageURL() }}' alt='Profile Picture'>
            </div>
        </div>
        <div class="flex justify-start m-4 relative">
            @if (auth()->user()->id == $user->id)
            @else
                @if (auth()->user()->followees->contains($user->id))
                    <form action="{{ route('unfollow', $user) }}" method="POST" class="m-0 p-0">
                        @csrf
                        <button type="submit" class="d-dashboard__aside-btns">Unfollow</button>
                    </form>
                @else
                    <form action="{{ route('follow', $user) }}" method="POST" class="m-0 p-0">
                        @csrf
                        <button type="submit" class="d-dashboard__aside-btns">Follow</button>
                    </form>
                @endif
            @endif
            <p class="p-profile__bio absolute left-1/2 top-1/2 text-black transform -translate-x-1/2 -translate-y-1/2">
                "{{ $user->profile->bio }}"</p>
        </div>
        <div class="mt-10">
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    const firstNameInput = document.getElementById('first_name');
    const previewFirstName = document.getElementById('preview-first-name');

    if (firstNameInput && previewFirstName) {
        firstNameInput.addEventListener('input', function() {
            previewFirstName.textContent = this.value;
        });
    }

    const middleNameInput = document.getElementById('middle_name');
    const previewMiddleName = document.getElementById('preview-middle-name');

    if (middleNameInput && previewMiddleName) {
        middleNameInput.addEventListener('input', function() {
            previewMiddleName.textContent = this.value;
        });
    }

    const lastNameInput = document.getElementById('last_name');
    const previewLastName = document.getElementById('preview-last-name');

    if (lastNameInput && previewLastName) {
        lastNameInput.addEventListener('input', function() {
            previewLastName.textContent = this.value;
        });
    }

    const profilePicInput = document.getElementById('profilepic');
    const previewProfilePic = document.getElementById('preview-profilepic');

    if (profilePicInput && previewProfilePic) {
        profilePicInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function() {
                    previewProfilePic.src = reader.result;
                }
                reader.readAsDataURL(file);
            }
        });
    }

    const coverPicInput = document.getElementById('coverpic');
    const previewCoverPic = document.getElementById('preview-coverpic');

    if (coverPicInput && previewCoverPic) {
        coverPicInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function() {
                    previewCoverPic.src = reader.result;
                }
                reader.readAsDataURL(file);
            }
        });
    }
    
    });
</script>
