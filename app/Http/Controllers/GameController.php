<?php

namespace App\Http\Controllers;

use App\Game;
use App\Mode;
use App\Genre;
use App\Publisher;
use App\Developer;
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
        $game->load(['releases' => function($q){
            return $q->with(['comments' => function($q){
                return $q->with('user');
            }]);
        }, 'urls', 'genre', 'images', 'history' => function($q){
            return $q->with('user');
            }, 'comments' => function($q){
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
        $game->load('urls');

        // Get the tags associated with this post and convert to a comma seperated string
        $publishers = $game->publishers->implode('name', ', ');
        $developers = $game->developers->implode('name', ', ');
        $modes = $game->modes->implode('mode', ', ');

        return view('game.edit.index', compact('game', 'genres', 'saves', 'publishers', 'developers', 'modes'));
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

        if ($request->has('url')) {
            foreach ($request->url as $host => $url) {
                if ($gameUrl = $game->urls()->firstWhere('host', $host)) {
                    $gameUrl->update(['url' => $url]);
                }
            }
        }

        $game->update([
            'title' => $request->get('title'),
            'genre_id' => $request->get('genre_id'),
            'sweden_release' => $request->get('sweden_release'),
            'europe_release' => $request->get('europe_release'),
            'japan_release' => $request->get('japan_release'),
            'usa_release' => $request->get('usa_release'),
            'save' => $request->get('save'),
            'import' => $request->get('import'),
            'description' => $request->get('description'),
        ]);

        $this->handlePublisher($request, $game);
        $this->handleDeveloper($request, $game);
        $this->handleModes($request, $game);

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

    /**
     * Handle Publihsers for Game
     * https://stackoverflow.com/questions/50529715/a-solution-for-adding-tags-in-laravel
     * Also see handeDevelopers() and handeModes().
     * This need to be refactored!
     * @param  \Illuminate\Http\Request  $request
     * @param \App\Game $game
     * @return void
     */
    public function handlePublisher(Request $request, Game $game){
        /**
         * Once the game has been saved, we deal with the tag logic.
         * Grab the tag or publishers from the field, sync them with the game
         */
        $keys = collect(explode(',', $request->input('publishers')))
            ->map(function($item) { 
                return trim($item); 
            }) // remove spaces around names
            ->filter() // remove empty names
            ->map(fn ($name) => Publisher::firstOrCreate(['name' => $name])->getKey());

        $game->publishers()->sync($keys);
    }

    public function handleDeveloper(Request $request, Game $game){
        $keys = collect(explode(',', $request->input('developers')))
            ->map(function($item) { 
                return trim($item); 
            }) // remove spaces around names
            ->filter() // remove empty names
            ->map(fn ($name) => Developer::firstOrCreate(['name' => $name])->getKey());

        $game->developers()->sync($keys);
    }

    public function handleModes(Request $request, Game $game){
        $keys = collect(explode(',', $request->input('modes')))
            ->map(function($item) { 
                return trim($item); 
            }) // remove spaces around names
            ->filter() // remove empty names
            ->map(fn ($mode) => Mode::firstOrCreate(['mode' => $mode])->getKey());

        $game->modes()->sync($keys);
    }
}
