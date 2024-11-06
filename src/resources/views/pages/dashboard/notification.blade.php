<div class="flex justify-center items-center">
    @include('svg.notification')
</div>
<div cis="notification-container w-96 flex justify-center items-center">
    <div id="notificationlist" class="border-2 border-softblack w-96 mt-20 bg-whisperwhite h-96 px-2 overflow-y-auto" style="display: none; position: absolute; top: 20%; left: 70%; transform: translateX(-50%); transform: translateY(-8%);">
        <div class="pt-2 justify-center items-center text-softblack">
            <p>Notification</p>
        </div>
        @foreach ($notifications->sortByDesc('created_at') as $notification)
            @if(isset($notification->sharedPost) && $notification->sharedPost)
                @if ($notification->user->id != auth()->user()->id)
                    @if (auth()->user()->id == $notification->sharedPost->user->id)
                    <div class="flex border-t-2 border-softblack py-1">
                        <a href="{{ url('postDetails', $notification->id) }}" class="flex items-center space-x-2">
                            <div class="w-10 h-10 border-2 border-white rounded-full overflow-hidden relative">
                                <img class="object-cover w-full h-full" src='{{ $notification->user->profile->getImageURL() }}' alt='Profile Picture'>
                            </div>
                            <div class="flex flex-col text-sm text-softblack">
                                <span>
                                    <p><span class="font-medium">{{ $notification->user->username}}</span> shared your post.</p>
                                </span>
                                <span class="font-thin text-xs">
                                    <p>{{ $notification->created_at->diffForHumans() }}</p>
                                </span>
                            </div>
                        </a>
                    </div>
                    @endif
                @endif
            @endif
            @if(isset($notification->likes) && $notification->likes)
                @foreach ($notification->likes as $like)
                    @if ($like->user->id != auth()->user()->id)
                        @if (auth()->user()->id == $notification->user->id)
                            <div class="border-t-2 border-softblack py-1">
                                <a href="{{ url('postDetails', $notification->id) }}" class="flex items-center space-x-2">
                                    <div class="w-10 h-10 border-2 border-white rounded-full overflow-hidden relative">
                                        <img class="object-cover w-full h-full" src='{{ $like->user->profile->getImageURL() }}' alt='Profile Picture'>
                                    </div>
                                    <div class="flex flex-col text-sm text-softblack">
                                        <span>
                                            <p><span class="font-medium">{{$like->user->username}}</span> liked a post you shared.</p>
                                        </span>
                                        <span class="font-thin text-xs">
                                            <p>{{ $like->created_at->diffForHumans() }}</p>
                                        </span>
                                    </div>
                                </a>
                            </div>
                        @endif
                    @endif
                @endforeach
            @endif
            @if(isset($notification->comments) && $notification->comments)
                @foreach ($notification->comments as $comment)
                    @if ($comment->user->id != auth()->user()->id)
                        @if (auth()->user()->id == $notification->user->id)
                            <div class="border-t-2 border-softblack py-1">
                                <a href="{{ url('postDetails', $notification->id) }}" class="flex items-center space-x-2">
                                    <div class="w-10 h-10 border-2 border-white rounded-full overflow-hidden relative">
                                        <img class="object-cover w-full h-full" src='{{ $comment->user->profile->getImageURL() }}' alt='Profile Picture'>
                                    </div>
                                    <div class="flex flex-col text-sm text-softblack">
                                        <span>
                                            <p><span class="font-medium">{{$comment->user->username}}</span> commented on a post you shared.</p>
                                        </span>
                                        <span class="font-thin text-xs">
                                            <p>{{ $comment->created_at->diffForHumans() }}</p>
                                        </span>
                                    </div>
                                </a>
                            </div>
                        @endif
                    @endif
                @endforeach
            @endif  
        @endforeach
        <div class="justify-center items-center text-softblack">
            <p>Follower</p>
        </div>
        @foreach($user->followers->sortByDesc('created_at') as $follower)
            @if ($follower->id != auth()->user()->id)
                <div class="border-t-2 border-softblack py-1">
                    <a href="{{ route('user.profile', ['id' => $follower->id]) }}" class="flex items-center space-x-2">
                        <div class="w-10 h-10 border-2 border-white rounded-full overflow-hidden relative">
                            <img class="object-cover w-full h-full" src='{{ $follower->profile->getImageURL() }}' alt='Profile Picture'>
                        </div>
                        <div class="flex flex-col text-sm text-softblack">
                            <span>
                                <p><span class="font-medium">{{$follower->username}}</span> followed you.</p>
                            </span>
                            <span class="font-thin text-xs">
                                <p>{{ $notification->created_at->diffForHumans() }}</p>
                                </span>
                        </div>
                    </a>
                </div>
            @endif
        @endforeach
    </div>
</div>
<script>
    document.getElementById('notification').addEventListener('click', function(event) {
        const notificationlist = document.getElementById('notificationlist');
        if (notificationlist.style.display === 'block') {
        notificationlist.style.display = 'none';
        } else {
        notificationlist.style.display = 'block';
        }
        event.stopPropagation();
        });
          
    document.addEventListener('click', function(event) {
        const notificationlist = document.getElementById('notificationlist');
        if (notificationlist.style.display === 'block' && !event.target.closest('.notification-container')){
        notificationlist.style.display = 'none';
        }
    });
    
    document.addEventListener('DOMContentLoaded', function() {
        const notificationList = document.getElementById('notificationlist');
        const notifications = Array.from(notificationList.children);
        console.log(notifications); // Log the notifications array
        notifications.sort((a, b) => {
            const dateA = new Date(a.querySelector('.font-thin.text-xs p').innerText);
            const dateB = new Date(b.querySelector('.font-thin.text-xs p').innerText);
            return dateB - dateA;
        });
        notifications.forEach(notification => notificationList.appendChild(notification));
    });
</script>
