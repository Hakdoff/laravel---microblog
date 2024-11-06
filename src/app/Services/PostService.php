<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\Photo;
use App\Http\Requests\PostRequest;
use Illuminate\Foundation\Auth\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;


class PostService
{
    /**
     * Create Photo inside Post
     */
    public function addPhotos(PostRequest $request, int $userId, Post $post): void
    {
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $path = $image->move('post_images', $filename);

                Photo::create([
                    'user_id' => $userId,
                    'post_id' => $post->id,
                    'img_file' => $path
                ]);
            }
        }
    }

    /**
     * Create post function
     */
    public function create(PostRequest $request, int $userId): Post
    {
        $posts = Post::create([
            'user_id' => $userId,
            'content' => $request->content,
        ]);

        return $posts;
    }

    /**
     * View all posts
     */
    public function viewAllPosts(User $user, int $perPage): LengthAwarePaginator
    {
        $followeesIds = $user->followees->pluck('id')->push($user->id)->toArray();
        $sortedPosts = Post::whereIn('user_id', $followeesIds)
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);

            foreach ($sortedPosts as $post) {
                foreach ($post->comments as $comment) {
                    $comment->formatted_time = $this->formatTime($comment->created_at);
                }
            }

        return $sortedPosts;
    }
    
    /**
     * View all posts without paginator
     */
    public function viewAllPostsNotification(User $user): Collection
    {
        $followeesIds = $user->followees->pluck('id')->push($user->id)->toArray();
        $sortedPosts = Post::whereIn('user_id', $followeesIds)
        ->orderBy('created_at', 'desc')
        ->get();
            
        foreach ($sortedPosts as $post) {
                foreach ($post->comments as $comment) {
                    $comment->formatted_time = $this->formatTime($comment->created_at);
                }
            }

        return $sortedPosts;
    }

    /**
     * Remove longer text of time
     */
    public static function formatTime($dateTime): String
    {
        $timeString = Carbon::parse($dateTime)->diffForHumans();
        $search = [
            'hours',
            'days',
            'seconds',
            'minutes',
            'weeks',
            'week',
            'months',
            'years',
        ];
        $replace = ['h', 'd', 's', 'm', 'w', 'wk', 'mn', 'y'];
        $formattedTimeString = str_replace($search, $replace, $timeString);
        $stringspace = str_replace(' ', '', str_replace('ago', '', $formattedTimeString));

        return $stringspace;
    }

    /**
     * Delete post
     */
    public function deletePost(Post $post): void
    {
        $post->delete();
    }

    /**
     * Edit Post
     */
    public function editPost(Post $post, PostRequest $request): bool
    {
        return auth()->user()->id === $post['user_id'] && $post->update($request->all());
    }

    /**
     * Like Post
     */
    public function like(Post $post): void
    {
        $user = auth()->user();

        if(!$user->likes()->where('post_id', $post->id)->exists()) {
            $user->likes()->create([
                'post_id' => $post->id,
            ]);
        }
    }

    /**
     * Unlike Post
     */
    public function unlike(Post $post): void
    {
        auth()->user()->likes()->where('post_id', $post->id)->delete();
    }

    /**
     * Show post detail
     */
    public function postDetails(int $id): Post
    {
        $post = Post::find($id);
        return $post;
    }

    /**
     * Show post detail
     */
    public function sharePostPage(int $id): Post
    {
        $post = Post::find($id);
        return $post;
    }

    /**
     * Share post function
     */
    public function sharePost(PostRequest $request, int $userId, int $id): Post
    {
        $post = Post::find($id);

        $sharePost = Post::create([
            'user_id' => $userId,
            'content' => $request->content,
            'child_post_id' => $post->child_post_id ?? $post->id
        ]);

        $sharePost->save();

        return $sharePost;
    }
}
