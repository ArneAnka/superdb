<?php

namespace App\Http\Controllers;

use App\Game;
use App\Genre;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        $game->load(['releases', 'urls', 'genre', 'history' => function($q){
            return $q->with('user');
            }
        ]);

        // https://stackoverflow.com/a/49160894/4892914
        $gamesOfSameGenre = Game::whereHas('genre', function($query) use($game) {
            $query->whereGenreId($game->genre_id)->where('genre', '!=', 'unknown');
        })->where('id', '!=', $game->id)->whereHas('console', function($query) use($game) {
            $query->whereConsoleId($game->console_id);
        })->get();
        
        return view('game.game', compact('game','gamesOfSameGenre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        $this->authorize('update', $game);
        
        $genres = Genre::all();
        
        $saves = ['unknown','battery','password','unsaveable'];

        return view('game.edit.index', compact('game', 'genres', 'saves'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        $this->authorize('update', $game);

        $messages = [
            'title.required' => 'Spelet måste ha en titel',
        ];

        $request->validate([
            'title' => 'required',
            'sweden_release' => 'nullable|date_format:Y-m-d',
            'europe_release' => 'nullable|date_format:Y-m-d',
            'japan_release' => 'nullable|date_format:Y-m-d',
            'usa_release' => 'nullable|date_format:Y-m-d',
            'genre_id' => 'required|exists:games_genres,id'
        ], $messages);

        $game->update($request->all());

        return redirect()
        ->route('game.show', $game)
        ->with('success', 'Spelet uppdaterades!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        //
    }
}
