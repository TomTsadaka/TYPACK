@extends('layouts.home')

@section('content')
{{-- Hero section --}}
<section class="relative overflow-hidden bg-gradient-to-br from-[#0f766e]/10 via-[#fafaf9] to-[#f5f5f4] py-16 sm:py-24 lg:py-32">
    <div class="absolute inset-0 opacity-30">
        <div class="absolute top-0 right-0 w-96 h-96 bg-[#0f766e]/20 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-[#0f766e]/15 rounded-full blur-3xl translate-y-1/2 -translate-x-1/2"></div>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <p class="text-sm font-semibold text-[#0f766e] uppercase tracking-widest mb-4">{{ __('Welcome to') }}</p>
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-[#1c1917] tracking-tight leading-tight mb-6">
            {{ config('app.name') }}
        </h1>
        <p class="text-lg sm:text-xl text-[#78716c] max-w-2xl mx-auto mb-10">
            {{ __('Discover our curated collection. Quality products, great prices.') }}
        </p>
        <a href="#products" class="shop-btn shop-btn-lg inline-flex">
            {{ __('Shop Now') }}
            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
        </a>
    </div>
</section>

{{-- Featured products (if any) --}}
@if(isset($featured) && $featured->isNotEmpty())
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-16">
    <div class="flex items-center justify-between mb-8">
        <h2 class="text-2xl font-bold text-[#1c1917] tracking-tight">{{ __('Featured') }}</h2>
        <a href="#products" class="text-sm font-semibold text-[#0f766e] hover:text-[#0d9488]">{{ __('View all') }} →</a>
    </div>
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 sm:gap-6">
        @foreach($featured as $product)
            <article class="product-card">
                <a href="{{ route('product.show', $product->slug) }}">
                    <div class="product-img-wrap">
                        @if($product->featured_image_url)
                            <img src="{{ asset($product->featured_image_url) }}" alt="{{ $product->title }}" class="product-img" loading="lazy" />
                        @else
                            <div class="w-full h-full flex items-center justify-center text-[#a8a29e] text-sm">{{ __('No image') }}</div>
                        @endif
                        <span class="product-badge product-badge-new">{{ __('New') }}</span>
                    </div>
                    <div class="product-body">
                        <h2 class="product-title">{{ $product->title }}</h2>
                        <div class="flex items-baseline gap-2 flex-wrap">
                            @if($product->sale_price && $product->sale_price < $product->price)
                                <span class="product-price-old">{{ number_format($product->price, 0) }} ₪</span>
                                <span class="product-price product-price-sale">{{ number_format($product->sale_price, 0) }} ₪</span>
                            @else
                                <span class="product-price">{{ number_format($product->price ?? 0, 0) }} ₪</span>
                            @endif
                        </div>
                    </div>
                </a>
            </article>
        @endforeach
    </div>
</section>
@endif

{{-- All products --}}
<section id="products" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-16">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
        <h2 class="text-2xl font-bold text-[#1c1917] tracking-tight">{{ __('All Products') }}</h2>
        <p class="text-sm text-[#78716c]">{{ $products->count() }} {{ __('products') }}</p>
    </div>

    @if($products->isEmpty())
        <div class="rounded-xl border border-[#e7e5e4] bg-white p-16 text-center">
            <svg class="w-16 h-16 mx-auto text-[#d6d3d1] mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" /></svg>
            <p class="text-[#78716c] text-lg">{{ __('No products yet. Check back soon!') }}</p>
        </div>
    @else
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 sm:gap-6">
            @foreach($products as $product)
                <article class="product-card">
                    <a href="{{ route('product.show', $product->slug) }}">
                        <div class="product-img-wrap">
                            @if($product->featured_image_url)
                                <img src="{{ asset($product->featured_image_url) }}" alt="{{ $product->title }}" class="product-img" loading="lazy" />
                            @else
                                <div class="w-full h-full flex items-center justify-center text-[#a8a29e] text-sm">{{ __('No image') }}</div>
                            @endif
                            @if($product->sale_price && $product->sale_price < $product->price)
                                <span class="product-badge product-badge-sale">{{ __('Sale') }}</span>
                            @endif
                        </div>
                        <div class="product-body">
                            <h2 class="product-title">{{ $product->title }}</h2>
                            <div class="flex items-baseline gap-2 flex-wrap">
                                @if($product->sale_price && $product->sale_price < $product->price)
                                    <span class="product-price-old">{{ number_format($product->price, 0) }} ₪</span>
                                    <span class="product-price product-price-sale">{{ number_format($product->sale_price, 0) }} ₪</span>
                                @else
                                    <span class="product-price">{{ number_format($product->price ?? 0, 0) }} ₪</span>
                                @endif
                            </div>
                        </div>
                    </a>
                </article>
            @endforeach
        </div>
    @endif
</section>
@endsection
