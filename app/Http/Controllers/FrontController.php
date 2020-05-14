<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use App\Category;

class FrontController extends Controller
{
  public function index() {
    // $games = Game::all();
    // $games = Game::orderBy("id", "DESC")->paginate(5);
    return view("home");
  }

  // public function showCategory($slug) {
  //   $category = Category::where("slug", $slug)->first();
  //   $games = $category->games;
  //   return view( "frontend.showCategory", compact("category", "games") );
  // }
  //
  // public function showCategories() {
  //   $categories = Category::all();
  //   return view( "frontend.showCategories", compact("categories") );
  // }
  //
  // public function showGame($slug)
  // {
  //   $game = Game::where("slug", $slug)->first();
  //   return view( "frontend.showGame", compact("game") );
  // }

}
