<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    public const DEFAULT_PROFILE = 'https://static.vecteezy.com/system/resources/thumbnails/009/734/564/small_2x/default-avatar-profile-icon-of-social-media-user-vector.jpg';
    public const DEFAULT_COVER = 'https://flowbite.com/docs/images/examples/image-3@2x.jpg';

    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'middle_name',
        'birth_date',
        'address',
        'phone_number',
        'bio',
        'profilepic',
        'coverpic',
    ];

    /**
     * Get the user that owns this profile.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    /**
     * Get image URL
     */
    public function getImageURL(): string
    {
        if($this->profilepic){
            $cleanedPath = str_replace('/', '', $this->profilepic);
            return url('/'. $cleanedPath);
        }
        return self::DEFAULT_PROFILE;
    }
    
    /**
     * Get cover URL
     */
    public function getCoverURL(): string
    {
        if($this->coverpic){
            $cleanedPath = str_replace('/', '', $this->coverpic);
            return url('/'. $cleanedPath);
        }
        return self::DEFAULT_COVER;
    }
}
