@php
    $localeDir = config('locales.available.'.app()->getLocale().'.dir', 'ltr');
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ $localeDir }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=sora:300,400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Critical CSS: ensures dashboard/profile stay styled when Vite bundle fails to load -->
        <style>
            .app-layout { font-family: 'Sora', ui-sans-serif, system-ui, sans-serif; -webkit-font-smoothing: antialiased; margin: 0; color: #1c1917; background: #fafaf9; min-height: 100vh; }
            .app-layout .app-nav { background: #fff; border-bottom: 1px solid #e7e5e4; box-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.03); }
            .app-layout .app-nav a { color: #1c1917; text-decoration: none; font-weight: 500; }
            .app-layout .app-nav a[href*="dashboard"] svg { max-width: 2rem; max-height: 2rem; width: 2rem; height: auto; display: block; }
            .app-layout .app-nav a:hover { color: #0f766e; }
            .app-layout .app-nav .nav-active { color: #0f766e; border-bottom-color: #0f766e; }
            .app-layout .app-nav button { color: #78716c; background: transparent; border: none; cursor: pointer; font-family: inherit; font-size: 0.875rem; }
            .app-layout .app-nav button:hover { color: #1c1917; }
            .app-layout .app-header { background: #fff; border-bottom: 1px solid #e7e5e4; padding: 1.5rem 1rem; }
            .app-layout .app-header h2 { font-size: 1.25rem; font-weight: 600; color: #1c1917; margin: 0; letter-spacing: -0.02em; }
            .app-layout .app-main { padding: 0; max-width: 80rem; margin: 0 auto; }
            .app-layout .app-card { background: #fff; border: 1px solid #e7e5e4; border-radius: 1rem; padding: 1.5rem; box-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.04); }
            .app-layout .app-card h2 { font-size: 1.125rem; font-weight: 600; color: #1c1917; margin: 0 0 0.25rem 0; }
            .app-layout .app-card p { font-size: 0.875rem; color: #78716c; margin: 0.25rem 0; }
            .app-layout .app-btn { display: inline-flex; padding: 0.625rem 1.25rem; font-size: 0.875rem; font-weight: 600; color: #fff; background: #0f766e; border: none; border-radius: 0.5rem; cursor: pointer; }
            .app-layout .app-btn:hover { background: #0d9488; }
            .app-layout .app-link { color: #0f766e; text-decoration: none; font-weight: 500; }
            .app-layout .app-link:hover { color: #0d9488; text-decoration: underline; }
            .app-layout .app-muted { color: #78716c; }
            .app-layout .locale-flag { display: inline-block; line-height: 1; font-size: 1.25rem; }
            .app-layout .store-card { background: #fff; border: 1px solid #e7e5e4; border-radius: 1rem; box-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.04); }
            .app-layout .store-card-interactive { background: #fff; border: 1px solid #e7e5e4; border-radius: 1rem; box-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.04); cursor: pointer; }
            .app-layout .dashboard-icon-box { width: 2.5rem; height: 2.5rem; flex-shrink: 0; border-radius: 0.75rem; display: flex; align-items: center; justify-content: center; }
            .app-layout .dashboard-icon { width: 1.25rem; height: 1.25rem; flex-shrink: 0; }
            .app-layout .dashboard-arrow { width: 1rem; height: 1rem; flex-shrink: 0; }
            .app-layout .dashboard-blur-top { width: 12rem; height: 12rem; }
            .app-layout .dashboard-blur-bottom { width: 10rem; height: 10rem; }
        </style>

        <!-- Scripts -->
        <x-vite-assets />
    </head>
    <body class="app-layout font-sans antialiased bg-calm-background text-calm-charcoal">
        <div class="min-h-screen bg-calm-background">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="app-header bg-white border-b border-calm-border">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="app-main">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
