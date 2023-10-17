<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use App\FirebaseAuthenticationService;

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
        $this->app->bind('App\FirebaseAuthenticationService', function () {
            return new FirebaseAuthenticationService();
        });

        // $this->app->bind(FirebaseAuthenticationService::class, function () {
        //     return new FirebaseAuthenticationService();
        // });
    }
}
