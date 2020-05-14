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
    return $this->belongsTo("App\User");
  }
}
