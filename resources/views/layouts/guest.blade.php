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

        <!-- Critical CSS: keeps login/register styled when Vite bundle fails to load -->
        <style>
            .guest-layout { font-family: 'Plus Jakarta Sans', ui-sans-serif, system-ui, sans-serif; -webkit-font-smoothing: antialiased; margin: 0; color: #0F172A; }
            .guest-layout .guest-page { min-height: 100vh; display: flex; flex-direction: column; justify-content: center; align-items: center; padding: 2rem 1rem; background: linear-gradient(180deg, #F8FAFC 0%, #FAFAFA 100%); }
            .guest-layout .guest-card { width: 100%; max-width: 28rem; margin-top: 1.5rem; padding: 2rem; background: #fff; box-shadow: 0 10px 40px -10px rgb(0 0 0 / 0.12); border-radius: 1rem; overflow: hidden; border: 1px solid #E2E8F0; }
            .guest-layout .guest-logo { width: 5rem; height: 5rem; color: #0D9488; }
            .guest-layout label { display: block; font-weight: 500; font-size: 0.875rem; color: #0F172A; margin-bottom: 0.25rem; }
            .guest-layout input[type="email"], .guest-layout input[type="password"], .guest-layout input[type="text"] { display: block; width: 100%; margin-top: 0.25rem; padding: 0.625rem 0.875rem; font-size: 1rem; border: 1px solid #E2E8F0; border-radius: 0.5rem; background: #fff; box-sizing: border-box; transition: border-color 0.2s, box-shadow 0.2s; }
            .guest-layout input:focus { outline: none; border-color: #0D9488; box-shadow: 0 0 0 3px rgb(13 148 136 / 0.15); }
            .guest-layout input[type="checkbox"] { width: 1rem; height: 1rem; border-radius: 0.25rem; border: 1px solid #E2E8F0; margin-right: 0.5rem; vertical-align: middle; }
            .guest-layout .guest-actions { display: flex; align-items: center; justify-content: flex-end; margin-top: 1.25rem; gap: 0.75rem; }
            .guest-layout .guest-btn { display: inline-flex; padding: 0.625rem 1.25rem; font-size: 0.875rem; font-weight: 600; color: #fff; background: #0D9488; border: none; border-radius: 0.5rem; cursor: pointer; transition: background 0.2s, box-shadow 0.2s; }
            .guest-layout .guest-btn:hover { background: #0F766E; box-shadow: 0 4px 12px rgb(13 148 136 / 0.3); }
            .guest-layout a { color: #0D9488; text-decoration: none; font-weight: 500; }
            .guest-layout a:hover { color: #0F766E; text-decoration: underline; }
            .guest-layout .guest-link-amber, .guest-layout .guest-link-accent { color: #0D9488; font-weight: 600; }
            .guest-layout .guest-link-amber:hover, .guest-layout .guest-link-accent:hover { color: #0F766E; }
            .guest-layout .guest-field { margin-top: 1rem; }
            .guest-layout .guest-remember { display: block; margin-top: 1rem; }
            .guest-layout .guest-remember span { font-size: 0.875rem; color: #64748B; vertical-align: middle; }
            .guest-layout .guest-footer { margin-top: 1.5rem; text-align: center; font-size: 0.875rem; color: #64748B; }
            .guest-layout .guest-errors { margin-top: 0.5rem; font-size: 0.875rem; color: #DC2626; }
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
                <a href="/" class="block">
                    <x-application-logo class="guest-logo w-16 h-16 fill-current text-calm-primary" />
                </a>
            </div>

            <div class="guest-card w-full sm:max-w-md mt-8 px-6 py-6 bg-white shadow-store-lg overflow-hidden sm:rounded-store-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
