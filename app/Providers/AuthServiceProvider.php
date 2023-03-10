<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Buku;
use App\Policies\BukuPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Buku::class => BukuPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
   
        /* define a admin user role */
        Gate::define('isAdmin', function($user) {
           return $user->role == 'admin';
        });
       
        /* define a manager user role */
        Gate::define('isManager', function($user) {
            return $user->role == 'manager';
        });
      
        /* define a user role */
        Gate::define('isUser', function($user) {
            return $user->role == 'user';
        });

        Gate::define('update-buku', function ($user, $buku) {
            return $user->id === $buku->user_id;
        });
    }
}
