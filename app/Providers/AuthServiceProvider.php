<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        App\Notebook\Folder::class => App\Policies\Folder::class,
        App\Notebook\MetaData::class => App\Policies\MetaData::class,
        App\Notebook\Page::class => App\Policies\Page::class,
        App\Notebook\Project::class => App\Policies\Project::class,
        App\Notebook\Tag::class => App\Policies\Tag::class,
        App\Notebook\User::class => App\Policies\User::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
