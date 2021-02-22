<?php
/**
 * Created by PhpStorm.
 * User: Malik Al Ichsan
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $guarded = [];

    public function tweet()
    {
        return $this->belongsToMany(Tweet::class);
    }

    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
