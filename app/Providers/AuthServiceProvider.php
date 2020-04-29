<?php

namespace App\Providers;

use App\Policies\RolesPolicy;
use App\Policies\TypeArticlesPolicy;
use App\Policies\UsersPolicy;
use App\Role;
use App\Type_article;
use App\User;
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
        'App\Model' => 'App\Policies\ModelPolicy',
        Type_article::class => TypeArticlesPolicy::class,
        Role::class => RolesPolicy::class,
        User::class => UsersPolicy::class


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
