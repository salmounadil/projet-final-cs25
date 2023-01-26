<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('backoffice-access', function($user) {
            return $user->role_id == 1 || $user->role_id == 2 || $user->role_id == 3 ;
        });
        Gate::define('admin-access', function($user) {
            return $user->role_id == 1  ;
        });
        Gate::define('panier-full', function($user) {
            return $user->panier->produitsPanier->count() > 0;
        });
        Gate::define('blog-confirm', function($user) {
            return $user->role_id == 1 || $user->role_id == 2;
        });
        Gate::define('admin-webmaster', function($user) {
            return $user->role_id == 1 || $user->role_id == 3;
        });
        Gate::define('blog-redac', function($user,$blog) {
            return $user->role_id == 1 || ($user->role_id == 2 && ($blog->user_id == $user->id || $blog->user_id == 3)) || ($user->role_id == 3 && $blog->user_id == $user->id) ;
        });
        Gate::define('user-edit', function($user,$util) {
            if (Auth::check()) {
                return $user->role_id == 1 && $util->id == $user->id || ($user->role_id == 1 && ($util->id != $user->id && $util->role_id != 1)) ;
            }
            else
            {
                return false;
            }
        });
    }
}
