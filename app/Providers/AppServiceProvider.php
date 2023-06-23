<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

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
        Gate::define('manage_users', function(User $user) {
            return $user->type == 1;
        });

        Gate::define('modify_tickets', function(User $user) {
            return $user->type == 1 || $user->type == 2;
        });

        Gate::define('create_tickets_on_behalf', function(User $user) {
            return $user->type == 1 || $user->type == 2;
        });
    }
}
