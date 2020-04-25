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

// Route::resource("/games", "GamesController");

Route::get("/", "GamesController@home");
Route::get("/{nombre-juego}", "GamesController@show");

Route::get("/registrarse", "UsersController@create"); // Registrarse
Route::post("/registrarse", "UsersController@store"); 
Route::get("/iniciar-sesion", "UsersController@signin"); // Iniciar sesión
Route::get("/perfil/{id}", "UsersController@profile");

// Route::get('/post/{id}/{nombre}', function ($id, $nombre) {
//     return "Este es el post nº " . $id . " creado por " . $nombre;
// })->where ("nombre", "[a-z A-Z]+");
