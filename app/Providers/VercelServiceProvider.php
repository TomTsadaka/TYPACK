<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Runs first on Vercel to register the view binding before any exception handler runs.
 * Fixes "Target class [view] does not exist" when the handler tries to render error views.
 */
class VercelServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        if (! getenv('VERCEL') || $this->app->bound('view')) {
            return;
        }

        try {
            $this->app->register(\Illuminate\View\ViewServiceProvider::class);
        } catch (\Throwable $e) {
            // If view provider fails (e.g. missing deps), avoid breaking the app
        }
    }
}
