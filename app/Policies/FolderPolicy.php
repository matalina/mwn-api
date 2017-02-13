<?php

namespace App\Policies;

use App\User;
use App\Notebook\Folder;
use Illuminate\Auth\Access\HandlesAuthorization;

class FolderPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the folder.
     *
     * @param  \App\User  $user
     * @param  \App\Notebook\Folder  $folder
     * @return mixed
     */
    public function view(User $user, Folder $folder)
    {
        // anyone can view
        return \Auth::check();
    }

    /**
     * Determine whether the user can create folders.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        // can create if an owner
        return $user->isOwner();
    }

    /**
     * Determine whether the user can update the folder.
     *
     * @param  \App\User  $user
     * @param  \App\Notebook\Folder  $folder
     * @return mixed
     */
    public function update(User $user, Folder $folder)
    {
        // can update if self
        return $user->isSelf($folder);
    }

    /**
     * Determine whether the user can delete the folder.
     *
     * @param  \App\User  $user
     * @param  \App\Notebook\Folder  $folder
     * @return mixed
     */
    public function delete(User $user, Folder $folder)
    {
        // can delete if self
        return $user->isSelf($folder);
    }
}
