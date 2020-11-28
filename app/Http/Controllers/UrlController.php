<?php

namespace App\Http\Controllers;

use App\Url;
use App\Game;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Game $game)
    {
        return view('game.edit.add_link', compact('game'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Game $game)
    {
        $request->validate([
            'url_host' => 'required',
            'new_url' => 'required|url'
        ]);

        $url = new Url;

        $url->create([
            'game_id' => $game->id,
            'host' => $request->get('url_host'),
            'url' => $request->get('new_url')
        ]);

        return redirect()
        ->route('game.show', $game)
        ->with('success', 'Lyckades lägga till en url');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Url  $url
     * @return \Illuminate\Http\Response
     */
    public function show(Url $url)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Url  $url
     * @return \Illuminate\Http\Response
     */
    public function edit(Url $url)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Url  $url
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Url $url)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Url  $url
     * @return \Illuminate\Http\Response
     */
    public function destroy(Url $url)
    {
        $host = $url->host;
        $url->delete();
        return back()->with('success', 'Du tog bort en url som gick till: ' . $host);
    }
}
