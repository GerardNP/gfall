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

// Front - Acceso Público
Route::get("/", function() {
  return view("home");
});

// Cuenta
Route::get("/profile/{slug}", "AccountController@show");
Route::middleware(["auth"])->group( function () {
  Route::get("/myprofile/edit", "AccountController@edit");
  Route::put("/myprofile/{id}", "AccountController@update");
});

// Categorías
Route::resource("/admin/categories", "CategoryController")->except("show")->middleware("auth");
Route::get("/admin/categories/{category}", "CategoryController@show");

//Juegos
Route::resource("/admin/games", "GameController")->except("show")->middleware("auth");
Route::get("/admin/games/{game}", "GameController@show");

// // Puntuaciones - Acceso Restringido
// Route::middleware(["auth"])->group(function() {
//   Route::get("/scores", "RegisteredController@showScores");
// });

// Auntenticación
Auth::routes();
