<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Score;
use App\Account;

class ScoreController extends Controller
{
  public function show($slug) {
    $account = Account::where("slug", $slug)->first();
    $scores = Score::where("account_id", $account->id)->get();

    return view( "scores.show", compact("scores") );
  }
}
