<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;

class GbcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::where('console', 'gbc')->withCount('releases')->get();
        return view('game.gbc', compact('games'));
    }
}
