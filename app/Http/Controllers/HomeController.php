<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use App\Category;

class HomeController extends Controller
{
  public function index() {
    $categories = Category::where("featured", true)->get();
    $publishedGames = Game::where("published", true)->get();
    $featuredGames = Game::where("published", true)->where("featured", true)->get();
    return view( "home", compact("categories", "publishedGames", "featuredGames") );
  }

}
