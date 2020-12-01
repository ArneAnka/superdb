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
        # Retrive the 10 last editet games
        $games_history = Game::with('console')->whereHas('history')->orderBy('updated_at', 'desc')->limit(10)->get();

        # Retrive Birthdays! :)
        $birthdays = Game::releasedOnThisDay()->with('console')->get();

        # Post
        $posts = Post::withCount(['comments'])->with(['user', 'tags', 'images'])->orderBy('created_at', 'desc')->simplePaginate(5);

        return view('welcome', compact('games_history', 'birthdays', 'posts'));
    }
}
