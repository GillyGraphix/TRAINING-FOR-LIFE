<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL; // <-- Tumeongeza hii ili kuruhusu matumizi ya URL class

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
        // Hii inalazimisha website itumie HTTPS mazingira ya production (Render)
        // Inazuia tatizo la 'Mixed Content' linalozuia CSS kuonekana
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }
    }
}