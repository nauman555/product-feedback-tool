<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = ['user_id', 'feedback_id'];
   
      // Relationship with User
      public function user()
      {
          return $this->belongsTo(User::class);
      }
  
      // Relationship with Feedback
      public function feedback()
      {
          return $this->belongsTo(Feedback::class);
      }
}
