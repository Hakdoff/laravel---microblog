<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use App\Services\PostService;

class DashboardController extends Controller
{
    public $postService;
    public $followController;
    public function __construct()
    {
        $this->postService = new PostService;
        $this->followController = new FollowController;
    }
    /**
     * Return dashboard
     */
    public function dashboard(int $id): View
    {
        $user = User::with('profile')->findOrFail($id);
        $posts = $this->postService->viewAllPosts($user, 5);
        $notifications = $this->postService->viewAllPostsNotification($user);
        $suggestedUsers = $this->followController->showSuggestions();
        return view('app', compact('user', 'posts', 'notifications', 'suggestedUsers'));
    }
}
