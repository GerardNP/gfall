<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Schema;
use App\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
      if ( Schema::hasTable("categories") ) {
        $auxCategories = Category::orderBy("name", "asc")->get();
        View::share("auxCategories", $auxCategories);
      }
    }
}
