<?php

namespace App\Http\Controllers;

use App\Game;
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
        $game->load(['releases', 'urls', 'history' => function($q){
            return $q->with('user');
            }
        ]);

        $gamesOfSameGenre = Game::where('id', '!=', $game->id)->where('genre', '!=', null)->where('genre', $game->genre)->where('console', $game->console)->get();
        
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

        return view('game.edit.index', compact("game"));
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
            'sweden_release' => 'date_format:Y-m-d',
            'europe_release' => 'date_format:Y-m-d',
            'japan_release' => 'date_format:Y-m-d',
            'usa_release' => 'date_format:Y-m-d',
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
