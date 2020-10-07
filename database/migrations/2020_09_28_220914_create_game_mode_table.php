<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameModeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_mode', function (Blueprint $table) {
            $table->id();
            $table->integer('game_id')->unsigned();
            $table->bigInteger('mode_id')->unsigned();
            $table->timestamps();
        });
       Schema::table('game_mode', function($table) {
            $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');
            $table->foreign('mode_id')->references('id')->on('modes')->onDelete('cascade');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('game_mode');
    }
}
