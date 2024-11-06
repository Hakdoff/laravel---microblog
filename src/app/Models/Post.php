<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = ['content', 'user_id', 'child_post_id'];
    
    /**
     * Post belongs to user
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Post has many Photos
     */
    public function photos(): HasMany
    {
        return $this->hasMany(Photo::class);
    }
    
    /**
     * Likes belongs to many user
     */
    public function likes(): hasMany
    {
        return $this->hasMany(Like::class, 'post_id');
    }

    /**
     * Gets the user who liked the post
     */
    public function likedBy(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'likes');
    }

    /**
     * Post has many comments
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Post belongs to post
     */
    public function sharedPost(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'child_post_id');
    }

    /**
     * get the number of shares of the post
     */
    public function numberOfShares(): hasMany
    {
        return $this->hasMany(Post::class, 'child_post_id');
    }
}
