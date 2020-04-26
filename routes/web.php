<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Juegos
Route::resource("/games", "GamesController")->only(["index", "show"]);

//Categorías
Route::middleware(["auth"])->group(function () {
  Route::resource("categories", "CategoryController");
});


// // Registro de usuarios
// Route::get("/signup", "UsersController@create")->name("users.create");
// Route::post("/signup", "UsersController@store")->name("users.store");
//
// // Inicio de sesión
// Route::get("/login", "UsersController@login")->name("users.login");
//
// // Perfil
// Route::get("/profile/{id}", "UsersController@show")->name("users.show");
//
// // Editar datos del perfil
// Route::get("/profile/{id}/edit", "UsersController@edit")->name("users.edit");
// Route::put("/profile/{id}", "UsersController@update")->name("users.update");

Auth::routes();
Route::get("/", function() {
    return view("welcome");
});
Route::get('/home', 'HomeController@index')->name('home');
