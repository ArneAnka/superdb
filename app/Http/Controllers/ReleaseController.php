<?php

namespace App\Http\Controllers;

use App\Game;
use App\Release;
use Illuminate\Http\Request;

class ReleaseController extends Controller
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
     * @param  \App\Release  $release
     * @return \Illuminate\Http\Response
     */
    public function show(Release $release)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Release  $release
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game, Release $release)
    {
        return view('game.release.index', compact('game', 'release'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Release  $release
     * @return \Illuminate\Http\Response
     */
    public function update(Game $game, Release $release, Request $request)
    {
        $this->authorize('update', $release);

        $request->validate([
            "box" => "nullable",
            "pcb" => '',
            "manual" => "nullable",
            "cartridge_front" => "nullable",
            "cartridge_back" => "nullable",
            "cartridge_number" => "numeric|nullable",
            "inner_box" => "nullable",
            "register_pampflet" => "nullable",
            "booklet" => "nullable",
            "special" => "nullable",
            "misc[]" => ""
        ]);

        //dd($request->all());

        $input = $request->all();
        $release->fill($input)->save();

        return redirect()
        ->route('game.show', $game)
        ->with('success', 'Releasen uppdaterades!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Release  $release
     * @return \Illuminate\Http\Response
     */
    public function destroy(Release $release)
    {
        //
    }
}
