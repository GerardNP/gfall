<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function games()
    {
      return $this->hasMany("App\Game");
    }
}
