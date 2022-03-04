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
        // Dao Registration
        $this->app->bind('App\Contracts\Dao\StudentDaoInterface', 'App\Dao\StudentDao');

        // Business logic registration
        $this->app->bind('App\Contracts\Services\StudentServiceInterface', 'App\Services\StudentService');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
