<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

Auth::routes(['register' => false]);

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
Route::get('/gb', 'GbController@index')->name('gb');
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
    # Comments
    Route::post('/{game}/comment/save', 'GameCommentController@store')->middleware(['auth'])->name('game.save.comment');
    Route::get('/{game}/comment/{comment}/delete', 'GameCommentController@destroy')->middleware(['auth'])->name('game.destory.comment');
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
    Route::get('/show/{post}', 'PostController@show')->name('post.show');
    # Comments
    Route::post('/{post}/comment/save', 'PostCommentController@store')->middleware(['auth'])->name('post.save.comment');
    Route::get('/{post}/comment/{comment}/delete', 'PostCommentController@destroy')->middleware(['auth'])->name('post.destory.comment');
});

/**
 * User
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
 * Integritetspolicy
 */
Route::get('tos', function(){
    return view('tos');
})->name('tos');

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
