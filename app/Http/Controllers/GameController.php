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
  // Muestra un CRUD (excepto create) de los juegos accesible, solo para admins
  public function index() {
    $user = Auth::user();
    if ( Gate::allows("isAdmin", $user)) {
      $games = Game::orderBy("created_at", "desc")
      ->paginate(12);

      return view( "games.index", compact("games") );

    } else {
      Gate::authorize("isAdmin", $user);
    }
  }


  // Muestra la vista del juego solo si existe o está publicado.
  public function show($slug) {
    $game = Game::where("slug", $slug)
    ->where("published", true)
    ->first();

    if ( isset($game) ) {
      return view( "games.show", compact("game") );

    } else {
      return abort("404");
    }
  }


  // Muestra los juegos destacados
  public function showFeatured() {
    $games = Game::where("published", true)
    ->where("featured", true)
    ->orderBy("updated_at", "desc")
    ->paginate(12);

    return view( "games.showFeatured", compact("games") );
  }


  // Muestra todos los juegos publicados
  public function showAll() {
    $games = Game::where("published", true)
    ->orderBy("created_at", "desc")
    ->paginate(12);

    return view( "games.showAll", compact("games") );
  }


  // Muestra los juegos publicados de un usuario registrado
  public function showAuthor($slug) {
    $account = Account::where("slug", $slug)->first();
    if ( isset($account) ) {
      $games = Game::where("published", true)
      ->where("account_id", $account->id)
      ->paginate(12);

      return view( "games.showAuthor", compact("games", "account") );

    } else {
      return abort("404");
    }
  }

  // Acceso permitido a todos los usuarios registrados
  public function create() {
    $user = User::find(Auth::user()->id);
    $categories = Category::all();

    return view( "games.create", compact("user", "categories") );
  }


  public function store(Request $request) {
    // Validación
    $rules = [
      // "category_id" => "required",
      // "name" => "required |unique:games",
      // "img" => "required|image|max:1500",
      "files" => "required|array",
      "files.*" => "mimes:html,css,js",

    ];
    $messages = [
      // "category_id.required" => "Es obligatorio seleccionar una categoría",
      // "name.required" => "Es obligatorio rellenar este campo",
      // "name.regex" => "Solo se permiten caracteres alfabéticos y un espacio",
      // "name.unique" => "Ya existe una categoría con ese nombre",
      // "img.required" => "Es obligatorio subir un archivo",
      // "img.image" => "Extensiones permitidas: jpeg, png, bmp, gif, svg o webp",
      // "img.max" => "El archivo debe pesar menos de 1.5MB",
      "files.required" => "Es obligatorio subir algún archivo",
      "files.*.mimes" => "NOP",
    ];
    $this->validate($request, $rules, $messages);

    print_r($request->files);

    // $game = new Game( $request->all() );
    // $game->slug = Str::slug($request->name);
    // $game->published = false;
    // $game->featured = false;
    // $pathImg = Storage::disk("myDisk")->put("img/games", $request->file("img"));
    // $game->img = $pathImg;
    // foreach ($request->file("files") as $file) {
    //   $pathFile = Storage::disk("myDisk")->put("file/games/".$game->id, $file);
    //   print_r($pathFile);
    // }
    // $game->file = $pathFile;
    // $game->save();


    // Session::flash("message", "Juego enviado correctamente");
    // return redirect( action("AccountController@show", $game->account->slug) );
  }


  // Acceso permitido solo a admins
  public function edit($id) {
    $user = Auth::user();
    if ( Gate::allows("isAdmin", $user)) {
      $game = Game::find($id);
      $categories = Category::all();

      return view( "games.edit", compact("game", "categories") );

    } else {
      Gate::authorize("isAdmin", $user);
    }
  }


  public function update(Request $request, $id) {
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


  // Acceso permitido solo a usuarios admins
  public function destroy($id) {
    $game = Game::find($id);
    $imgPath = $game->img;
    Storage::disk("myDisk")->delete($imgPath);
    $game->delete();

    Session::flash("message", "Juego eliminado correctamente");
    return redirect( action("GameController@index") );
  }

}
