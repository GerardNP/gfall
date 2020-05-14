<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
  protected $fillable = [
    "account_id", "category_id", "name", "slug", "img", "desc", "published", "featured",
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
