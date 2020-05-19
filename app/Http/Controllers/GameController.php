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
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class GameController extends Controller
{
  public function index() // Acceso restringido a usuarios admin
  {
    $user = Auth::user();
    if ( Gate::allows("isAdmin", $user)) {
      $games = Game::paginate(12);
      return view( "games.index", compact("games") );
      
    } else {
      Gate::authorize("isAdmin", $user);
    }
  }

  public function show($slug)
  {
    $game = Game::where("slug", $slug)->first();
    return view( "games.show", compact("game") );
  }

  public function showFeatured()
  {
    $games = Game::where("published", true)->where("featured", true)->paginate(12);
    return view( "games.showFeatured", compact("games") );
  }

  public function showAll()
  {
    $games = Game::where("published", true)->paginate(12);
    return view( "games.showAll", compact("games") );
  }

  public function showAuthor($slug)
  {
    $account = Account::where("slug", $slug)->first();
    $games = Game::where("published", true)->where("account_id", $account->id)->paginate(12);
    return view( "games.showAuthor", compact("games", "account") );
  }

  public function create($slug) // Acceso restringido a usuarios
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
      "category_id" => "required",
      "name" => "required|unique:games",
      "img" => "required|image|max:1500",
    ];
    $messages = [
      "category_id.required" => "Es obligatorio seleccionar una categoría",
      "name.required" => "Es obligatorio rellenar este campo",
      "name.unique" => "Ya existe una categoría con ese nombre",
      "img.required" => "Es obligatorio subir un archivo",
      "img.image" => "Extensiones permitidas: jpeg, png, bmp, gif, svg o webp",
      "img.max" => "El archivo debe pesar menos de 1.5MB",
    ];
    $this->validate($request, $rules, $messages);

    $game = new Game( $request->all() );
    $game->slug = Str::slug($request->name);
    $game->published = false;
    $game->featured = false;
    $path = Storage::disk("myDisk")->put("img/games", $request->file("img"));
    $game->img = $path;
    $game->save();

    Session::flash("message", "Juego enviado correctamente");
    return redirect( action("AccountController@show", $game->account->slug) );
  }

  public function edit($id) // Acceso restringido a usuarios admin
  {
    $user = Auth::user();
    if ( Gate::allows("isAdmin", $user)) {
      $game = Game::find($id);
      $categories = Category::all();
      return view( "games.edit", compact("game", "categories") );

    } else {
      Gate::authorize("isAdmin", $user);
    }
  }

  public function update(Request $request, $id) // Acceso restringido a usuarios admin
  {
    // Validación
    $rules = [
      "name" => ["required" , Rule::unique("games", "name")->ignore($id)],
      "img" => ["image", "max:1500"],
    ];
    $messages = [
      "name.required" => "Es obligatorio rellenar este campo",
      "name.unique" => "Ya existe un juego con ese nombre",
      "img.image" => "Extensiones permitidas: jpeg, png, bmp, gif, svg o webp",
      "img.max" => "El archivo debe pesar menos de 1.5MB",
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

  public function destroy($id) // Acceso restringido a usuarios admin
  {
    $game = Game::find($id);
    $imgPath = $game->img;
    Storage::disk("myDisk")->delete($imgPath);
    $game->delete();

    Session::flash("message", "Juego eliminado correctamente");
    return redirect( action("GameController@index") );
  }
}
