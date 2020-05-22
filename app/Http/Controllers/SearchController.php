<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Game;

class SearchController extends Controller
{
  public function index(Request $request) {
    $users = []; $games= []; $name = $request->name;

    if ( isset($request->name) && !empty($request->name) ) {
      $users = User::where("name", "like", trim("%$request->name%"))
        ->orderBy("name", "asc")
        ->paginate(4);

      $games = Game::where("name", "like", trim("%$request->name%"))
        ->where("published", true)
        ->orderBy("name", "asc")
        ->paginate(4);
    }

    return view( "search.index", compact("users", "games", "name") );

  }

  public function users(Request $request) {
    $users = []; $name = $request->name;

    if ( isset($request->name) && !empty($request->name) ) {
      $users = User::where("name", "like", trim("%$request->name%"))
        ->orderBy("name", "asc")
        ->paginate(4);
    }

    return view( "search.users", compact("users", "name") );
  }

  public function games(Request $request) {
    $games= []; $name = $request->name;

    if ( isset($request->name) && !empty($request->name) ) {
      $games = Game::where("name", "like", trim("%$request->name%"))
        ->where("published", true)
        ->orderBy("name", "asc")
        ->paginate(4);
    }

    return view( "search.games", compact("games", "name") );
  }

}
