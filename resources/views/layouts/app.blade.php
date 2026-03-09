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
        <link href="https://fonts.bunny.net/css?family=nunito:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Critical CSS: ensures dashboard/profile stay styled when Vite bundle fails to load (e.g. Render) -->
        <style>
            .app-layout { font-family: 'Nunito', ui-sans-serif, system-ui, sans-serif; -webkit-font-smoothing: antialiased; margin: 0; color: #2C2B28; background: #F8F7F4; min-height: 100vh; }
            .app-layout .app-nav { background: #FDFCFA; border-bottom: 1px solid #E5E3DF; }
            .app-layout .app-nav a { color: #2C2B28; text-decoration: none; }
            .app-layout .app-nav a:hover { color: #5B7B6B; }
            .app-layout .app-nav button { color: #6B6A65; background: transparent; border: none; cursor: pointer; font-family: inherit; font-size: 0.875rem; }
            .app-layout .app-nav button:hover { color: #2C2B28; }
            .app-layout .app-header { background: #FDFCFA; border-bottom: 1px solid #E5E3DF; padding: 1.5rem 1rem; }
            .app-layout .app-header h2 { font-size: 1.25rem; font-weight: 600; color: #2C2B28; margin: 0; }
            .app-layout .app-main { padding: 3rem 1rem; max-width: 80rem; margin: 0 auto; }
            .app-layout .app-card { background: #FDFCFA; border: 1px solid #E5E3DF; border-radius: 0.75rem; padding: 1.5rem; box-shadow: 0 4px 6px -1px rgb(44 43 40 / 0.06); }
            .app-layout .app-card h2 { font-size: 1.125rem; font-weight: 500; color: #2C2B28; margin: 0 0 0.25rem 0; }
            .app-layout .app-card p { font-size: 0.875rem; color: #6B6A65; margin: 0.25rem 0; }
            .app-layout .app-btn { display: inline-flex; padding: 0.5rem 1rem; font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; color: #fff; background: #5B7B6B; border: none; border-radius: 0.5rem; cursor: pointer; }
            .app-layout .app-btn:hover { background: #4A6A5A; }
            .app-layout .app-link { color: #5B7B6B; text-decoration: underline; }
            .app-layout .app-link:hover { color: #4A6A5A; }
            .app-layout .app-muted { color: #6B6A65; }
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
                <header class="app-header bg-calm-card shadow-calm border-b border-calm-border">
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
