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

        <!-- Critical CSS: keeps login/register styled when Vite bundle fails to load -->
        <style>
            .guest-layout { font-family: 'Sora', ui-sans-serif, system-ui, sans-serif; -webkit-font-smoothing: antialiased; margin: 0; color: #1c1917; }
            .guest-layout .guest-page { min-height: 100vh; display: flex; flex-direction: column; justify-content: center; align-items: center; padding: 2rem 1rem; background: linear-gradient(165deg, #fafaf9 0%, #f5f5f4 50%, #fafaf9 100%); }
            .guest-layout .guest-card { width: 100%; max-width: 28rem; margin-top: 2rem; padding: 2.5rem; background: #fff; box-shadow: 0 12px 32px -8px rgb(0 0 0 / 0.08), 0 4px 12px -4px rgb(0 0 0 / 0.04); border-radius: 1rem; overflow: hidden; border: 1px solid #e7e5e4; }
            .guest-layout .guest-logo { width: 2.5rem; height: 2.5rem; max-width: 2.5rem; max-height: 2.5rem; color: #0f766e; display: block; }
            .guest-layout label { display: block; font-weight: 500; font-size: 0.875rem; color: #1c1917; margin-bottom: 0.375rem; letter-spacing: -0.01em; }
            .guest-layout input[type="email"], .guest-layout input[type="password"], .guest-layout input[type="text"] { display: block; width: 100%; margin-top: 0.25rem; padding: 0.75rem 1rem; font-size: 1rem; border: 1px solid #e7e5e4; border-radius: 0.5rem; background: #fff; box-sizing: border-box; transition: border-color 0.2s, box-shadow 0.2s; box-shadow: inset 0 1px 2px 0 rgb(0 0 0 / 0.03); }
            .guest-layout input:focus { outline: none; border-color: #0f766e; box-shadow: 0 0 0 3px rgb(15 118 110 / 0.12); }
            .guest-layout input[type="checkbox"] { width: 1rem; height: 1rem; border-radius: 0.25rem; border: 1px solid #e7e5e4; margin-right: 0.5rem; vertical-align: middle; accent-color: #0f766e; }
            .guest-layout .guest-actions { display: flex; align-items: center; justify-content: flex-end; margin-top: 1.5rem; gap: 0.75rem; }
            .guest-layout .guest-btn { display: inline-flex; padding: 0.75rem 1.5rem; font-size: 0.875rem; font-weight: 600; color: #fff; background: #0f766e; border: none; border-radius: 0.5rem; cursor: pointer; transition: all 0.2s; box-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.06); }
            .guest-layout .guest-btn:hover { background: #0d9488; box-shadow: 0 0 0 1px rgb(15 118 110 / 0.1), 0 4px 14px -2px rgb(15 118 110 / 0.25); }
            .guest-layout a { color: #0f766e; text-decoration: none; font-weight: 500; }
            .guest-layout a:hover { color: #0d9488; text-decoration: underline; }
            .guest-layout .guest-link-accent { color: #0f766e; font-weight: 600; }
            .guest-layout .guest-link-accent:hover { color: #0d9488; }
            .guest-layout .guest-field { margin-top: 1.25rem; }
            .guest-layout .guest-remember { display: block; margin-top: 1rem; }
            .guest-layout .guest-remember span { font-size: 0.875rem; color: #78716c; vertical-align: middle; }
            .guest-layout .guest-footer { margin-top: 1.75rem; text-align: center; font-size: 0.875rem; color: #78716c; }
            .guest-layout .guest-errors { margin-top: 0.5rem; font-size: 0.875rem; color: #dc2626; }
            .guest-layout .locale-flag { display: inline-block; line-height: 1; font-size: 1.25rem; }
            .guest-layout .guest-heading { font-size: 1.5rem; font-weight: 600; letter-spacing: -0.025em; color: #1c1917; line-height: 1.3; }
            .guest-layout .guest-subheading { font-size: 0.9375rem; color: #78716c; margin-top: 0.5rem; line-height: 1.5; }
        </style>

        <!-- Scripts -->
        <x-vite-assets />
    </head>
    <body class="guest-layout font-sans text-calm-charcoal antialiased">
        <div class="guest-page min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-calm-background">
            <div class="absolute top-5 {{ $localeDir === 'rtl' ? 'left-5' : 'right-5' }}">
                <x-language-switcher />
            </div>
            <div class="flex flex-col items-center">
                <a href="/" class="block transition-transform hover:scale-105 duration-200">
                    <x-application-logo class="guest-logo w-10 h-10 fill-current text-calm-primary" width="40" height="40" style="max-width:2.5rem;max-height:2.5rem;width:2.5rem;height:2.5rem;" />
                </a>
                <span class="mt-2 text-xs font-medium tracking-wide text-calm-muted uppercase">{{ config('app.name') }}</span>
            </div>

            <div class="guest-card w-full sm:max-w-md mt-10 px-6 py-8 bg-white shadow-store-lg overflow-hidden sm:rounded-store-xl border border-calm-border">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
