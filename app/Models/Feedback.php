<?php

namespace App\Models;

// app/Feedback.php

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = ['title', 'description', 'category', 'user_id', 'vote_count','comments_enabled'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function votes()
    {
        return $this->hasMany(Vote::class);
    }
}
