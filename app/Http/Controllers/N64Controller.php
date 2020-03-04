<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;

class N64Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::where('console', 'n64')->withCount('releases')->get();
        return view('game.n64', compact('games'));
    }
}
