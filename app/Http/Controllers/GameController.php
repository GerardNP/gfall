<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use App\User;
use Auth;
use App\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Session;

class GameController extends Controller
{
  public function index()
  {
    $games = Game::all();
    return view( "games.index", compact("games") );
  }

  public function create()
  {
    $user = User::find(Auth::User()->id);
    $categories = Category::all();
    return view( "games.create", compact("user", "categories") );
  }

  public function store(Request $request)
  {
    // Validación
    $rules = [
      "title" => "required",
      "image" => "required | mimes:jpeg,bmp,png,jpg,gif|max:1000",
      "description" => "required"
    ];

    $messages = [
      "title.required" => "Es obligatorio rellenar este campo",
      "description.required" => "Es obligatorio rellenar este campo",
      "image.required" => "Es obligatorio seleccionar una imagen",
      "image.mimes" => "El archivo debe tener un formato de imagen",
      "image.max" => "La imagen no debe ser mayor que 1MB",
    ];

    $this->validate($request, $rules, $messages);

    $game = new Game( $request->all() );
    $game->slug = Str::slug($request->title);
    $game->save();

    if ( $request->file("image") ) {
      $nombre = Storage::disk('imgGames')->put("imagenes/games", $request->file("image") );
      $game->fill( ["image" => asset($nombre)] )->save();
    }

    Session::flash("message", "Juego creado correctamente");
    return redirect( action("GameController@index") );
  }

  public function edit($id)
  {
    $game = Game::find($id);
    $categories = Category::all();
    return view( "games.edit", compact("game", "categories") );
  }

  public function update(Request $request, $id)
  {
    // Validación
    $rules = [
      "title" => "required",
      "image" => "mimes:jpeg,bmp,png,jpg,gif|max:1000",
      "description" => "required"
    ];

    $messages = [
      "title.required" => "Es obligatorio rellenar este campo",
      "description.required" => "Es obligatorio rellenar este campo",
      "image.mimes" => "El archivo debe tener un formato de imagen",
      "image.max" => "La imagen no debe ser mayor que 1MB",
    ];

    $this->validate($request, $rules, $messages);

    $game = Game::find($id);
    $game->slug = Str::slug($request->title);
    $game->update( $request->all() );

    if ( $request->file("image") ) {
      $nombre = Storage::disk('imgGames')->put("imagenes/games", $request->file("image") );
      $game->fill( ["image" => asset($nombre)] )->save();
    }

    Session::flash("message", "Juego actualizado correctamente");
    return redirect( action("GameController@index") );
  }

  public function destroy($id)
  {
    $game = Game::find($id)->delete();

    Session::flash("message", "Juego eliminado correctamente");
    return redirect( action("GameController@index") );
  }
}
