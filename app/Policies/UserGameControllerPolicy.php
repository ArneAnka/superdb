<?php

namespace App\Policies;

use App\Game;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserGameControllerPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any games.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the game.
     *
     * @param  \App\User  $user
     * @param  \App\Game  $game
     * @return mixed
     */
    public function view(User $user, Game $game)
    {
        //
    }

    /**
     * Determine whether the user can create games.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the game.
     *
     * @param  \App\User  $user
     * @param  \App\Game  $game
     * @return mixed
     */
    public function update(User $user, Game $game)
    {
        return $user->id == 1;
    }

    /**
     * Determine whether the user can delete the game.
     *
     * @param  \App\User  $user
     * @param  \App\Game  $game
     * @return mixed
     */
    public function delete(User $user, Game $game)
    {
        //
    }

    /**
     * Determine whether the user can restore the game.
     *
     * @param  \App\User  $user
     * @param  \App\Game  $game
     * @return mixed
     */
    public function restore(User $user, Game $game)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the game.
     *
     * @param  \App\User  $user
     * @param  \App\Game  $game
     * @return mixed
     */
    public function forceDelete(User $user, Game $game)
    {
        //
    }
}
