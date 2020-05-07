<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Score;
use App\User;
use Auth;

class RegisteredController extends Controller
{
  public function showScores()
  {
    $scores = Score::where("user_id", Auth::user()->id)->get();
    return view( "registered.scores",  compact("scores") );
  }
}
