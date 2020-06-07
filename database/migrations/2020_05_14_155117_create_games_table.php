<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('games', function (Blueprint $table) {
        $table->id();
        $table->string("name")->unique();
        $table->string("slug");
        $table->text("desc")->nullable();
        $table->string("img");
        $table->boolean("published");
        $table->boolean("featured");

        $table->foreignId("account_id")->constrained()->onDelete("cascade");
        $table->foreignId("category_id")->constrained()->onDelete("cascade");
        $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('games');
    }
}
