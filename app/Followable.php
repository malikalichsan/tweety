<?php
/**
 * Created by PhpStorm.
 * User: Malik Al Ichsan
 */

namespace App;


trait Followable
{
    public function follow(User $user)
    {
        $this->follows()->save($user);
    }

    public function unfollow(User $user)
    {
        $this->follows()->detach($user);
    }

    public function toggleFollow(User $user)
    {
//        if ($this->following($user)) {
//            // have the auth'd user unfollow the given user
//            return $this->unfollow($user);
//        }
//
//        // have the auth'd user follow the given user
//        return $this->follow($user);

        // this work just like above
        // but simpler
        // we just need to call the relationship
        // and call toggle() method
        $this->follows()->toggle($user);
    }

    public function following(User $user)
    {
        return $this->follows()
            ->where('following_user_id', $user->id)
            ->exists();
    }

    public function follows()
    {
        return $this->belongsToMany(
            User::class,
            'follows',
            'user_id',
            'following_user_id'
        )->withTimestamps();
    }
}
