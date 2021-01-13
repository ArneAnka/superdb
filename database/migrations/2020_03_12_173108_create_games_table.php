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
            $table->string('title');
            $table->string('slug');
            $table->string('snes_central');
            $table->string('wikipedia_url');
            $table->string('emuparadise_url');
            $table->string('genre');
            $table->string('console');
            $table->string('developer');
            $table->string('publisher');
            $table->string('modes');
            $table->string('sweden_release');
            $table->string('japan_release');
            $table->string('usa_release');
            $table->string('cover_image');
            $table->string('header_image');
            $table->binary('data');
            $table->enum('unknown', ['battery', 'password', 'unsaveable']);
            $table->string('fingerprint');
            $table->string('import');
            $table->text('description');

            $table->softDeletes();
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
