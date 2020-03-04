<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;

class SnesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::where('console', 'snes')->withCount('releases')->get();
        return view('game.snes', compact('games'));
    }
}
