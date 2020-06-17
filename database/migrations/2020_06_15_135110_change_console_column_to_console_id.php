<?php

use App\Game;
use App\Console;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeConsoleColumnToConsoleId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // $consoles = [
        //     'nes' => 'Nintendo Entertainment System',
        //     'snes' => 'Super Nintendo Entertainment System',
        //     'n64' => 'Nintendo 64',
        //     'ngc' => 'Nintendo Game Cube',
        //     'gba' => 'Game Boy Advance',
        //     'gbc' => 'Game Boy Color',
        // ];

        // $games = Game::all();

        // foreach ($games as $key => $game) {
        //     if($game->console_id == "nes"){
        //         $game->console_id = 1;
        //     }elseif($game->console_id == "snes"){
        //         $game->console_id = 2;
        //     }elseif($game->console_id == "n64"){
        //         $game->console_id = 3;
        //     }elseif($game->console_id == "ngc"){
        //         $game->console_id = 4;
        //     }elseif($game->console_id == "gba"){
        //         $game->console_id = 5;
        //     }elseif($game->console_id == "gbc"){
        //         $game->console_id = 6;
        //     }
        //     $game->save();
        // }

        Schema::table('games', function (Blueprint $table) {
            $table->renameColumn('console', 'console_id');
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
