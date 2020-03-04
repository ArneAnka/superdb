<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;

class GbaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::where('console', 'gba')->withCount('releases')->get();
        return view('game.gba', compact('games'));
    }
}
