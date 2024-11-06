<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\View\View;
use App\Services\CommentService;
use App\Services\PostService;
use App\Http\Requests\CommentRequest;
use Illuminate\Http\RedirectResponse;

class PostCommentController extends Controller
{
    public $commentService;
    public $postService;

    public function __construct()
    {
        $this->commentService = new CommentService;
        $this->postService = new PostService;
    }

    /**
     * Add Comment
     */
    public function store(CommentRequest $request, Post $post): RedirectResponse
    {
        $this->commentService->create($request, auth()->id(), $post);
    
        return redirect()->back()->with('success', 'Comment added successfully!');
    }

    /**
     * Delete Comment
     */
    public function delete(Comment $comment): RedirectResponse
    {
        $this->commentService->deleteComment($comment);
        return redirect()->back()->with('delete', 'Comment deleted successfully.');
    }
    
    /**
     * Edit Comment
     */
    public function editComment(Comment $comment, CommentRequest $request): RedirectResponse
    {
        $this->commentService->editComment($comment, $request);
        return back()->with('success', 'Comment edited successfully!');
    }
}
