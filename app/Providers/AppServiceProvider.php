<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        config(['app.locale' => 'id']);
        \Carbon\Carbon::setLocale('id');
        
        Gate::define('isAdmin', function($user) {
            return $user->role == 'admin';
        });
    
        Gate::define('isKades', function($user) {
            return $user->role == 'kades';
        });
    
        Gate::define('isStaff', function($user) {
            return $user->role == 'staff';
        });
    }
}
