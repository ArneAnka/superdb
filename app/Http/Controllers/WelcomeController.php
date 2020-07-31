<?php

namespace App\Http\Controllers;

use App\Post;
use App\Game;
use App\Console;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $birthdays = Game::releasedOnThisDay()->with('console')->get();

        # Post
        $posts = Post::with('user')->orderBy('created_at', 'desc')->get();

        return view('welcome', compact('games_history', 'games_count', 'birthdays', 'all_games_count', 'posts'));
    }
}
