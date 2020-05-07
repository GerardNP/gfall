<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
  protected $fillable = [
    "user_id", "category_id", "title", "slug", "description", "image"
  ];

  public function category()
  {
    return $this->belongsTo("App\Category");
  }

  public function user()
  {
    return $this->belongsTo("App\User");
  }

  public function scores()
  {
    return $this->hasMany("App\Score");
  }
}
