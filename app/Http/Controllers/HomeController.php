<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use App\Category;

class HomeController extends Controller
{

  public function index() {
    $categories = Category::where("featured", true)
      ->take(8)
      ->get();

    $publishedGames = Game::where("published", true)
      ->take(12)
      ->orderBy("created_at", "desc")
      ->get();

    $featuredGames = Game::where("published", true)
      ->where("featured", true)
      ->take(6)
      ->orderBy("updated_at", "desc")
      ->get();

    return view( "home", compact("categories", "publishedGames", "featuredGames") );
  }

}
