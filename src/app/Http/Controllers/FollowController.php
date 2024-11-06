<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\FollowService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\Eloquent\Collection;

class FollowController extends Controller
{
    public $followService;
    public function __construct()
    {
        $this->followService = new FollowService;
    }

    /**
     * Follow user
     */
    public function follow(User $user): RedirectResponse
    {
        $this->followService->follow($user);

        return back()->with('success', 'Successfully followed the user!');
    }

    /**
     * Unfollow user
     */
    public function unfollow(User $user): RedirectResponse
    {
        $this->followService->unfollow($user);

        return back()->with('unfollow', 'Successfully unfollowed the user!');
    }

    /**
     * Follow user using jquery
     */
    public function followAjax(User $user, Request $request): JsonResponse
    {
        $this->followService->follow($user);

        return response()->json(['success' => true, 'message' => 'User followed successfully.']);
    }

    /**
     * Unfollow user using jquery
     */
    public function unfollowAjax(User $user, Request $request): JsonResponse
    {
        $this->followService->unfollow($user);

        return response()->json(['success' => true, 'message' => 'User unfollowed successfully.']);
    }


    /**
     * Retrieves suggested users from user model and pass it to dashboard method
     */
    public function showSuggestions(): Collection
    {
        $user = Auth::user();
        $suggestedUsers = $user->suggestedUsers();

        return $suggestedUsers;
    }
}
