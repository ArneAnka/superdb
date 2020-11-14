<?php

namespace App\Listeners;

use App\User;
use App\Events\UserCommented;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\ReplyToUserComment;

class NotifyUsersOfNewComment
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(UserCommented $event)
    {
        User::whereHas('comments', function ($query) use ($event) {
            return $query->where('commentable_id', $event->game->id);
        })
        ->where('id', '!=', $event->user->id)
        ->each(function (User $user) use ($event){
            \Notification::send($user, new ReplyToUserComment($event->game, $event->comment, $event->user));
        });
    }
}
