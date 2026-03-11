@extends('layouts.home')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 lg:py-12">
    {{-- Breadcrumbs --}}
    <nav class="flex items-center gap-2 text-sm text-[#78716c] mb-8" aria-label="{{ __('Breadcrumb') }}">
        <a href="{{ route('home') }}" class="hover:text-[#0f766e]">{{ __('Shop') }}</a>
        <span aria-hidden="true">/</span>
        <span class="text-[#1c1917] font-medium">{{ $product->title }}</span>
    </nav>

    <div class="grid lg:grid-cols-2 gap-10 lg:gap-16">
        {{-- Image gallery --}}
        <div class="space-y-4">
            <div class="aspect-square rounded-xl overflow-hidden bg-[#f5f5f4] shadow-store-lg">
                @if($product->featured_image_url)
                    <img id="product-main-img" src="{{ asset($product->featured_image_url) }}" alt="{{ $product->title }}" class="w-full h-full object-cover" />
                @else
                    <div class="w-full h-full flex items-center justify-center text-[#a8a29e] text-lg">{{ __('No image') }}</div>
                @endif
            </div>
            @if($product->images->count() > 1)
                <div class="flex gap-3 overflow-x-auto pb-2">
                    @foreach($product->images as $img)
                        <button type="button" class="flex-shrink-0 w-20 h-20 rounded-lg overflow-hidden border-2 border-transparent hover:border-[#0f766e] focus:border-[#0f766e] focus:outline-none transition-colors" onclick="document.getElementById('product-main-img').src='{{ asset($img->url) }}'">
                            <img src="{{ asset($img->url) }}" alt="" class="w-full h-full object-cover" />
                        </button>
                    @endforeach
                </div>
            @endif
        </div>

        {{-- Product info --}}
        <div>
            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-[#1c1917] tracking-tight mb-4">{{ $product->title }}</h1>

            <div class="flex items-baseline gap-3 mb-6">
                @if($product->sale_price && $product->sale_price < $product->price)
                    <span class="text-xl text-[#78716c] line-through">{{ number_format($product->price, 0) }} ₪</span>
                    <span class="text-2xl font-bold text-[#dc2626]">{{ number_format($product->sale_price, 0) }} ₪</span>
                    <span class="px-2 py-0.5 text-xs font-bold bg-[#dc2626]/10 text-[#dc2626] rounded">{{ __('Sale') }}</span>
                @else
                    <span class="text-2xl font-bold text-[#0f766e]">{{ number_format($product->price ?? 0, 0) }} ₪</span>
                @endif
            </div>

            @if($product->description)
                <div class="prose prose-stone max-w-none text-[#44403c] mb-8 leading-relaxed">
                    {!! nl2br(e($product->description)) !!}
                </div>
            @endif

            {{-- Add to cart (placeholder - links to API or future cart) --}}
            <div class="flex flex-wrap gap-4">
                <button type="button" class="shop-btn shop-btn-lg flex-1 sm:flex-initial min-w-[12rem]" title="{{ __('Add to cart') }}">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" /></svg>
                    {{ __('Add to Cart') }}
                </button>
                <a href="{{ route('home') }}" class="inline-flex items-center justify-center px-6 py-3 border-2 border-[#e7e5e4] rounded-lg font-semibold text-[#1c1917] hover:border-[#0f766e] hover:text-[#0f766e] transition-colors">
                    {{ __('Continue Shopping') }}
                </a>
            </div>

            {{-- Trust badges --}}
            <div class="mt-10 pt-8 border-t border-[#e7e5e4] grid grid-cols-2 gap-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg bg-[#0f766e]/10 flex items-center justify-center">
                        <svg class="w-5 h-5 text-[#0f766e]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" /></svg>
                    </div>
                    <div>
                        <p class="font-semibold text-[#1c1917] text-sm">{{ __('Free Shipping') }}</p>
                        <p class="text-xs text-[#78716c]">{{ __('On orders over 200 ₪') }}</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg bg-[#0f766e]/10 flex items-center justify-center">
                        <svg class="w-5 h-5 text-[#0f766e]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
                    </div>
                    <div>
                        <p class="font-semibold text-[#1c1917] text-sm">{{ __('Secure Checkout') }}</p>
                        <p class="text-xs text-[#78716c]">{{ __('SSL encrypted') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
