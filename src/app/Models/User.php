<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'password',
        'email',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    /**
     * Get the profile associated with this use.
     */
    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class, 'user_id');
    }

    /**
     * Send Email Verification
     */
    public function sendEmailVerificationNotification(): void
    {
        $this->notify(new VerifyEmail);
    }

    /**
     * User has many posts
     */
    public function usersPosts(): HasMany
    {
        return $this->hasMany(Post::class, 'user_id');
    }

    /**
     * User has many images
     */
    public function photos(): HasManyThrough
    {
        return $this->hasManyThrough(Photo::class, Post::class, 'user_id', 'post_id');
    }

    /**
     * User has many likes
     */
    public function likes(): hasMany
    {
        return $this->hasMany(Like::class);
    }

    /**
     * User has many comments
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    /**
     *  Many-to-many relationship to retrieve the followers of the user.
     */
    public function followers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'follows', 'followee_id', 'follower_id');
    }

    /**
     *  Many-to-many relationship to retrieve the followees of the user.
     */
    public function followees(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'follows', 'follower_id', 'followee_id');
    }

    /**
     *  Get the number of followers
     */
    public function getFollowersCountAttribute(): int
    {
        return $this->followers()->count();
    }

    /**
     *  Get the number of followees
     */
    public function getFolloweesCountAttribute(): int
    {
        return $this->followees()->count();
    }

    /**
     * Get the following of the user's followees
     */
    public function mutualFollowers(): Collection
    {
        $followeeIds = $this->followees()->pluck('users.id');

        return User::Wherehas('followers', function ($query) use ($followeeIds){
            $query->whereIn('follows.follower_id', $followeeIds);
        })->where('users.id', '!=', $this->id)
        ->whereNotIn('users.id', $followeeIds)->get();
    }

    /**
     * Get suggested users and users who are still not followed by the user
     */
    public function suggestedUsers(): Collection
    {
        $followeeIds = $this->followees()->pluck('users.id');
    
        $mutualFollowers = $this->mutualFollowers();
    
        $otherSuggestions = User::whereDoesntHave('followers', function ($query) {
            $query->where('follows.follower_id', $this->id);
        })->whereNotIn('users.id', $followeeIds)
          ->where('users.id', '!=', $this->id)
          ->get();
    
        return $mutualFollowers->merge($otherSuggestions);
    }
}
