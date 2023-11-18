<?php

namespace App\Models;

// app/User.php

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin()
    {
        return $this->is_admin;
    }

    public function feedback()
    {
        return $this->hasMany(Feedback::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
