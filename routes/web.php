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
Route::get("/", "HomeController@index");

// Cuenta
Route::get("/profile/{slug}", "AccountController@show");
Route::middleware(["auth"])->group( function () {
  Route::get("/myprofile/edit", "AccountController@edit");
  Route::put("/myprofile/{id}", "AccountController@update");
});

// Categorías
Route::resource("/admin/categories", "CategoryController")->except("show")->middleware("auth");
Route::get("/categories/{category}", "CategoryController@show");

//Juegos
Route::resource("/admin/games", "GameController")->except("show")->middleware("auth");
Route::get("/games/{game}", "GameController@show");

// Puntuaciones
Route::get("/profile/{slug}/scores", "ScoreController@show");

// Auntenticación
Auth::routes();
