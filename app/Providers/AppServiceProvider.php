<?php

namespace App\Providers;

use App\Models\Genre;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        if(Schema::hasTable('genres'))
        {
            view()->share('genres', Genre::all());
            Paginator::useBootstrap();
        }
        Gate::define('admin', function (User $user) {
            return $user->role_id == 2;
        });

        Gate::define('user', function (User $user) {
            return $user->role_id == 1;
        });
    }
}
