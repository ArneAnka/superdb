<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;

class SnesController extends Controller
{
    /**
     * Display a listing of the resource, grouped by first letter in `title` column.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::whereHas('console', function ($query) {
            return $query->where('short', '=', 'snes');
        })->with(['images'])->withCount('releases')->get();

        // Group all games by the first letter
        $games = $games->reduce(function ($carry, $games) {
            // get first letter
            $first_letter = $games['title'][0];
            if ( !isset($carry[$first_letter]) ) {
                $carry[$first_letter] = [];
            }
            $carry[$first_letter][] = $games;
            return $carry;
        }, []);

        return view('game.snes', compact('games'));
    }
}
