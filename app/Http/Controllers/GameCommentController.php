<?php

namespace App\Http\Controllers;

use App\Game;
use App\Comment;
use Illuminate\Http\Request;
use App\Points\Actions\Commented;
use App\Notifications\ReplyToUserComment;

class GameCommentController extends Controller
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
    public function store(Request $request, Game $game)
    {
        $request->validate([
            'body' => 'required'
        ]);

        $comment = new Comment;
        
        $comment->user_id = $request->user()->id;
        $comment->body = $request->get('body');

        $game->comments()->save($comment);

        $request->user()->givePoints(new Commented());

        // Get all users that has commented on a game
        // https://laracasts.com/discuss/channels/laravel/get-users-those-comments-to-selected-post
        $comments = $game->comments->load(['user']);

        $users_commenting = $comments
        ->filter(function($comments) use ($request){
            return $comments->user->id != $request->user()->id;
        })
        ->map(function($comment){
            return $comment->user;
        })->unique();

        // Send the notification
        \Notification::send($users_commenting, new ReplyToUserComment($game, $comment, $request->user()));
        
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
    public function destroy(Game $game, Comment $comment)
    {
        $this->authorize('delete', $comment);
        
        $comment->delete();
        return back()->with('success', 'Kommentar raderad');
    }
}
