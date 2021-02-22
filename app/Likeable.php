<?php
/**
 * Created by PhpStorm.
 * User: Malik Al Ichsan
 */

namespace App;


use Illuminate\Database\Eloquent\Builder;

trait Likeable
{
    public function scopeWithLikes(Builder $query)
    {
//        select * from tweets
//        left join (
//            select tweet_id, sum(liked) as likes, sum(!liked) as dislikes from likes
//            group by tweet_id
//        ) likes on likes.tweet_id = tweets.id;

        $query->leftJoinSub(
            'select tweet_id, sum(liked) likes, sum(!liked) dislikes from likes group by tweet_id',
            'likes',
            'likes.tweet_id',
            'tweets.id'
        );
    }

    public function isDislikedBy(User $user)
    {
        return $this->isLikedBy($user, false);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function isLikedBy(User $user, $liked = true)
    {
        return (bool)$user->likes
            ->where('tweet_id', $this->id)
            ->where('liked', $liked)
            ->count();
    }

    public function dislike($user = null)
    {
        return $this->like($user, false);
    }

    public function like($user = null, $liked = true)
    {
        $this->likes()->updateOrCreate(
            [
                'user_id' => $user ? $user->id : auth()->id,
            ],
            [
                'liked' => $liked,
            ]
        );
    }
}
