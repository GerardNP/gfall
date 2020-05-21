<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Session;
use Auth;
use Illuminate\Support\Facades\Gate;
use App\Game;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    // Muestra un CRUD de las categorías
  public function index() {
    $user = Auth::user();
    if ( Gate::allows("isAdmin", $user) ) {
      $categories = Category::orderBy("created_at", "desc")
      ->paginate(12);

      return view( "categories.index", compact("categories") );

    } else {
      Gate::authorize("isAdmin", $user);
    }
  }


  // Muestra los juegos de la categoría si existe esta
  public function show($slug) {
    $category = Category::where("slug", $slug)->first();

    if ( isset($category) ) {
      $games = Game::where("published", true)
      ->where("category_id", $category->id)
      ->orderBy("created_at", "desc")
      ->paginate(12);

      return view( "categories.show", compact("category", "games") );

    } else {
      return abort("404");
    }
  }


  // Acceso permitido solo a usuarios admin
  public function create() {
    $user = Auth::user();
    if ( Gate::allows("isAdmin", $user) ) {

      return view("categories.create");

    } else {
      Gate::authorize("isAdmin", $user);
    }
  }


  public function store(Request $request) {
    // Validación
    $rules = [
      "name" => "required|unique:categories",
      "img" => "required|image|max:1500",
    ];
    $messages = [
      "name.required" => "Es obligatorio rellenar este campo",
      "name.unique" => "Ya existe una categoría con ese nombre",
      "img.required" => "Es obligatorio subir un archivo",
      "img.image" => "Extensiones permitidas: jpeg, png, bmp, gif, svg o webp",
      "img.max" => "El archivo debe pesar menos de 1.5MB",
    ];
    $this->validate($request, $rules, $messages);

    $category = new Category( $request->all() );
    $category->slug = Str::slug($request->name);
    $category->featured = false;
    $path = Storage::disk("myDisk")->put("img/admin/categories", $request->file("img"));
    $category->img = $path;
    $category->save();

    Session::flash("message", "Categoría creada correctamente");
    return redirect( action("CategoryController@index") );
  }


  // Acceso permitido solo a usuarios admin
  public function edit($id) {
    $user = Auth::user();
    if ( Gate::allows("isAdmin", $user) ) {
      $category = Category::find($id);

      return view( "categories.edit", compact("category") );

    } else {
      Gate::authorize("isAdmin", $user);
    }
  }


  // Acceso permitido solo a usuarios admin
  public function update(Request $request, $id) {
    // Validación
    $rules = [
      "name" => ["required" , Rule::unique("categories", "name")->ignore($id)],
      "img" => ["image", "max:1500"],
    ];
    $messages = [
      "name.required" => "Es obligatorio rellenar este campo",
      "name.unique" => "Ya existe una categoría con ese nombre",
      "img.image" => "Extensiones permitidas: jpeg, png, bmp, gif, svg o webp",
      "img.max" => "El archivo debe pesar menos de 1.5MB",
    ];
    $this->validate($request, $rules, $messages);

    $category = Category::find($id);
    $imgPath = $category->img;
    $category->update( $request->all() );
    $category->slug = Str::slug($request->name);
    $category->save();

    if ( $request->file("img") ) {
      Storage::disk("myDisk")->delete($imgPath);
      $path = Storage::disk("myDisk")->put("img/admin/categories", $request->file("img"));
      $category->img = $path;
      $category->save();
    }

    Session::flash("message", "Categoría actualizada correctamente");
    return redirect( action("CategoryController@index") );
  }


  // Acceso permitido solo a usuarios admin
  public function destroy($id) {
    $category = Category::find($id);

    $games = $category->games;
    foreach ($games as $game) {
      Storage::disk("myDisk")->delete($game->img);
    }

    $imgPath = $category->img;
    Storage::disk("myDisk")->delete($imgPath);
    $category->delete();

    Session::flash("message", "Categoría eliminada correctamente");
    return redirect( action("CategoryController@index") );
  }

}
