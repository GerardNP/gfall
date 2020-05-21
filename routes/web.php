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

// Home
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
Route::resource("/admin/games", "GameController")->except(["show", "create"])->middleware("auth");
Route::get("/myprofile/games/create", "GameController@create")->middleware("auth");
Route::get("/games/{game}", "GameController@show");
Route::get("/games", "GameController@showAll");
Route::get("/games-featured", "GameController@showFeatured");
Route::get("/profile/{slug}/games", "GameController@showAuthor");

// Puntuaciones
Route::get("/profile/{slug}/scores", "ScoreController@showAuthor");
Route::get("/games/{slug}/scores", "ScoreController@showGame");

// Auntenticación
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registro
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
