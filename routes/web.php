<?php

use App\Game;
use App\Console;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

Auth::routes(['register' => false]);

/**
 * Normalt sätt så är utloggningen en POST.
 * (Ta bort denna för att återgå till normalt.)
 */
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    # Count games for each console
    $games_count = Console::withCount(['games' => function($q){
        return $q->where('deleted_at','=', null);
    }])->get();

    # Count all rows in DB
    $all_games_count = Game::withTrashed()->count();

    # Retrive the 10 last editet games
    $games_history = Game::with('console')->whereHas('history')->orderBy('updated_at', 'desc')->limit(10)->get();

    # Retrive Birthdays! :)
    // $date = date_create("2013-07-28");
    // $birthdays = Game::with('console')->releasedOn($date)->get();
    $birthdays = Game::releasedOnThisDay()->get();

    return view('welcome', compact('games_history', 'games_count', 'birthdays', 'all_games_count'));
})->name('welcome');

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
    Route::post('/edit/{game}/update', 'GameController@update')->name('game.update.edit');
    Route::post('/url/{game}/save', 'UrlController@store')->name('game.save.url');
});

/**
 * Om-sidan
 */
Route::get('om', function(){
    return view('om');
})->name('om');
