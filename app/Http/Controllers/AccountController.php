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

    // Comprueba si el usuario está logueado
    $aux = false;
    if ( Auth::user() && Auth::user()->id == $user->id) {
      $aux = true;
    }
    return view( "account.show", compact("account", "user", "aux") );
  }

  /**
   * Show the form for editing the specified user.
   *
   * @return \Illuminate\Http\Response
   */
  public function edit()
  {
    $user = Auth::user();
    $account = Account::where("id", $user->account->id)->first();
    return view( "account.edit", compact("user", "account") );
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
    $user = User::find($id);
    $account = Account::where("id", $user->account->id)->first();

    $imgPath = $account->img;
    $user->update([
      "name" => $request->name,
    ]);
    $account->update([
      "slug" => Str::slug($request->name),
      "desc" => $request->desc,
    ]);

    if ( $request->file("img") ) {
      if ( $imgPath != "users/default.webp" ) {
        Storage::disk("myDisk")->delete($imgPath);
      }
      $path = Storage::disk("myDisk")->put("users", $request->file("img"));
      $account->img = $path;
      $account->save();
      $user->save();
    }
    return redirect( action("AccountController@show", $account->slug) );
  }

}
