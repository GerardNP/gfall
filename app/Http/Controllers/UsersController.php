<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function create()
    {
      return view("users.signup");
    }

    public function store(Request $request) //$request es un array
    {
      $user = $request->all();
      $user["password"] = bcrypt($request->password);
      User::create($user); //create pide como argumento un array
      return redirect("/");
    }

    public function signin()
    {
      return view("users.signin");
    }

    public function profile($id)
    {
      $user = User::find($id);
      return view( "users.profile", compact("user") );
    }
}
