<?php

namespace App\Policies;

use App\User;
use App\Notebook\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the user.
     *
     * @param  \App\User  $user
     * @param  \App\Notebook\User  $user
     * @return mixed
     */
    public function view(User $user, User $user)
    {
        // anyone can view
        return \Auth::check();
    }

    /**
     * Determine whether the user can create users.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        // can only create if owner
        return $user->isOwner();
    }

    /**
     * Determine whether the user can update the user.
     *
     * @param  \App\User  $user
     * @param  \App\Notebook\User  $user
     * @return mixed
     */
    public function update(User $user, User $user)
    {
        // can delete if self or owner
        return $user->isSelf($project) || $user->isOwner();
    }

    /**
     * Determine whether the user can delete the user.
     *
     * @param  \App\User  $user
     * @param  \App\Notebook\User  $user
     * @return mixed
     */
    public function delete(User $user, User $user)
    {
        // can only delete if owner
        return return $user->isOwner();
    }
}
