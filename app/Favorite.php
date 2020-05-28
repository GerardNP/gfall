<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
  protected $fillable = [
    "game_id", "account_id",
  ];
}
