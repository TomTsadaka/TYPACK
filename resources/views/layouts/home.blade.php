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

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=sora:300,400,500,600,700&display=swap" rel="stylesheet" />

        <style>
            .shop-layout { font-family: 'Sora', ui-sans-serif, system-ui, sans-serif; -webkit-font-smoothing: antialiased; margin: 0; color: #1c1917; background: #fafaf9; min-height: 100vh; }
            .shop-layout .shop-promo { background: #0f766e; color: #fff; text-align: center; padding: 0.5rem 1rem; font-size: 0.8125rem; font-weight: 500; }
            .shop-layout .shop-nav { background: #fff; border-bottom: 1px solid #e7e5e4; box-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.04); }
            .shop-layout .shop-nav a { color: #1c1917; text-decoration: none; font-weight: 500; }
            .shop-layout .shop-nav a:hover { color: #0f766e; }
            .shop-layout .shop-nav .nav-active { color: #0f766e; font-weight: 600; }
            .shop-layout .shop-logo { width: 2rem; height: 2rem; max-width: 2rem; max-height: 2rem; display: block; }
            .shop-layout .shop-search { padding: 0.5rem 1rem; border: 1px solid #e7e5e4; border-radius: 0.5rem; font-size: 0.875rem; width: 100%; max-width: 16rem; background: #fafaf9; }
            .shop-layout .shop-search::placeholder { color: #a8a29e; }
            .shop-layout .shop-search:focus { outline: none; border-color: #0f766e; }
            .shop-layout .shop-cart-btn { position: relative; padding: 0.5rem; color: #1c1917; }
            .shop-layout .shop-cart-btn:hover { color: #0f766e; }
            .shop-layout .product-card { background: #fff; border: 1px solid #e7e5e4; border-radius: 1rem; overflow: hidden; box-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.04); transition: box-shadow 0.2s, border-color 0.2s, transform 0.2s; }
            .shop-layout .product-card:hover { box-shadow: 0 12px 28px -8px rgb(0 0 0 / 0.12); border-color: #d6d3d1; transform: translateY(-2px); }
            .shop-layout .product-card a { text-decoration: none; color: inherit; display: block; }
            .shop-layout .product-img-wrap { aspect-ratio: 1; background: #f5f5f4; overflow: hidden; position: relative; }
            .shop-layout .product-img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s; }
            .shop-layout .product-card:hover .product-img { transform: scale(1.03); }
            .shop-layout .product-badge { position: absolute; top: 0.75rem; left: 0.75rem; padding: 0.25rem 0.5rem; font-size: 0.6875rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; border-radius: 0.25rem; z-index: 1; }
            .shop-layout .product-badge-sale { background: #dc2626; color: #fff; }
            .shop-layout .product-badge-new { background: #0f766e; color: #fff; }
            .shop-layout .product-body { padding: 1rem 1.25rem; }
            .shop-layout .product-title { font-size: 0.9375rem; font-weight: 600; color: #1c1917; margin: 0 0 0.375rem 0; line-height: 1.4; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
            .shop-layout .product-price { font-size: 1rem; font-weight: 600; color: #0f766e; }
            .shop-layout .product-price-sale { color: #dc2626; }
            .shop-layout .product-price-old { font-size: 0.8125rem; color: #78716c; text-decoration: line-through; margin-right: 0.5rem; }
            .shop-layout .shop-footer { background: #1c1917; color: #a8a29e; padding: 3rem 1.5rem 2rem; margin-top: 4rem; }
            .shop-layout .shop-footer a { color: #d6d3d1; text-decoration: none; }
            .shop-layout .shop-footer a:hover { color: #fff; }
            .shop-layout .shop-btn { display: inline-flex; align-items: center; justify-content: center; padding: 0.75rem 1.5rem; font-size: 0.9375rem; font-weight: 600; color: #fff; background: #0f766e; border: none; border-radius: 0.5rem; cursor: pointer; transition: all 0.2s; }
            .shop-layout .shop-btn:hover { background: #0d9488; }
            .shop-layout .shop-btn-lg { padding: 1rem 2rem; font-size: 1rem; }
            .shop-layout .locale-flag { display: inline-block; line-height: 1; font-size: 1.25rem; }
        </style>

        <x-vite-assets />
    </head>
    <body class="shop-layout">
        <!-- Promo bar -->
        <div class="shop-promo">
            {{ __('Free shipping on orders over 200 ₪') }} · {{ __('Secure checkout') }}
        </div>

        <!-- Main nav -->
        <nav class="shop-nav">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16 gap-4">
                    <div class="flex items-center gap-8 min-w-0">
                        <a href="{{ route('home') }}" class="flex items-center gap-2 shrink-0">
                            <x-application-logo class="shop-logo fill-current text-[#0f766e]" width="32" height="32" style="max-width:2rem;max-height:2rem;width:2rem;height:2rem;" />
                            <span class="text-base font-bold text-[#1c1917] hidden sm:block tracking-tight">{{ config('app.name') }}</span>
                        </a>
                        <div class="hidden lg:flex items-center gap-6">
                            <a href="{{ route('home') }}" class="text-sm font-medium nav-active">{{ __('Shop') }}</a>
                            @foreach($categories->take(5) as $cat)
                                <a href="{{ route('home') }}?category={{ $cat->slug }}" class="text-sm font-medium">{{ $cat->name }}</a>
                            @endforeach
                        </div>
                    </div>

                    <div class="hidden sm:flex flex-1 max-w-xs lg:max-w-sm mx-4">
                        <input type="search" placeholder="{{ __('Search products...') }}" class="shop-search" aria-label="{{ __('Search') }}" />
                    </div>

                    <div class="flex items-center gap-2 sm:gap-4 shrink-0">
                        <x-language-switcher />
                        <a href="{{ route('home') }}#products" class="shop-cart-btn" title="{{ __('Cart') }}" aria-label="{{ __('Cart') }}">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" /></svg>
                        </a>
                        @auth
                            <a href="{{ route('dashboard') }}" class="text-sm font-medium hidden sm:block">{{ __('Account') }}</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm font-medium hidden sm:block">{{ __('Log in') }}</a>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        <main class="min-h-[60vh]">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="shop-footer">
            <div class="max-w-7xl mx-auto">
                <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-4 mb-10">
                    <div>
                        <h3 class="font-semibold text-white mb-4">{{ config('app.name') }}</h3>
                        <p class="text-sm text-[#a8a29e] leading-relaxed">{{ __('Quality products, delivered to your door.') }}</p>
                    </div>
                    <div>
                        <h4 class="font-semibold text-white text-sm mb-3">{{ __('Shop') }}</h4>
                        <ul class="space-y-2 text-sm">
                            <li><a href="{{ route('home') }}">{{ __('All Products') }}</a></li>
                            @foreach($categories->take(4) as $cat)
                                <li><a href="{{ route('home') }}?category={{ $cat->slug }}">{{ $cat->name }}</a></li>
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
                        <p class="text-sm text-[#a8a29e]">{{ __('Questions? We\'re here to help.') }}</p>
                    </div>
                </div>
                <div class="pt-6 border-t border-[#44403c] text-sm text-[#78716c]">
                    © {{ date('Y') }} {{ config('app.name') }}. {{ __('All rights reserved.') }}
                </div>
            </div>
        </footer>
    </body>
</html>
