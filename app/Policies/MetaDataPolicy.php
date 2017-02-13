<?php

namespace App\Policies;

use App\User;
use App\Notebook\MetaData;
use Illuminate\Auth\Access\HandlesAuthorization;

class MetaDataPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the metaData.
     *
     * @param  \App\User  $user
     * @param  \App\Notebook\MetaData  $metaData
     * @return mixed
     */
    public function view(User $user, MetaData $metaData)
    {
        // anyone can view
        return \Auth::check();
    }

    /**
     * Determine whether the user can create metaData.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        // none can create new meta data units
        return false;
    }

    /**
     * Determine whether the user can update the metaData.
     *
     * @param  \App\User  $user
     * @param  \App\Notebook\MetaData  $metaData
     * @return mixed
     */
    public function update(User $user, MetaData $metaData)
    {
        // no one can update meta data units
        return false;
        
    }

    /**
     * Determine whether the user can delete the metaData.
     *
     * @param  \App\User  $user
     * @param  \App\Notebook\MetaData  $metaData
     * @return mixed
     */
    public function delete(User $user, MetaData $metaData)
    {
        // no one can delete meta data units
        return false;
    }
}
