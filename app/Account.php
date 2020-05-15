<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
  protected $fillable = [
    "slug", "desc", "img",
  ];

  public function user()
  {
    return $this->hasOne("App\User");
  }

  public function games()
  {
    return $this->hasMany("App\Game");
  }

  public function scores()
  {
    return $this->hasMany("App\Scores");
  }
}
