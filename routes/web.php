<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/test', function(){
    //
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
Route::get('/gb', 'GbController@index')->name('gb');
Route::get('/gba', 'GbaController@index')->name('gba');
Route::get('/gbc', 'GbcController@index')->name('gbc');

/**
 * Enskilda spel-sida
 */
Route::prefix('g')->group(function () {
    Route::get('{game}', 'GameController@show')->name('game.show');
    Route::get('/edit/{game}', 'GameController@edit')->middleware(['auth'])->name('game.show.edit');
    Route::post('/edit/{game}/update', 'GameController@update')->middleware(['auth'])->name('game.update.edit');
    # Url management
    Route::get('/url/{game}/create', 'UrlController@create')->middleware(['auth'])->name('game.create.url');
    Route::get('/url/{url}/destroy', 'UrlController@destroy')->middleware(['auth'])->name('game.destroy.url');
    Route::post('/url/{game}/save', 'UrlController@store')->middleware(['auth'])->name('game.save.url');
    # Comments
    Route::post('/{game}/comment/save', 'GameCommentController@store')->middleware(['auth'])->name('game.save.comment');
    Route::get('/{game}/comment/{comment}/delete', 'GameCommentController@destroy')->middleware(['auth'])->name('game.destory.comment');
    # Release
    Route::get('/{game}/release/{release}', 'ReleaseController@edit')->name('game.release.edit');
    Route::put('/{game}/release/{release}', 'ReleaseController@update')->name('game.release.update');
});

/**
 * Post
 */
Route::prefix('post')->group(function () {
    Route::get('/show/{post}', 'PostController@show')->name('post.show');
    Route::get('/', 'PostController@create')->middleware(['auth'])->name('post.create');
    Route::get('/edit/{post}', 'PostController@edit')->middleware(['auth'])->name('post.edit');
    Route::post('/url/save', 'PostController@store')->middleware(['auth'])->name('post.store');
    Route::post('/edit/{post}/update', 'PostController@update')->middleware(['auth'])->name('post.update');
    Route::get('/delete/{post}', 'PostController@destroy')->middleware(['auth'])->name('post.delete');
    # Comments
    Route::post('/{post}/comment/save', 'PostCommentController@store')->middleware(['auth'])->name('post.save.comment');
    Route::get('/{post}/comment/{comment}/delete', 'PostCommentController@destroy')->middleware(['auth'])->name('post.destory.comment');
});

/**
 * User
 */
Route::prefix('u')->group(function () {
    Route::get('', 'UserController@index')->name('users');
    Route::get('/{user}', 'UserController@show')->name('user.show');
    Route::get('/{user}/edit', 'ProfileController@edit')->middleware(['auth'])->name('user.edit'); # Same url, different route method
    Route::patch('/{user}/edit', 'ProfileController@update')->middleware(['auth'])->name('user.edit.update'); # Same url, different route method
    Route::patch('/{user}/edit_password', 'ProfileController@update_password')->middleware(['auth'])->name('user.edit.update_password');
    # notifications
    Route::get('/notifications/{user}/read', function(\App\User $user){
        $user->unreadNotifications->markAsRead();
        return back()->with('success', 'Alla kommentarer är markerade som lästa.');;
    })->middleware(['auth'])->name('markAsRead');
});

/**
 * Developer
 */
Route::prefix('dev')->group(function () {
    Route::get('/{developer}', 'DeveloperController@show')->name('developer.show');
});

/**
 * Om-sidan
 */
Route::get('om', 'AboutController@index')->name('om');

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
    $games = \App\Game::search('title', $q)->get();
    return view('search', compact('games'));
})->name('search.game');
