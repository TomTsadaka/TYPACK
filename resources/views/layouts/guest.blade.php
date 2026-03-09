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

        <!-- Critical CSS: keeps login/register styled when Vite bundle fails to load (e.g. Vercel) -->
        <style>
            .guest-layout { font-family: 'Nunito', ui-sans-serif, system-ui, sans-serif; -webkit-font-smoothing: antialiased; margin: 0; color: #2C2B28; }
            .guest-layout .guest-page { min-height: 100vh; display: flex; flex-direction: column; justify-content: center; align-items: center; padding: 1.5rem 0; background: #F8F7F4; }
            .guest-layout .guest-card { width: 100%; max-width: 28rem; margin-top: 1.5rem; padding: 1.5rem; background: #FDFCFA; box-shadow: 0 4px 6px -1px rgb(44 43 40 / 0.06), 0 2px 4px -2px rgb(44 43 40 / 0.06); border-radius: 0.75rem; overflow: hidden; border: 1px solid #E5E3DF; }
            .guest-layout .guest-logo { width: 5rem; height: 5rem; color: #6B6A65; }
            .guest-layout label { display: block; font-weight: 500; font-size: 0.875rem; color: #2C2B28; margin-bottom: 0.25rem; }
            .guest-layout input[type="email"], .guest-layout input[type="password"], .guest-layout input[type="text"] { display: block; width: 100%; margin-top: 0.25rem; padding: 0.5rem 0.75rem; font-size: 1rem; border: 1px solid #E5E3DF; border-radius: 0.5rem; background: #fff; box-sizing: border-box; }
            .guest-layout input:focus { outline: none; border-color: #5B7B6B; box-shadow: 0 0 0 3px rgb(91 123 107 / 0.2); }
            .guest-layout input[type="checkbox"] { width: 1rem; height: 1rem; border-radius: 0.25rem; border: 1px solid #E5E3DF; margin-right: 0.5rem; vertical-align: middle; }
            .guest-layout .guest-actions { display: flex; align-items: center; justify-content: flex-end; margin-top: 1rem; gap: 0.75rem; }
            .guest-layout .guest-btn { display: inline-flex; padding: 0.5rem 1rem; font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; color: #fff; background: #5B7B6B; border: none; border-radius: 0.5rem; cursor: pointer; }
            .guest-layout .guest-btn:hover { background: #4A6A5A; }
            .guest-layout a { color: #5B7B6B; text-decoration: underline; }
            .guest-layout a:hover { color: #4A6A5A; }
            .guest-layout .guest-link-amber, .guest-layout .guest-link-accent { color: #9B8B7E; font-weight: 600; }
            .guest-layout .guest-link-amber:hover, .guest-layout .guest-link-accent:hover { color: #8A7A6D; }
            .guest-layout .guest-field { margin-top: 1rem; }
            .guest-layout .guest-remember { display: block; margin-top: 1rem; }
            .guest-layout .guest-remember span { font-size: 0.875rem; color: #6B6A65; vertical-align: middle; }
            .guest-layout .guest-footer { margin-top: 1.5rem; text-align: center; font-size: 0.875rem; color: #6B6A65; }
            .guest-layout .guest-errors { margin-top: 0.5rem; font-size: 0.875rem; color: #B86B6B; }
            .guest-layout .locale-flag { display: inline-block; line-height: 1; font-size: 1.25rem; }
        </style>

        <!-- Scripts -->
        <x-vite-assets />
    </head>
    <body class="guest-layout font-sans text-calm-charcoal antialiased">
        <div class="guest-page min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-calm-background">
            <div class="absolute top-4 {{ $localeDir === 'rtl' ? 'left-4' : 'right-4' }}">
                <x-language-switcher />
            </div>
            <div>
                <a href="/">
                    <x-application-logo class="guest-logo w-20 h-20 fill-current text-calm-muted" />
                </a>
            </div>

            <div class="guest-card w-full sm:max-w-md mt-6 px-6 py-4 bg-calm-card shadow-calm overflow-hidden sm:rounded-xl">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
