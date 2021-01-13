<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeveloperGameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('developer_game', function (Blueprint $table) {
            $table->id();
            $table->foreignId('game_id');
            $table->foreignId('developer_id');
            $table->timestamps();
        });
       Schema::table('developer_game', function($table) {
            $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');
            $table->foreign('developer_id')->references('id')->on('developers')->onDelete('cascade');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('developer_game');
    }
}
