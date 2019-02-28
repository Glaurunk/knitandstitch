<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Knit extends Model
{
  protected $fillable = [
      'name', 'email', 'password', 'has_subscription', 'role',
  ];

  public function comments()
            {
                return $this->hasMany(Comment::class);
            }

  public function photos()
            {
                return $this->hasMany(Photo::class);
            }
            
}
