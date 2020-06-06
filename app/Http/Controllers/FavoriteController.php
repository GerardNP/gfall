<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Favorite;
use Auth;
use App\Game;

class FavoriteController extends Controller
{
  public function save(Request $request) {
    // Comprobamos que existe un registro con los id del juego y de la cuenta
    $favorite = Favorite::where("account_id", $request->account)
      ->where("game_id", $request->game)
      ->first();

   if( isset($favorite) ) {
     $favorite->delete(); // Si existe lo eliminamos

   } else { // Si no existe creamos un registro
     $favorite = new Favorite;
     $favorite->account_id = $request->account;
     $favorite->game_id = $request->game;
     $favorite->save();
   }
  }

  public function show() {
    $favorites = Favorite::where("account_id", Auth::user()->account->id)
    ->get();

    $games = [];
    foreach ($favorites as $favorite) {
      $game = Game::find($favorite->game_id);
      array_push($games, $game);
    }

    return view("favorites.show", compact("games") );
  }

}
