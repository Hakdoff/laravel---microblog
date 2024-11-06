<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;
use App\Services\PostService;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\PostRequest;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{
    private const MAX_LIKES_TO_BE_DISPLAYED = 10;
    public $postService;
    public $followController;

    public function __construct()
    {
        $this->postService = new PostService;
        $this->followController = new FollowController;
    }

    /**
     * Create user posts
     */
    public function create(PostRequest $request): RedirectResponse
    {
        $userId = auth()->id();
        $post = $this->postService->create($request, $userId);
        $this->postService->addPhotos($request, $userId, $post);
        return redirect()->back()->with('success', 'Post shared successfully!');
    }

    /**
     * Delete Post
     */
    public function deletePost(Post $post): RedirectResponse
    {
        $this->postService->deletePost($post);
        return redirect()->route('dashboard', ['id' => auth()->user()->id])->with('delete', 'Post deleted successfully!');
    }

    /**
     * Edit Post
     */
    public function editPost(Post $post, PostRequest $request): RedirectResponse
    {
        return $this->postService->editPost($post, $request) ?  redirect()->route('dashboard', ['id' => auth()->user()->id])->with('success', 'Post edited succesfully') :
            redirect('/')->with('error', 'Unauthorized access');
    }

    /**
     * View to edit Post
     */
    public function viewPost(Post $post): View
    {
        return view('pages.dashboard.edit-post', ['post' => $post]);
    }

    /**
     * Like Post
     */
    public function like(Post $post): JsonResponse
    {
        $this->postService->like($post);
        $likeUsers = $post->likes->take(self::MAX_LIKES_TO_BE_DISPLAYED)->map(function ($like) {
            return $like->user->username;
        });

        return response()->json([
            'likes_count' => $post->likes->count(),
            'like_users' => $likeUsers,
        ]);
    }
    
    /**
     * UnLike Post
     */
    public function unlike(Post $post): JsonResponse
    {
        $this->postService->unlike($post);
        $likeUsers = $post->likes->take(self::MAX_LIKES_TO_BE_DISPLAYED)->map(function ($like) {
            return $like->user->username;
        });
    
        return response()->json([
            'likes_count' => $post->likes->count(),
            'like_users' => $likeUsers,
        ]);
    }
    
    /**
     * Show post detail
     */
    public function postDetails(int $id): View
    {
        $user = auth()->user();
        $post = $this->postService->postDetails($id);
        $suggestedUsers = $this->followController->showSuggestions();
        return view('pages.dashboard.post-details', compact('user','post', 'suggestedUsers'));
    }
    
    /**
     * Show post detail
     */
    public function sharePostPage(int $id): View
    {
        $user = auth()->user();
        $post = $this->postService->sharePostPage($id);
        $notifications = $this->postService->viewAllPostsNotification($user);
        $suggestedUsers = $this->followController->showSuggestions();
        return view('pages.dashboard.share-page', compact('user','post', 'notifications', 'suggestedUsers'));
    }
    
    /**
     * Share user posts
     */
    public function sharePost(PostRequest $request, int $id): RedirectResponse
    {
        $userId = auth()->id();
        $post = $this->postService->sharePost($request, $userId, $id);
        $this->postService->addPhotos($request, $userId, $post);
        return redirect()->route('dashboard', ['id' => auth()->user()->id])->with('success', 'Post shared successfully!');
    }
}
