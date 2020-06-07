<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('scores', function (Blueprint $table) {
        $table->id();
        $table->foreignId("account_id")->constrained()->onDelete("cascade");
        $table->foreignId("game_id")->constrained()->onDelete("cascade");
        $table->integer("score");
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
        Schema::dropIfExists('scores');
    }
}
