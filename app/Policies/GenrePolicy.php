<?php

namespace App\Policies;

use App\Genre;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class GenrePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Genre  $genre
     * @return mixed
     */
    public function view(User $user, Genre $genre)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Genre  $genre
     * @return mixed
     */
    public function update(User $user, Genre $genre)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Genre  $genre
     * @return mixed
     */
    public function delete(User $user, Genre $genre)
    {
        return $user->id === 1 && $genre->games->isEmpty()
                    ? Response::allow()
                    : Response::deny('Genre is not empty');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Genre  $genre
     * @return mixed
     */
    public function restore(User $user, Genre $genre)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Genre  $genre
     * @return mixed
     */
    public function forceDelete(User $user, Genre $genre)
    {
        //
    }
}
