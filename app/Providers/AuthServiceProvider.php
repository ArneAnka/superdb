<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        'App\Comment' => 'App\Policies\CommentPolicy',
        'App\Game' => 'App\Policies\GameEditPolicy',
        'App\Post' => 'App\Policies\PostPolicy',
        'App\User' => 'App\Policies\UserPolicy',
        'App\Release' => 'App\Policies\ReleaseEditPolicy',
        'App\Image' => 'App\Policies\GameImagePolicy'
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
