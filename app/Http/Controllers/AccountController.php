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
  // Muestra el perfil del usuario si este existe
  public function show($slug) {
    $account = Account::where("slug", $slug)->first();
    if ( isset($account) ) {
      $games = Game::where("account_id", $account->id)
      ->where("published", true)
      ->limit(6)
      ->get();

      // Comprueba si el usuario está logueado y si es su perfil
      $aux = false;
      if ( Auth::user() && Auth::user()->id == $account->user->id) {
        $aux = true;
      }

      return view( "account.show", compact("account", "aux", "games") );

    } else {
      return abort("404");
    }
  }


  // Edita el perfil del usuario registrado, si este está logueado
  public function edit() {
    $account = Account::where("id", Auth::user()->account->id)->first();

    return view( "account.edit", compact("account") );
  }


  //
  public function update(Request $request, $id) {
    $account = Account::find($id);
    $user = $account->user->id;
    $rules = [
      "name" => ["required" , Rule::unique("users", "name")->ignore($user),
        "regex:/^[a-zA-Z]* ?([a-zA-Z]*)?$/"],
      "img" => ["image", "max:1500"],
    ];
    $messages = [
      "name.required" => "Es obligatorio rellenar este campo",
      "name.unique" => "Ya existe un usuario con ese nombre",
      "img.image" => "Extensiones permitidas: jpeg, png, bmp, gif, svg o webp",
      "img.max" => "El archivo debe pesar menos de 1.5MB",
    ];
    $this->validate($request, $rules, $messages);

    $imgPath = $account->img;
    $account->user->update( ["name" => $request->name] );
    $account->update([
      "slug" => Str::slug($request->name),
      "desc" => $request->desc,
    ]);

    if ( $request->file("img") ) {
      if ( $imgPath != "img/users/not-profile.svg" ) {
        Storage::disk("myDisk")->delete($imgPath);
      }
      $path = Storage::disk("myDisk")->put("img/users/", $request->file("img"));
      $account->img = $path;
      $account->save();
    }
    Session::flash("message", "Perfil actualizado correctamente");
    return redirect( action("AccountController@show", $account->slug) );
  }

}
