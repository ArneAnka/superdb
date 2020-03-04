<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;

class NgcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::where('console', 'ngc')->withCount('releases')->get();
        return view('game.ngc', compact('games'));
    }
}
