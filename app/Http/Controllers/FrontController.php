<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;

class FrontController extends Controller
{
  public function index() {
    $games = Game::orderBy("id", "DESC")->paginate(2);
    return view("frontend", compact("games") );
  }

  public function show($slug) {
    $game = Game::where("slug", $slug)->first();
    return view( "game", compact("game") );
  }

}
