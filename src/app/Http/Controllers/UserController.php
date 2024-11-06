<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Services\UserService;
use App\Services\PostService;
use App\Models\User;
use Illuminate\View\View;

class UserController extends Controller
{
    protected $userService;
    public $postService;
    public $followController;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
        $this->postService = new PostService;
        $this->followController = new FollowController;
    }

    /**
     * Show other user's profile
     */
    public function show(int $id): View
    {
        $data = $this->userService->getUserProfile($id, 5);
        return view('pages.profile.profile', $data);
    }

    /**
     * Show search results
     */
    public function search(SearchRequest $request, int $id): View
    {
        $user = auth()->user();
        $query = $request->input('query');
        $results = User::where('username', 'like', "%$query%")->get();
        $suggestedUsers = $this->followController->showSuggestions();
        $data = $this->userService->getQuery($request, $id);
        $notifications = $this->postService->viewAllPostsNotification($user);
        return view('pages.dashboard.search-result', compact('data', 'user', 'results', 'notifications', 'suggestedUsers'));
    }
}
