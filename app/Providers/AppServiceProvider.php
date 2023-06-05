<?php

namespace App\Providers;

use Laravel\Sanctum\Sanctum;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Sanctum::ignoreMigrations(); // To remove the unnecessary personal_access_tokens table
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
