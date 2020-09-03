<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

Auth::routes(['register' => false]);

Route::get('/test', function(){
$games = [
];
# "id" => 19 // SNES
# "id" => 18 // NES
# "id" => 21 // NGC
# "id" => 4 // N64
# "id" => 24" //GBA
# "id" => 22 //GBC
$lista = [];
foreach($games as $game){
    $response = Http::withHeaders([
        'user-key' => '3e75e6c502e1f2ccfb06529bd77c363e'
    ])->withOptions([
    'body' => "
        search \"{$game}\";
        fields name, cover.url, popularity, platforms.abbreviation, rating;
        where platforms = (18,19,4,21,24,22);
        limit 1;
    "])
    ->get('https://api-v3.igdb.com/games')
    ->json();
    array_push($lista, $response);
}

    dd($lista);
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
 * USer
 */
Route::prefix('u')->group(function () {
    Route::get('/{user}', 'UserController@show')->name('user.show');
    Route::get('/{user}/edit', 'ProfileController@edit')->name('user.edit');
    Route::patch('/{user}/edit', 'ProfileController@update')->name('user.edit.update');
});

/**
 * Om-sidan
 */
Route::get('om', function(){
    return view('om');
})->name('om');

/**
 * Search
 */
Route::post('/search',function(Request $request){
    $q = $request->get('q');

    $games = \App\Game::where('title','LIKE','%'.$q.'%')->orWhere('developer','LIKE','%'.$q.'%')->with('console')->limit('20')->get();
    // array_walk_recursive($games, function(&$item) { $item = mb_convert_encoding($item, 'UTF-8', 'UTF-8'); });
    return view('search', compact('games'));

    // For later
    if(count($games)>0){
        return response()->json($games);
    }else{
        return response()->json(['error'=>'Inga spel funna. Försök igen.']);
    }
})->name('search.game');
