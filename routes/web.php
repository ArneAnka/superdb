<?php

use App\Game;
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
    $games = Game::all();
    $nes_count = $games->where('console', 'nes')->count();
    $snes_count = $games->where('console', 'snes')->count();
    $n64_count = $games->where('console', 'n64')->count();
    $ngc_count = $games->where('console', 'ngc')->count();
    $gba_count = $games->where('console', 'gba')->count();
    $gbc_count = $games->where('console', 'gbc')->count();
    return view('welcome', compact('nes_count', 'snes_count', 'n64_count', 'ngc_count', 'gba_count', 'gbc_count'));
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
    Route::post('/edit/{game}/save', 'GameController@update')->name('game.save.edit');
});

/**
 * Om-sidan
 */
Route::get('om', function(){
    return view('om');
})->name('om');
