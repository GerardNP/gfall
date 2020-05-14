<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  protected $fillable = [
    "name", "slug", "featured", "desc", "img",
  ];

  public function games()
  {
    return $this->hasMany("App\Game");
  }
}
