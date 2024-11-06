<?php

namespace App\Services; 

use App\Models\Post;
use App\Models\Comment;
use App\Http\Requests\CommentRequest;

class CommentService {
    /**
     * Create Comment
     */
     public function create(CommentRequest $request, $user_id, Post $post): void
    {
        $comment = new Comment([
            'content' => $request->input('content'),
            'user_id' => $user_id,
        ]);

        $post->comments()->save($comment);
    }

    /**
     * Delete CommentS
     */
    function deleteComment(Comment $comment): Void
    {
        $comment->delete();
    }
    
    /**
     * Edit Comment
     */
    public function editComment(Comment $comment, CommentRequest $request): bool
    {
        $user = auth()->user();
        return $user->id === $comment['user_id'] && $comment->update($request->all());
    }
}
