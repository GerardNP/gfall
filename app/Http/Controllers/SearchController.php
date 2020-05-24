<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Game;

class SearchController extends Controller
{
  public function index(Request $request) {
    $users = []; $games= []; $name = $request->name; $resultsU = 0; $resultsG = 0;

    if ( isset($request->name) && !empty($request->name) ) {
      $users = User::where("name", "like", trim("%$request->name%")) //Por si acaso
        ->orderBy("name", "asc");
      $resultsU = count( $users->get() );
      $users = $users->paginate(4);

      $games = Game::where("name", "like", trim("%$request->name%"))
        ->where("published", true)
        ->orderBy("name", "asc");
      $resultsG = count( $games->get() );
      $games = $games->paginate(4);
    }

    return view( "search.index", compact("users", "games", "name", "resultsU", "resultsG") );

  }

  public function users(Request $request) {
    $users = []; $name = $request->name; $results = 0;

    if ( isset($request->name) && !empty($request->name) ) {
      $users = User::where("name", "like", trim("%$request->name%"))
        ->orderBy("name", "asc");

      $results = count( $users->get() );
      $users = $users->paginate(6);

      if ( $results == 0) {
        $users = [];
      }
    }

    return view( "search.users", compact("users", "name", "results") );
  }

  public function games(Request $request) {
    $games= []; $name = $request->name; $results = 0;

    if ( isset($request->name) && !empty($request->name) ) {
      $games = Game::where("name", "like", trim("%$request->name%"))
        ->where("published", true)
        ->orderBy("name", "asc");

      $results = count( $games->get() );
      $games = $games->paginate(6);

      if ( $results = 0) {
        $games = [];
      }
      print_r($results);
    }

    return view( "search.games", compact("games", "name", "results") );
  }

}
