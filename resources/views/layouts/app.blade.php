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
        <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Critical CSS: ensures dashboard/profile stay styled when Vite bundle fails to load -->
        <style>
            .app-layout { font-family: 'Plus Jakarta Sans', ui-sans-serif, system-ui, sans-serif; -webkit-font-smoothing: antialiased; margin: 0; color: #0F172A; background: #FAFAFA; min-height: 100vh; }
            .app-layout .app-nav { background: #fff; border-bottom: 1px solid #E2E8F0; box-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.04); }
            .app-layout .app-nav a { color: #0F172A; text-decoration: none; }
            .app-layout .app-nav a:hover { color: #0D9488; }
            .app-layout .app-nav button { color: #64748B; background: transparent; border: none; cursor: pointer; font-family: inherit; font-size: 0.875rem; }
            .app-layout .app-nav button:hover { color: #0F172A; }
            .app-layout .app-header { background: #fff; border-bottom: 1px solid #E2E8F0; padding: 1.5rem 1rem; }
            .app-layout .app-header h2 { font-size: 1.25rem; font-weight: 600; color: #0F172A; margin: 0; }
            .app-layout .app-main { padding: 0; max-width: 80rem; margin: 0 auto; }
            .app-layout .app-card { background: #fff; border: 1px solid #E2E8F0; border-radius: 1rem; padding: 1.5rem; box-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.06); }
            .app-layout .app-card h2 { font-size: 1.125rem; font-weight: 600; color: #0F172A; margin: 0 0 0.25rem 0; }
            .app-layout .app-card p { font-size: 0.875rem; color: #64748B; margin: 0.25rem 0; }
            .app-layout .app-btn { display: inline-flex; padding: 0.625rem 1.25rem; font-size: 0.875rem; font-weight: 600; color: #fff; background: #0D9488; border: none; border-radius: 0.5rem; cursor: pointer; }
            .app-layout .app-btn:hover { background: #0F766E; }
            .app-layout .app-link { color: #0D9488; text-decoration: none; font-weight: 500; }
            .app-layout .app-link:hover { color: #0F766E; text-decoration: underline; }
            .app-layout .app-muted { color: #64748B; }
            .app-layout .locale-flag { display: inline-block; line-height: 1; font-size: 1.25rem; }
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
