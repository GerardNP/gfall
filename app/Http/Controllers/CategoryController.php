<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Session;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
  public function index()
  {
    $categories = Category::all();
    return view( "categories.index", compact("categories") );
  }

  public function create()
  {
    return view("categories.create");
  }

  public function store(Request $request)
  {
    // Validación
    $rules = [
      "name" => "required",
    ];

    $messages = [
      "name.required" => "Es obligatorio rellenar este campo"
    ];

    $this->validate($request, $rules, $messages);

    $category = new Category( $request->all() );
    $category->slug = Str::slug($request->name);
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
      "name" => "required",
    ];

    $messages = [
      "name.required" => "Es obligatorio rellenar este campo"
    ];

    $this->validate($request, $rules, $messages);

    $category = Category::find($id);
    $category->update($request->all());
    Session::flash("message", "Categoría actualizada correctamente");
    return redirect( action("CategoryController@index") );
  }

  public function destroy($id)
  {
    Category::find($id)->delete();
    Session::flash("message", "Categoría eliminada correctamente");
    return redirect( action("CategoryController@index") );
  }
}
