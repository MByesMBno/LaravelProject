<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use App\Models\item;
use App\Models\user;

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
        Paginator::defaultView('pagination::default');

        Route::middleware('api')
            ->prefix('api')
            ->group(base_path('routes/api.php'));

        Route::middleware('web')
            ->group(base_path('routes/web.php'));

        Gate::define('create-item', function ($user) {
            return $user->is_admin;
        });

        Gate::define('edit-item', function ($user, $item) {
            return $user->is_admin;
        });

        Gate::define('update-item', function ($user, $item) {
            return $user->is_admin;
        });
        Gate::define('destroy-item', function (User $user, Item $item) {
            return $user->is_admin;
        });

        Gate::define('create-category', function (User $user) {
            return true;
        });
    }
}
