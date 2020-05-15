<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Session;

class CategoryController extends Controller
{
  public function index()
  {
    $categories = Category::all();
    return view( "categories.index", compact("categories") );
  }

  public function show($slug) {
    $category = Category::where("slug", $slug)->first();
    $games = $category->games->where("published", true);
    return view( "categories.show", compact("category", "games") );
  }

  public function create()
  {
    return view("categories.create");
  }

  public function store(Request $request)
  {
    // Validación
    $rules = [
      "name" => "required|unique:categories",
      "img" => "required|image",
    ];
    $messages = [
      "name.required" => "Es obligatorio rellenar este campo",
      "name.unique" => "Ya existe una categoría con ese nombre",
      "img.required" => "Es obligatorio subir un archivo",
      "img.image" => "Extensiones permitidas: jpeg, png, bmp, gif, svg o webp",
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

  public function edit($id)
  {
    $category = Category::find($id);
    return view( "categories.edit", compact("category") );
  }

  public function update(Request $request, $id)
  {
    // Validación
    $rules = [
      "name" => "required|unique:categories",
      "img" => "image"
    ];
    $messages = [
      "name.required" => "Es obligatorio rellenar este campo",
      "name.unique" => "Ya existe una categoría con ese nombre",
      "img.image" => "Extensiones permitidas: jpeg, png, bmp, gif, svg o webp",
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

  public function destroy($id)
  {
    $category = Category::find($id);
    $imgPath = $category->img;
    Storage::disk("myDisk")->delete($imgPath);
    $category->delete();

    Session::flash("message", "Categoría eliminada correctamente");
    return redirect( action("CategoryController@index") );
  }
}
