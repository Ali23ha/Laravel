<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = ['post_id', 'user_id', 'reason', 'status'];

    ////////scope function///////////

    public function scopeViewReport($query)
    {
        $query->with(['user', 'post',])
            ->where('status', 'pending');

    }

    /////////////relations/////////////

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
