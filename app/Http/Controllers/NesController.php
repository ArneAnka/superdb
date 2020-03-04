<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;

class NesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::where('console', 'nes')->withCount('releases')->get();
        return view('game.nes', compact('games'));
    }
}
