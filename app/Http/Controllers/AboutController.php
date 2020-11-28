<?php

namespace App\Http\Controllers;

use App\Console;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consoles = Console::withCount(['games' => function($q){
            return $q->orderBy('name');
        }])->get();

        $histories = DB::select('SELECT count(*) AS history FROM histories WHERE historyable_type = ?', ['App\Game']);
// dd($histories);
        return view('om', compact('consoles', 'histories'));
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
     * @param  \App\Console  $console
     * @return \Illuminate\Http\Response
     */
    public function show(Console $console)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Console  $console
     * @return \Illuminate\Http\Response
     */
    public function edit(Console $console)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Console  $console
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Console $console)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Console  $console
     * @return \Illuminate\Http\Response
     */
    public function destroy(Console $console)
    {
        //
    }
}
