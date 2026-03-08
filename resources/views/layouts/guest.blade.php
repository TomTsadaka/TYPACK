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
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Critical CSS: keeps login/register styled when Vite bundle fails to load (e.g. Vercel) -->
        <style>
            .guest-layout { font-family: 'Figtree', ui-sans-serif, system-ui, sans-serif; -webkit-font-smoothing: antialiased; margin: 0; color: #111827; }
            .guest-layout .guest-page { min-height: 100vh; display: flex; flex-direction: column; justify-content: center; align-items: center; padding: 1.5rem 0; background: #f3f4f6; }
            .guest-layout .guest-card { width: 100%; max-width: 28rem; margin-top: 1.5rem; padding: 1.5rem; background: #fff; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1); border-radius: 0.5rem; overflow: hidden; }
            .guest-layout .guest-logo { width: 5rem; height: 5rem; color: #6b7280; }
            .guest-layout label { display: block; font-weight: 500; font-size: 0.875rem; color: #374151; margin-bottom: 0.25rem; }
            .guest-layout input[type="email"], .guest-layout input[type="password"], .guest-layout input[type="text"] { display: block; width: 100%; margin-top: 0.25rem; padding: 0.5rem 0.75rem; font-size: 1rem; border: 1px solid #d1d5db; border-radius: 0.375rem; background: #fff; box-sizing: border-box; }
            .guest-layout input:focus { outline: none; border-color: #6366f1; box-shadow: 0 0 0 3px rgb(99 102 241 / 0.2); }
            .guest-layout input[type="checkbox"] { width: 1rem; height: 1rem; border-radius: 0.25rem; border: 1px solid #d1d5db; margin-right: 0.5rem; vertical-align: middle; }
            .guest-layout .guest-actions { display: flex; align-items: center; justify-content: flex-end; margin-top: 1rem; gap: 0.75rem; }
            .guest-layout .guest-btn { display: inline-flex; padding: 0.5rem 1rem; font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; color: #fff; background: #1f2937; border: none; border-radius: 0.375rem; cursor: pointer; }
            .guest-layout .guest-btn:hover { background: #374151; }
            .guest-layout a { color: #6366f1; text-decoration: underline; }
            .guest-layout a:hover { color: #4f46e5; }
            .guest-layout .guest-link-amber { color: #b45309; font-weight: 600; }
            .guest-layout .guest-link-amber:hover { color: #92400e; }
            .guest-layout .guest-field { margin-top: 1rem; }
            .guest-layout .guest-remember { display: block; margin-top: 1rem; }
            .guest-layout .guest-remember span { font-size: 0.875rem; color: #4b5563; vertical-align: middle; }
            .guest-layout .guest-footer { margin-top: 1.5rem; text-align: center; font-size: 0.875rem; color: #4b5563; }
            .guest-layout .guest-errors { margin-top: 0.5rem; font-size: 0.875rem; color: #dc2626; }
            .guest-layout .locale-flag { display: inline-block; line-height: 1; font-size: 1.25rem; }
        </style>

        <!-- Scripts -->
        <x-vite-assets />
    </head>
    <body class="guest-layout font-sans text-gray-900 antialiased">
        <div class="guest-page min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div class="absolute top-4 {{ $localeDir === 'rtl' ? 'left-4' : 'right-4' }}">
                <x-language-switcher />
            </div>
            <div>
                <a href="/">
                    <x-application-logo class="guest-logo w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <div class="guest-card w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
