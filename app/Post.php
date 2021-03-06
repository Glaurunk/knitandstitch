<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    protected $fillable =
              [
                  'title', 'body', 'cover_image', 'category', 'synopsis',
              ];

    public function user()
              {
                  return $this->belongsTo(User::class);
              }

    public function comments()
              {
                  return $this->hasMany(Comment::class);
              }

    public function photos()
              {
                  return $this->hasMany(Photo::class);
              }
}
