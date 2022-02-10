<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        $this->register();
        \Gate::define('admin', function ($user) {
            if ($user->is_admin) {
                return true;
            }

            return false;
        });
        \Gate::define('candidate', function ($user) {
            if (! $user->is_admin) {
                return true;
            }

            return false;
        });
    }
}
