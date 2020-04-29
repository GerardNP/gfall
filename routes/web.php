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
Route::get("", "FrontController@index");
Route::get("game/{slug}", "FrontController@showGame");
Route::get("categories", "FrontController@showCategories");
Route::get("category/{slug}", "FrontController@showCategory");

// Categorías y Juegos - Acceso Restringido
Route::middleware(["auth"])->group(function () {
  Route::resource("/admin/categories", "CategoryController")->except("show");
  Route::resource("/admin/games", "GameController")->except("show");
});

// Laravel
Auth::routes();
Route::get("/welcome", function() {
    return view("welcome");
});
Route::get('/home', 'HomeController@index')->name('home');
