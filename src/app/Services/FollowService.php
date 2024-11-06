<?php

namespace App\Services;

use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class FollowService
{
    /**
     * Follow User
     */
    public function follow(User $user): Void
    {
        $currentUser = auth()->user();

        if(!$currentUser->followees()->where('followee_id', $user->id)->exists()) {
            $currentUser->followees()->attach($user->id);
        }
    }

    /**
     * Unfollow User
     */
    public function unfollow(User $user): Void
    {
        Auth::user()->followees()->detach($user->id);
    }
}
