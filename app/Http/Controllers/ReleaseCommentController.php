<?php

namespace App\Http\Controllers;

use App\Game;
use App\Release;
use App\Comment;
use Illuminate\Http\Request;
use App\Events\UserCommented;
use App\Points\Actions\Commented;

class ReleaseCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Game $game, Release $release)
    {
        $release->load('comments.user');
        return view('game.release.comments', compact('game', 'release'));
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
    public function store(Request $request, Game $game, Release $release)
    {
        $request->validate([
            'body' => 'required'
        ]);

        $comment = new Comment;
        
        $comment->user_id = $request->user()->id;
        $comment->body = $request->get('body');
        $comment->ip = $request->ip();

        $release->comments()->save($comment);

        $request->user()->givePoints(new Commented());

        // Send notification to all other participants
        event(new UserCommented($release, $comment, $request->user()));
        
        return back()->with('success', 'Kommentar inlagd!');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game, Release $release, Comment $comment)
    {
        $this->authorize('delete', $comment);
        
        $comment->delete();
        return back()->with('success', 'Kommentar raderad');
    }
}
