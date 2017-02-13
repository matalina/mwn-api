<?php

namespace App\Policies;

use App\User;
use App\Notebook\Page;
use Illuminate\Auth\Access\HandlesAuthorization;

class PagePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the page.
     *
     * @param  \App\User  $user
     * @param  \App\Notebook\Page  $page
     * @return mixed
     */
    public function view(User $user, Page $page)
    {
        // anyone can view
        return \Auth::check();
    }

    /**
     * Determine whether the user can create pages.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        // only an owner can create a new user
        return $user->isOwner();
    }

    /**
     * Determine whether the user can update the page.
     *
     * @param  \App\User  $user
     * @param  \App\Notebook\Page  $page
     * @return mixed
     */
    public function update(User $user, Page $page)
    {
        // can only update if self
        return $user->isSelf($page);
    }

    /**
     * Determine whether the user can delete the page.
     *
     * @param  \App\User  $user
     * @param  \App\Notebook\Page  $page
     * @return mixed
     */
    public function delete(User $user, Page $page)
    {
        // can delete only if self
        return $user->isSelf($page);
    }
}
