<?php

namespace App\Policies;

use App\User;
use App\Notebook\Project;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the project.
     *
     * @param  \App\User  $user
     * @param  \App\Notebook\Project  $project
     * @return mixed
     */
    public function view(User $user, Project $project)
    {
        // anyone can view
        return \Auth::check();
    }

    /**
     * Determine whether the user can create projects.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
        return $user->isOwner();
    }

    /**
     * Determine whether the user can update the project.
     *
     * @param  \App\User  $user
     * @param  \App\Notebook\Project  $project
     * @return mixed
     */
    public function update(User $user, Project $project)
    {
        //
        return $user->isSelf($project);
    }

    /**
     * Determine whether the user can delete the project.
     *
     * @param  \App\User  $user
     * @param  \App\Notebook\Project  $project
     * @return mixed
     */
    public function delete(User $user, Project $project)
    {
        //
        return $user->isSelf($project);
    }
}
