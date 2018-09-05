<?php

namespace App\Providers;

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
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('usuario', function ($user){
            return $user->funcao == User::USUARIO;
        });
        Gate::define('entidade', function ($user){
            return $user->funcao == User::ENTIDADE;
        });
        Gate::define('admin', function ($user){
            return $user->funcao == User::ADMIN;
        });
    }
}
