<?php

use App\Game;
use App\Genre;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeGenreColumnToGenreId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $games = Game::all();

        foreach ($games as $key => $game) {
            $genre = Genre::where('genre', $game->genre)->first();
            if(!$genre){
                $unknown_id = Genre::where('genre', 'unknown')->first();
                $game->genre = $unknown_id->id;
            }else{
                $game->genre = $genre->id;
            }
            $game->save();
        }

        Schema::table('games', function (Blueprint $table) {
            $table->renameColumn('genre', 'genre_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('games', function (Blueprint $table) {
            //
        });
    }
}
