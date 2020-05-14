<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use Auth;
use App\User;
use App\Account;
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
    $user = User::find(Auth::user()->id);
    $account = $user->account;
    $categories = Category::all();
    return view( "games.create", compact("user", "account", "categories") );
  }

  public function store(Request $request)
  {
    // Validación
    $rules = [
      "name" => "required|unique:games",
      "img" => "required|image",
    ];
    $messages = [
      "name.required" => "Es obligatorio rellenar este campo",
      "name.unique" => "Ya existe una categoría con ese nombre",
      "img.required" => "Es obligatorio subir un archivo",
      "img.image" => "Extensiones permitidas: jpeg, png, bmp, gif, svg o webp",
    ];
    $this->validate($request, $rules, $messages);

    $game = new Game( $request->all() );
    $game->slug = Str::slug($request->name);
    $game->published = false;
    $game->featured = false;
    $path = Storage::disk("myDisk")->put("img/games", $request->file("img"));
    $game->img = $path;
    $game->save();

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
      "name" => "required|unique:games",
      "img" => "image"
    ];
    $messages = [
      "name.required" => "Es obligatorio rellenar este campo",
      "name.unique" => "Ya existe una categoría con ese nombre",
      "img.image" => "Extensiones permitidas: jpeg, png, bmp, gif, svg o webp",
    ];
    $this->validate($request, $rules, $messages);

    $game = Game::find($id);
    $imgPath = $game->img;
    $game->update( $request->all() );
    $game->slug = Str::slug($request->name);
    $game->save();

    if ( $request->file("img") ) {
      Storage::disk("myDisk")->delete($imgPath);
      $path = Storage::disk("myDisk")->put("img/games", $request->file("img"));
      $game->img = $path;
      $game->save();
    }

    Session::flash("message", "Juego actualizado correctamente");
    return redirect( action("GameController@index") );
  }

  public function destroy($id)
  {
    $game = Game::find($id);
    $imgPath = $game->img;
    Storage::disk("myDisk")->delete($imgPath);
    $game->delete();

    Session::flash("message", "Juego eliminado correctamente");
    return redirect( action("GameController@index") );
  }
}
