<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Alboum extends Model
{

  protected $fillable =
            [
                'name', 'cover', 'description',
            ];
  public function photos()
            {
                return $this->hasMany(Photo::class);
            }
}
