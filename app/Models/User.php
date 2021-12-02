<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Link;
use App\Models\Visit;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'background_color',
        'text_color',
        'image'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //working backwards
    public function links()
    {

        return $this->hasMany(Link::class);
    }

    //working backwards
    public function visits()
    {

        return $this->hasManyThrough(Visit::class, Link::class, 'user_id', 'link_id');
    }

    public function getRouteKeyName()
    {
        return 'username';
    }

    //check if user has image or use the default image
    public function getImageAttribute($value)
    {
        if ($value) {

            return "storage/" . $value;
        }

        return "default/defAvatar.png";
    }
}
