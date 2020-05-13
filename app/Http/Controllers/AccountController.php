<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Game;
use App\Category;
use Auth;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
  /**
   * Display the specified resource.
   *
   * @param  string  $name
   * @return \Illuminate\Http\Response
   */
  public function show($name)
  {
    $user = User::where("name", $name)->first();
    $games = Game::where("user_id", $user->id)->get();

    /* Guarda el nombre de  las categorías afectadas y elimina lass repetidas */
    $categories_name = [];
    foreach ($games as $game) {
      array_push($categories_name, $game->category->name);
    }
    $results = array_unique($categories_name);

    /* Guardo las categorías cuyo nombre coincida con las del array */
    $categories = [];
    foreach ($results as $result) {
      array_push($categories, Category::where( "name", $result)->first() );
    }

    // Comprueba si el usuario está logueado
    $aux = false;
    if ( Auth::user() && $user->id == Auth::user()->id ) {
      $aux = true;
    }

    return view( "account.show", compact("user", "games", "categories", "aux") );
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function edit()
  {
    $user = Auth::user();
    return view( "account.edit", compact("user") );
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
    $user = User::find($id);
    $imgPath = $user->img;
    $user->update( $request->all() );

    if ( $request->file("img") ) {
      Storage::disk("myDisk")->delete($imgPath);
      $file = $request->file("img");
      $path = Storage::disk("myDisk")->put("users", $file);
      $user->img = $path;
      $user->save();
    }

     return redirect( action("AccountController@show", $user->name) );
  }

}
