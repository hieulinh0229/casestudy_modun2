<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function likes(){

        return $this->hasMany(Like::class, 'post_id','id');
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tag', 'post_id', 'tag_id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id','id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

}
