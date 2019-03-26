<?php

namespace App\Providers;

use App\Post;
use App\User;
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
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin',function ( User $user){
            return $user->role === "1";
        });

        Gate::define('user',function (User $user){
            return $user->role === "0";
        });

        Gate::define('update',function ($user, Post $post){
            return $user->id == $post->user_id || $user->role == 1;
        });
    }
}
