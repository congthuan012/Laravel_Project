<?php

namespace App\Policies;

use App\Models\Guest;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GuestPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Guest  $guest
     * @return mixed
     */
    public function viewAny(Guest $guest)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Guest  $guest
     * @param  \App\Models\Guest  $guest
     * @return mixed
     */
    public function view(User $user)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Guest  $guest
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasAccess(['guest.create']);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Guest  $guest
     * @param  \App\Models\Guest  $guest
     * @return mixed
     */
    public function update(User $user, Guest $guest)
    {
        return $user->hasAccess(['guest.update']);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Guest  $guest
     * @param  \App\Models\Guest  $guest
     * @return mixed
     */
    public function delete(User $user, Guest $guest)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Guest  $guest
     * @param  \App\Models\Guest  $guest
     * @return mixed
     */
    public function restore(User $user, Guest $guest)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Guest  $guest
     * @param  \App\Models\Guest  $guest
     * @return mixed
     */
    public function forceDelete(User $user, Guest $guest)
    {
        //
    }

}
