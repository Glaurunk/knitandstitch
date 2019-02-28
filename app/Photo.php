<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Photo extends Model
{
  protected $fillable =
            [
                'title', 'photo', 'size', 'description', 'dimensions',
            ];

    public function alboums()
              {
                  return $this->belongsToMany(Alboum::class);
              }

    public function posts()
              {
                  return $this->belongsToMany(Alboum::class);
              }

    public function knit()
              {
                  return $this->belongsToMany(Knit::class);
              }

}
