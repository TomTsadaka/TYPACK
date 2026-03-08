<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Vercel: ensure view binding exists before exception handler runs (serverless can miss deferred provider)
        if (getenv('VERCEL') && ! $this->app->bound('view')) {
            (new \Illuminate\View\ViewServiceProvider($this->app))->register();
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Force HTTPS in production
        if (app()->environment('production')) {
            URL::forceScheme('https');
        }

        // Vercel serverless: use /tmp for compiled views and derive APP_URL/ASSET_URL from VERCEL_URL
        if (getenv('VERCEL')) {
            config(['view.compiled' => '/tmp/views']);
            $host = getenv('VERCEL_URL') ?: getenv('VERCEL_BRANCH_URL');
            if ($host && (empty(config('app.url')) || config('app.url') === 'http://localhost')) {
                $url = 'https://' . $host;
                config(['app.url' => $url]);
                config(['app.asset_url' => $url]);
            }
        }
    }
}
