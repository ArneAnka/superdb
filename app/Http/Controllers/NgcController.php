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
        $games = Game::whereHas('console', function ($query) {
            return $query->where('short', '=', 'ngc');
        })->with(['images'])->withCount(['releases', 'history'])->get();

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
        
        return view('game.ngc', compact('games'));
    }
}
