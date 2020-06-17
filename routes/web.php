<?php

use App\Game;
use App\Console;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

Auth::routes(['register' => false]);

/**
 * Normalt sätt så är utloggningen en POST.
 * Ta bort denna för att återgå till normalt.
 */
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    $games_count = Console::withCount(['games' => function($q){
        return $q->where('deleted_at','=', null);
    }])->get();
    $games_history = Game::whereHas('history')->orderBy('updated_at', 'desc')->limit(10)->get();
    return view('welcome', compact('games_history', 'games_count'));
})->name('welcome');

/*
ALTER TABLE games
ADD FOREIGN KEY (console_id) REFERENCES consoles_games(id);
*/

/**
 * Landing page for games
 */
Route::get('/nes', 'NesController@index')->name('nes');
Route::get('/snes', 'SnesController@index')->name('snes');
Route::get('/n64', 'N64Controller@index')->name('n64');
Route::get('/ngc', 'NgcController@index')->name('ngc');
Route::get('/gba', 'GbaController@index')->name('gba');
Route::get('/gbc', 'GbcController@index')->name('gbc');

/**
 * Enskilda spel-sida
 */
Route::prefix('g')->group(function () {
    Route::get('{game}', 'GameController@show')->name('game.show');
    Route::get('/edit/{game}', 'GameController@edit')->name('game.show.edit');
    Route::post('/edit/{game}/save', 'GameController@update')->name('game.save.edit');
});

/**
 * Om-sidan
 */
Route::get('om', function(){
    return view('om');
})->name('om');
