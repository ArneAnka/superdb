<?php

use App\Game;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesUrlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games_urls', function (Blueprint $table) {
            $table->id();
            $table->integer('game_id')->unsigned();
            $table->string('host');
            $table->string('url');
            $table->timestamps();

            $table->foreign('game_id')->references('id')->on('games');
        });

        $games = Game::all();

        $urls = new stdClass;
        foreach ($games as $key => $game) {
            $urls->{$game->id} = new stdClass;

            if($game->wikipedia_url){
                $urls->{$game->id}->wikipedia_url = new stdClass;
                $urls->{$game->id}->wikipedia_url = $game->wikipedia_url;
            }
            if($game->snes_central){
                $urls->{$game->id}->snes_central = new stdClass;
                $urls->{$game->id}->snes_central = $game->snes_central;
            }
            if($game->emuparadise_url){
                $urls->{$game->id}->emuparadise_url = new stdClass;
                $urls->{$game->id}->emuparadise_url = $game->emuparadise_url;
            }
        }

        foreach($urls as $id => $url){
            foreach($url as $key => $value){
               DB::table('games_urls')->insert([
                    'game_id' => $id,
                    'host' => $key,
                    'url' => $value,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            }
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('game_urls');
    }
}
