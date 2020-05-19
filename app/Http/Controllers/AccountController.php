<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Account;
use Illuminate\Support\Str;
use App\Game;
use App\Category;
use Auth;
use Illuminate\Support\Facades\Storage;
use Session;
use Illuminate\Validation\Rule;

class AccountController extends Controller
{
  /**
   * Display the specified user.
   *
   * @param  string  $slug
   * @return \Illuminate\Http\Response
   */
  public function show($slug)
  {
    $account = Account::where("slug", $slug)->first();
    $user = User::where("account_id", $account->id)->first();
    $games = Game::where("account_id", $account->id)->where("published", true)->get();

    /* Guarda el nombre de  las categorías afectadas y elimina lass repetidas */
    $categories_name = [];
    foreach ($games as $game) {
      array_push($categories_name, $game->category->name);
    }
    $results = array_unique($categories_name);
    $games = Game::where("account_id", $account->id)->where("published", true)->limit(6)->get();

    /* Guardo las categorías cuyo nombre coincida con las del array */
    $categories = [];
    foreach ($results as $result) {
      array_push($categories, Category::where( "name", $result)->first() );
    }

    // Comprueba si el usuario está logueado y si es su perfil
    $aux = false;
    if ( Auth::user() && Auth::user()->id == $user->id) {
      $aux = true;
    }

    return view( "account.show", compact("account", "user", "aux", "games", "categories") );
  }

  /**
   * Show the form for editing the specified user.
   *
   * @return \Illuminate\Http\Response
   */
  public function edit()
  {
    $account = Account::where("id", Auth::user()->account->id)->first();
    return view( "account.edit", compact("account") );
  }

  /**
   * Update the specified user in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $account = Account::find($id);
    $user = $account->user->id;
    $rules = [
      "name" => ["required" , Rule::unique("users", "name")->ignore($user)],
      "img" => ["image", "max:1500"],
    ];
    $messages = [
      "name.required" => "Es obligatorio rellenar este campo",
      "name.unique" => "Ya existe un usuario con ese nombre",
      "img.image" => "Extensiones permitidas: jpeg, png, bmp, gif, svg o webp",
      "img.max" => "El archivo debe pesar menos de 1.5MB",
    ];
    $this->validate($request, $rules, $messages);

    $imgPath = $request->img;
    $account->user->update( ["name" => $request->name] );
    $account->update([
      "slug" => Str::slug($request->name),
      "desc" => $request->desc,
    ]);

    if ( $request->file("img") ) {
      if ( $imgPath != "not-profile.svg" ) {
        Storage::disk("myDisk")->delete($imgPath);
      }
      $path = Storage::disk("myDisk")->put("img/admin/", $request->file("img"));
      $account->img = $path;
      $account->save();
    }
    Session::flash("message", "Perfil actualizado correctamente");
    return redirect( action("AccountController@show", $account->slug) );
  }

}
