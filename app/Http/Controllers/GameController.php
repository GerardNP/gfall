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
use App\Favorite;

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
      $favorite = null;
      if ( Auth::user() ) {
        $favorite = Favorite::where("game_id", $game->id)
          ->where("account_id", Auth::user()->account->id)
          ->first();

        if ( isset($favorite) ) {
          $favorite = true;
        } else {
          $favorite = false;
        }
      }
      return view( "games.show", compact("game", "favorite") );

    } else {
      return abort("404");
    }
  }


  // Muestra los juegos destacados
  public function showFeatured() {
    $games = Game::where("published", true)
    ->where("featured", true)
    ->orderBy("updated_at", "desc");

    $results = count( $games->get() );

    $games = $games->paginate(12);

    return view( "games.showFeatured", compact("games", "results") );
  }


  // Muestra todos los juegos publicados
  public function showAll() {
    $games = Game::where("published", true)
    ->orderBy("created_at", "desc");

    $results = count( $games->get() );

    $games = $games->paginate(12);

    return view( "games.showAll", compact("games", "results") );
  }


  // Muestra los juegos publicados de un usuario registrado
  public function showAuthor($slug) {
    $account = Account::where("slug", $slug)->first();
    if ( isset($account) ) {
      $games = Game::where("published", true)
      ->where("account_id", $account->id);

      $results = count( $games->get() );

      $games = $games->paginate(12);

      return view( "games.showAuthor", compact("games", "account", "results") );

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
      "category_id" => "required",
      "name" => "required |unique:games",
      "img" => "required|image|max:1500",
      "files" => "required|array",
      "files.*" => "mimes:html,txt,jpeg,png,bmp,gif,svg,webp",
    ];
    $messages = [
      "category_id.required" => "Es obligatorio seleccionar una categoría",
      "name.required" => "Es obligatorio rellenar este campo",
      "name.regex" => "Solo se permiten caracteres alfabéticos y un espacio",
      "name.unique" => "Ya existe una categoría con ese nombre",
      "img.required" => "Es obligatorio subir un archivo",
      "img.image" => "Extensiones permitidas: jpeg, png, bmp, gif, svg o webp",
      "img.max" => "El archivo debe pesar menos de 1.5MB",
      "files.required" => "Es obligatorio subir algún archivo",
      "files.*.mimetypes" => "Solo ficheros HTML, CSS, JS e imágenes",
    ];
    $this->validate($request, $rules, $messages);

    $game = new Game( $request->all() );
    $game->slug = Str::slug($request->name);
    $game->published = false;
    $game->featured = false;
    $game->has_score = false;
    $pathImg = Storage::disk("myDisk")->put("img/games", $request->file("img"));
    $game->img = $pathImg;

    /* Como el id no se establece hasta que se guarda el registro, le introduzco un valor
    en la columna files para evitar errores, guardo el registro y después cojo el id */
    $game->files = "default";
    $game->save();

    $zip = new \ZipArchive();
    $zip->open("file/games/".$game->id.".zip", \ZipArchive::CREATE);
    foreach ($request->file("files") as $file) {
      $nameFile = $file->getClientOriginalName();
      $pathFile = Storage::disk("myDisk")->putFileAs("file/games/".$game->id, $file, $nameFile);
      $zip->addFile($pathFile, $nameFile);
    }
    $zip->close();
    Storage::disk("myDisk")->deleteDirectory("file/games/".$game->id);
    $game->files = "file/games/".$game->id.".zip";
    $game->save();

    Session::flash("message", "Juego enviado correctamente");
    return redirect( action("AccountController@show", $game->account->slug) );
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
      "files.*" => "mimes:txt,jpeg,png,bmp,gif,svg,webp",
      "img" => ["image", "max:1500"],
    ];
    $messages = [
      "name.required" => "Es obligatorio rellenar este campo",
      "name.unique" => "Ya existe un juego con ese nombre",
      "files.*.mimetypes" => "Solo ficheros HTML, CSS, JS e imágenes",
      "img.image" => "Extensiones permitidas: jpeg, png, bmp, gif, svg o webp",
      "img.max" => "El archivo debe pesar menos de 1.5MB",
    ];
    $this->validate($request, $rules, $messages);

    $game = Game::find($id);
    $imgPath = $game->img;
    $game->update( $request->all() );
    $game->slug = Str::slug($request->name);
    $game->save();

    /* ARCHIVOS */
    if ( $request->hasFile("files") ) {
      Storage::disk("myDisk")->delete($game->files);

      $zip = new \ZipArchive();
      $zip->open("file/games/".$game->id.".zip", \ZipArchive::CREATE);
      foreach ($request->file("files") as $file) {
        $nameFile = $file->getClientOriginalName();
        $pathFile = Storage::disk("myDisk")->putFileAs("file/games/".$game->id, $file, $nameFile);
        $zip->addFile($pathFile, $nameFile);
      }
      $zip->close();
      Storage::disk("myDisk")->deleteDirectory("file/games/".$game->id);
      $game->files = "file/games/".$game->id.".zip";
      $game->save();
    }

    /* IMAGEN */
    if ( $request->file("img") ) {
      Storage::disk("myDisk")->delete($imgPath);
      $path = Storage::disk("myDisk")->put("img/games", $request->file("img"));
      $game->img = $path;
      $game->save();
    }

    /* DESCOMPRIMIR ARCHIVOS */
    if ( $game->published == true ) {
      $zip = new \ZipArchive();
      $zip->open($game->files);
      $zip->extractTo("file/games/".$game->id."/");
      $zip->close();
    }

    Session::flash("message", "Juego actualizado correctamente");
    return redirect( action("GameController@index") );
  }


  // Acceso permitido solo a usuarios admins
  public function destroy($id) {
    $game = Game::find($id);
    Storage::disk("myDisk")->delete($game->img);
    Storage::disk("myDisk")->delete($game->files);
    Storage::disk("myDisk")->deleteDirectory("file/games/".$game->id);
    $game->delete();

    Session::flash("message", "Juego eliminado correctamente");
    return redirect( action("GameController@index") );
  }


  // Descarga el archivo pasado por parámetro
  public function downloadFiles(Request $request) {
    $game = Game::find($request->id);
    return Storage::disk("myDisk")->download($game->files);
  }

}
