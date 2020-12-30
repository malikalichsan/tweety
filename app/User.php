<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * custom accessor
     * to use it we can call like this = $user->avatar
     * @param $value
     * @return string
     */
    public function getAvatarAttribute($value)
    {
        // return 'https://i.pravatar.cc/200?u=' . $this->email;
        return asset('storage' . DIRECTORY_SEPARATOR . $value);
    }

    /**
     * custom accessor
     * to use it we can call like this = $user->profile
     */
    public function getProfileAttribute()
    {
        return route('profile', $this);
    }

    public function timeline()
    {
        // this will only return it's users tweet
//        return Tweet::where('user_id', $this->id)
//            ->latest()->get();

        // include all the user's tweets
        // as well as the tweets of everyone
        // they follow ... in descending order by date.

        $friends = $this->follows()->pluck('id');

        return Tweet::whereIn('user_id', $friends)
            ->orWhere('user_id', $this->id)
            ->latest()
            ->get();
    }

    public function tweets()
    {
        return $this->hasMany(Tweet::class)
            ->latest();
    }

    public function getRouteKeyName()
    {
        return 'username';
    }

    public function path($append = '')
    {
        $path = route('profile', $this);

        return $append ? "{$path}/{$append}" : $path;
    }
}
