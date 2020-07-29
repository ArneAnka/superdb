<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

Auth::routes(['register' => false]);

Route::get('/test', function(){
    $games = App\Game::with(['releases'=> function($q){
        return $q->where('pcb', '=', NULL)->get();
    }])
    ->where('console_id', 2)
    ->get();

    return view('test', compact('games'));
});

/**
 * Normalt sätt så är utloggningen en POST.
 * (Ta bort denna för att återgå till normalt.)
 */
Route::get('/logout', 'Auth\LoginController@logout');

# Landing page
Route::get('/', 'WelcomeController@index')->name('welcome');

# Landing page for logged in users
Route::get('/home', 'HomeController@index')->name('home');

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
 * Post
 */
Route::prefix('post')->group(function () {
    Route::get('/', 'PostController@create')->name('post.create');
    Route::get('/edit/{post}', 'PostController@edit')->name('post.edit');
    Route::post('/url/save', 'PostController@store')->name('post.store');
    Route::post('/edit/{post}/update', 'PostController@update')->name('post.update');
    Route::get('/delete/{post}', 'PostController@destroy')->name('post.delete');
});

/**
 * Om-sidan
 */
Route::get('om', function(){
    return view('om');
})->name('om');
