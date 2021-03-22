<?php

use App\Game;
use App\Genre;
use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenresTableAndConvertGamesGenresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Fetch all genres from all of the games in the DB.
        // And make an unique array of those.
        $games = Game::withTrashed()->get();
        $games->each(function($game){
            $game->genre = DB::table('games_genres')->selectRaw('*')->where('id', '=', $game->genre_id)->first();
        });

        $uniqe_genre = [];
        foreach($games as $game){
            $genre_id = $game->genre_id;
            $genre = DB::table('games_genres')->selectRaw('*')->where('id', '=', $genre_id)->first();
            $split = explode(',', $genre->genre);
            $split = array_map('trim', $split);
            foreach($split as $content){
                array_push($uniqe_genre, $content);
            }
        }
        $uniqe_genre = array_unique($uniqe_genre);

        // Insert that uniqe array into `genres` table
        foreach($uniqe_genre as $genre){
            DB::table('genres')->insert([
                'genre' => $genre,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }

        // Drop foreign contraints and remove that column from games table
        Schema::table('games', function (Blueprint $table) {
            $table->dropForeign('games_ibfk_2');
        });
        Schema::table('games', function (Blueprint $table) {
            $table->dropColumn('genre_id');
        });

        foreach($games as $game){
            $split = explode(',', $game->genre->genre);
            $split = array_map('trim', $split);
            foreach($split as $content){
                $new_genre = DB::table('genres')->selectRaw('*')->where('genre', '=', $content)->first();
                DB::table('game_genre')->insert([
                    'game_id' => $game->id,
                    'genre_id' => $new_genre->id
                ]);
            }
        }

        // Drop the old `games_genres` table
        Schema::dropIfExists('games_genres');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games_genres');
        Schema::dropIfExists('genres');
        Schema::table('games', function (Blueprint $table) {
            $table->foreignId('genre_id')->after('console_id')->constrained();
        });
    }
}
