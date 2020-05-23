<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
  protected $fillable = [
    "account_id", "game_id", "score"
  ];
    //
    public function account()
    {
      return $this->belongsTo("App\Account");
    }

    public function game()
    {
      return $this->belongsTo("App\Game");
    }
}
