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
        $this->app->bind('App\Contracts\Dao\ForgotPasswordDaoInterface', 'App\Dao\ForgotPasswordDao');

        // Business logic registration
        $this->app->bind('App\Contracts\Services\ForgotPasswordServiceInterface', 'App\Services\ForgotPasswordService');
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
