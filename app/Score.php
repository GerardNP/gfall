<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
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
