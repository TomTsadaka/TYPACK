@extends('layouts.home')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-16">
    {{-- Breadcrumbs --}}
    <nav class="flex items-center gap-2 text-sm text-[#6b7280] mb-8" aria-label="{{ __('Breadcrumb') }}">
        <a href="{{ route('home') }}" class="hover:text-[#111]">{{ __('Shop') }}</a>
        <span aria-hidden="true">/</span>
        <span class="text-[#111] font-medium">{{ $product->title }}</span>
    </nav>

    <div class="grid lg:grid-cols-2 gap-12 lg:gap-16">
        {{-- Image gallery --}}
        <div class="space-y-4">
            <div class="aspect-square rounded-xl overflow-hidden bg-[#f5f5f5] border border-[#eee]">
                @if($product->featured_image_url)
                    <img id="product-main-img" src="{{ asset($product->featured_image_url) }}" alt="{{ $product->title }}" class="w-full h-full object-cover" />
                @else
                    <div class="w-full h-full flex items-center justify-center text-[#a8a29e] text-lg">{{ __('No image') }}</div>
                @endif
            </div>
            @if($product->images->count() > 1)
                <div class="flex gap-3 overflow-x-auto pb-2">
                    @foreach($product->images as $img)
                        <button type="button" class="flex-shrink-0 w-20 h-20 rounded-lg overflow-hidden border-2 border-transparent hover:border-[#111] focus:border-[#111] focus:outline-none transition-colors" onclick="document.getElementById('product-main-img').src='{{ asset($img->url) }}'" aria-label="{{ __('View image') }}">
                            <img src="{{ asset($img->url) }}" alt="" class="w-full h-full object-cover" />
                        </button>
                    @endforeach
                </div>
            @endif
        </div>

        {{-- Product info --}}
        <div>
            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-[#111] tracking-tight mb-6">{{ $product->title }}</h1>

            <div class="flex items-baseline gap-3 mb-8">
                @if($product->sale_price && $product->sale_price < $product->price)
                    <span class="text-xl text-[#9ca3af] line-through">{{ number_format($product->price, 0) }} ₪</span>
                    <span class="text-2xl font-bold text-[#111]">{{ number_format($product->sale_price, 0) }} ₪</span>
                    <span class="px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider bg-[#000] text-white rounded-md">{{ __('Sale') }}</span>
                @else
                    <span class="text-2xl font-bold text-[#111]">{{ number_format($product->price ?? 0, 0) }} ₪</span>
                @endif
            </div>

            @if($product->description)
                <div class="prose prose-stone max-w-none text-[#4b5563] mb-8 leading-relaxed">
                    {!! nl2br(e($product->description)) !!}
                </div>
            @endif

            {{-- Add to cart --}}
            <div class="flex flex-wrap gap-4">
                <button type="button" class="flex-1 sm:flex-initial min-w-[12rem] inline-flex items-center justify-center gap-2 px-8 py-4 bg-[#000] text-white text-base font-semibold rounded-lg hover:bg-[#333] transition-colors" title="{{ __('Add to cart') }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" /></svg>
                    {{ __('Add to Cart') }}
                </button>
                <a href="{{ route('home') }}" class="inline-flex items-center justify-center px-6 py-4 border border-[#eee] rounded-lg font-semibold text-[#111] hover:border-[#111] hover:bg-[#fafafa] transition-colors">
                    {{ __('Continue Shopping') }}
                </a>
            </div>

            {{-- Trust badges --}}
            <div class="mt-12 pt-8 border-t border-[#eee] grid grid-cols-2 gap-6">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-lg bg-[#f5f5f5] flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-[#111]" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" /></svg>
                    </div>
                    <div>
                        <p class="font-semibold text-[#111] text-sm">{{ __('Free Shipping') }}</p>
                        <p class="text-xs text-[#6b7280]">{{ __('On orders over 200 ₪') }}</p>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-lg bg-[#f5f5f5] flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-[#111]" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
                    </div>
                    <div>
                        <p class="font-semibold text-[#111] text-sm">{{ __('Secure Checkout') }}</p>
                        <p class="text-xs text-[#6b7280]">{{ __('SSL encrypted') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
