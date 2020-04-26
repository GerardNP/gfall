<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $categories = Category::all();
      return view("categories.index", compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("categories.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

      Category::create($request->all());
      Session::flash("message", "Categoría creada correctamente");
      return redirect( action("CategoryController@index") );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $category = Category::find($id);
      return view( "categories.edit", compact("category") );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Category::find($id)->delete();
      Session::flash("message", "Categoría eliminada correctamente");
      return redirect( action("CategoryController@index") );
    }
}
