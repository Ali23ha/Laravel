<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','content','user_id'];

    ////////scope function///////////
    public function scopeGetPostsWithDetails($query)
    {
        $query->with(['user'
            ,'comments'=>function ($query)
            {
                $query->withcount('upvotes')->withcount('downvotes');
            }
            ,'comments.user'
            ,'tags'])
        ->withcount('upvotes')->withcount('downvotes');
    }


    /////////////relations/////////////

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function reports()
    {
        return $this->hasMany(Report::class);
    }
    public function votes()
    {
        return $this->hasMany(Vote::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class,'post_tag');
    }
    public function upvotes()
    {
        return $this->votes()->where('is_upvote', true);
    }
    public function downvotes()
    {
        return $this->votes()->where('is_upvote', false);
    }
}
