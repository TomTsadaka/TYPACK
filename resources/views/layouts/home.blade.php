@php
    $localeDir = config('locales.available.'.app()->getLocale().'.dir', 'ltr');
    $categories = \App\Models\Category::query()
        ->whereNull('parent_id')
        ->where('is_active', true)
        ->orderBy('sort_order')
        ->get();
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ $localeDir }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', __('Shop')) – {{ config('app.name') }}</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <style>
            .shop-layout { font-family: 'Inter', ui-sans-serif, system-ui, sans-serif; -webkit-font-smoothing: antialiased; margin: 0; color: #111; background: #fafafa; min-height: 100vh; }
            .shop-layout .shop-promo { background: #111; color: #fff; text-align: center; padding: 12px 16px; font-size: 13px; font-weight: 500; }
            .shop-layout .shop-nav { background: #fff; border-bottom: 1px solid #eee; }
            .shop-layout .shop-nav a { color: #111; text-decoration: none; font-weight: 500; }
            .shop-layout .shop-nav a:hover { color: #333; }
            .shop-layout .shop-nav .nav-active { color: #111; font-weight: 600; }
            .shop-layout .shop-logo { width: 32px; height: 32px; display: block; }
            .shop-layout .shop-search { padding: 10px 16px; border: 1px solid #eee; border-radius: 8px; font-size: 14px; width: 100%; max-width: 280px; background: #fafafa; }
            .shop-layout .shop-search::placeholder { color: #9ca3af; }
            .shop-layout .shop-search:focus { outline: none; border-color: #111; box-shadow: 0 0 0 2px rgba(0,0,0,0.1); }
            .shop-layout .shop-cart-btn { padding: 8px; color: #111; border-radius: 8px; }
            .shop-layout .shop-cart-btn:hover { background: #f5f5f5; color: #333; }
            .shop-layout .shop-footer { background: #111; color: #9ca3af; padding: 48px 24px 32px; margin-top: 64px; }
            .shop-layout .shop-footer a { color: #d1d5db; text-decoration: none; }
            .shop-layout .shop-footer a:hover { color: #fff; }
            .shop-layout .locale-flag { display: inline-block; line-height: 1; font-size: 1.25rem; }
            .line-clamp-2 { display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
        </style>

        <x-vite-assets />
    </head>
    <body class="shop-layout">
        {{-- Promo bar --}}
        <div class="shop-promo" role="banner">
            {{ __('Free shipping on orders over 200 ₪') }} · {{ __('Secure checkout') }}
        </div>

        {{-- Main nav --}}
        <nav class="shop-nav" role="navigation" aria-label="{{ __('Main navigation') }}">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16 gap-4">
                    <div class="flex items-center gap-8 min-w-0">
                        <a href="{{ route('home') }}" class="flex items-center shrink-0">
                            <x-application-logo class="text-base font-bold text-[#111] tracking-tight" />
                        </a>
                        <div class="hidden lg:flex items-center gap-6">
                            <a href="{{ route('home') }}" class="text-sm font-medium nav-active">{{ __('Shop') }}</a>
                            @foreach($categories->take(5) as $cat)
                                <a href="{{ route('home', ['category' => $cat->slug]) }}" class="text-sm font-medium">{{ $cat->name }}</a>
                            @endforeach
                        </div>
                    </div>

                    <div class="hidden sm:flex flex-1 max-w-xs lg:max-w-sm mx-4">
                        <input type="search" placeholder="{{ __('Search products...') }}" class="shop-search" aria-label="{{ __('Search products') }}" />
                    </div>

                    <div class="flex items-center gap-2 sm:gap-4 shrink-0">
                        <x-language-switcher />
                        @auth
                            <a href="{{ route('dashboard') }}" class="text-sm font-medium hidden sm:block">{{ __('Account') }}</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm font-medium hidden sm:block">{{ __('Log in') }}</a>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        <main class="min-h-[60vh]" id="main-content">
            @yield('content')
        </main>

        {{-- Footer --}}
        <footer class="shop-footer" role="contentinfo">
            <div class="max-w-7xl mx-auto">
                <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-4 mb-10">
                    <div>
                        <h3 class="font-semibold text-white mb-4">{{ config('app.name') }}</h3>
                        <p class="text-sm text-[#9ca3af] leading-relaxed">{{ __('Quality products, delivered to your door.') }}</p>
                    </div>
                    <div>
                        <h4 class="font-semibold text-white text-sm mb-3">{{ __('Shop') }}</h4>
                        <ul class="space-y-2 text-sm">
                            <li><a href="{{ route('home') }}">{{ __('All Products') }}</a></li>
                            @foreach($categories->take(4) as $cat)
                                <li><a href="{{ route('home', ['category' => $cat->slug]) }}">{{ $cat->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-semibold text-white text-sm mb-3">{{ __('Account') }}</h4>
                        <ul class="space-y-2 text-sm">
                            @auth
                                <li><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
                                <li><a href="{{ route('profile.edit') }}">{{ __('Profile') }}</a></li>
                            @else
                                <li><a href="{{ route('login') }}">{{ __('Log in') }}</a></li>
                                <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
                            @endauth
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-semibold text-white text-sm mb-3">{{ __('Contact') }}</h4>
                        <p class="text-sm text-[#9ca3af]">{{ __('Questions? We\'re here to help.') }}</p>
                    </div>
                </div>
                <div class="pt-6 border-t border-[#374151] text-sm text-[#6b7280]">
                    © {{ date('Y') }} {{ config('app.name') }}. {{ __('All rights reserved.') }}
                </div>
            </div>
        </footer>
    </body>
</html>
