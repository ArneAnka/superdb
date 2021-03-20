<?php

namespace App\Listeners;

use App\Ip;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogSuccessfulLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $user = $event->user;
        $user->ip()->save(new Ip([
            'address' => $this->request->ip(),
            'agent' => $this->request->server('HTTP_USER_AGENT')
        ]));
    }
}
