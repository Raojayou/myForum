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
//        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('canEdit', function ($user, $topic) {
            // Si el usuario es admin o autor puedo editar
            if($user->role == 'admin' || $user->role == 'author') {
                return true;
            }
            // Si el user_id del post es el id del usuario puede editar
            if( $user->id == $topic->user_id){
                return true;
            }
            // Si no, no puede editar
            return false;
        });
    }
}
