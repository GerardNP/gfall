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

// Front
Route::get("", "FrontController@index");
Route::get("game/{slug}", "FrontController@show");

//Categorías
Route::middleware(["auth"])->group(function () {
  Route::resource("/categories", "CategoryController");
  Route::resource("/games", "GamesController");
});

// Laravel
Auth::routes();
Route::get("/welcome", function() {
    return view("welcome");
});
Route::get('/home', 'HomeController@index')->name('home');
