<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/test/', function(){
    return view('test');
})->name('test');

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
    # Image management
    Route::get('image/{game}/create', 'GameImageController@create')->middleware(['auth'])->name('game.create.image');
    Route::post('/edit/{game}/image_upload', 'GameImageController@store')->middleware(['auth'])->name('game.image_upload');
    Route::get('image/{game}/delete/{image}', 'GameImageController@destroy')->middleware(['auth'])->name('game.delete.image');
    Route::get('image/{game}/create/cover', 'GameCoverImageController@create')->middleware(['auth'])->name('game.cover.create');
    Route::post('image/{game}/create/cover/store', 'GameCoverImageController@store')->middleware(['auth'])->name('game.cover.store');
    Route::get('image/{game}/cover/delete', 'GameCoverImageController@destroy')->middleware(['auth'])->name('game.cover.destroy');
    # Game Comments
    Route::post('/{game}/comment/save', 'GameCommentController@store')->middleware(['auth'])->name('game.save.comment');
    Route::get('/{game}/comment/{comment}/delete', 'GameCommentController@destroy')->middleware(['auth'])->name('game.destory.comment');
    # Release
    Route::get('/{game}/release/{release}', 'ReleaseController@edit')->name('game.release.edit');
    Route::get('/{game}/release/{release}/comments', 'ReleaseCommentController@index')->name('game.release.comment.index');
    Route::put('/{game}/release/{release}', 'ReleaseController@update')->name('game.release.update');
    Route::post('/{game}/release/{release}/save', 'ReleaseCommentController@store')->middleware(['auth'])->name('release.save.comment');
    Route::get('/{game}/release/{release}/comment/{comment}/delete', 'ReleaseCommentController@destroy')->middleware(['auth'])->name('release.destory.comment');
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
 * Tags
 */
Route::get('/tag/{tag}', function(\App\Tag $tag){
    $tags = $tag->posts;
    return view('tags.index', compact('tags'));
})->name('tags.show');

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
 * Poängsystemet
 */
Route::get('points', function(){
    return view('points');
})->name('points');

/**
 * Integritetspolicy
 */
Route::get('tos', function(){
    return view('tos');
})->name('tos');

/**
 * Genres
 */
Route::get('genres', 'GenreController@index')->name('game.genres');
Route::get('genres/delete/{genre}', 'GenreController@destroy')->name('game.genres.delete');


/**
 * The endpoint for the search bar in menu
 */
Route::post('/search',function(Request $request){
    $q = $request->get('q');

    // if (preg_match("/\[(.*?)\]/m", $q, $match)) {
    //     $consoleID = $match[1];
    // }else{
    //     $consoleID = null;
    // }
    // return $q;

    $games = \App\Game::search('title', $q)->get();
    return view('search', compact('games'));
})->name('search.game');
