@extends('layouts.home')

@section('content')
{{-- Hero section --}}
<section class="relative overflow-hidden bg-[#fafafa] py-20 sm:py-28 lg:py-36" aria-labelledby="hero-heading">
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 id="hero-heading" class="text-4xl sm:text-5xl lg:text-6xl font-bold text-[#111] tracking-tight leading-tight mb-6">
            {{ config('app.name') }}
        </h1>
        <p class="text-lg sm:text-xl text-[#6b7280] max-w-2xl mx-auto mb-12">
            {{ __('Discover our curated collection. Quality products, great prices.') }}
        </p>
        <a href="#products" class="inline-flex items-center justify-center px-8 py-4 bg-[#000] text-white text-base font-semibold rounded-lg hover:bg-[#333] transition-colors">
            {{ __('Shop Now') }}
        </a>
    </div>
</section>

{{-- Featured products (if any) --}}
@if(isset($featured) && $featured->isNotEmpty())
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24" aria-labelledby="featured-heading">
    <div class="flex items-center justify-between mb-12">
        <h2 id="featured-heading" class="text-2xl font-bold text-[#111] tracking-tight">{{ __('Featured') }}</h2>
        <a href="#products" class="text-sm font-semibold text-[#111] hover:text-[#333] hover:underline">
            {{ __('View all') }}
        </a>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8" role="list">
        @foreach($featured as $product)
            <div role="listitem">
                <x-product-card :product="$product" :show-badge-new="true" />
            </div>
        @endforeach
    </div>
</section>
@endif

{{-- Product gallery with filters --}}
<section id="products" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24" aria-labelledby="products-heading">
    <div class="mb-12">
        <h2 id="products-heading" class="text-2xl font-bold text-[#111] tracking-tight mb-8">
            {{ __('All Products') }}
        </h2>

        {{-- Filters & Sort bar --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-6 pb-6 border-b border-[#eee]">
            {{-- Category filter --}}
            <div class="flex flex-wrap items-center gap-2">
                <span class="text-sm font-medium text-[#6b7280] mr-2">{{ __('Category') }}:</span>
                <a
                    href="{{ route('home') }}"
                    class="px-4 py-2 text-sm font-medium rounded-lg transition-colors {{ !isset($categorySlug) || !$categorySlug ? 'bg-[#000] text-white' : 'bg-[#f5f5f5] text-[#111] hover:bg-[#eee]' }}"
                >
                    {{ __('All') }}
                </a>
                @foreach($categories as $cat)
                    <a
                        href="{{ route('home', ['category' => $cat->slug]) }}"
                        class="px-4 py-2 text-sm font-medium rounded-lg transition-colors {{ ($categorySlug ?? '') === $cat->slug ? 'bg-[#000] text-white' : 'bg-[#f5f5f5] text-[#111] hover:bg-[#eee]' }}"
                    >
                        {{ $cat->name }}
                    </a>
                @endforeach
            </div>

            {{-- Sort dropdown --}}
            <div class="flex items-center gap-2">
                <label for="sort-select" class="text-sm font-medium text-[#6b7280]">{{ __('Sort by') }}:</label>
                <form method="get" action="{{ route('home') }}" class="inline" id="sort-form">
                    @if($categorySlug ?? null)
                        <input type="hidden" name="category" value="{{ $categorySlug }}" />
                    @endif
                    <select
                        id="sort-select"
                        name="sort"
                        class="px-4 py-2 text-sm font-medium border border-[#eee] rounded-lg bg-white text-[#111] focus:outline-none focus:ring-2 focus:ring-[#000] focus:border-transparent"
                        aria-label="{{ __('Sort products') }}"
                        onchange="this.form.submit()"
                    >
                        <option value="newest" {{ ($sort ?? 'newest') === 'newest' ? 'selected' : '' }}>
                            {{ __('Newest') }}
                        </option>
                        <option value="price_asc" {{ ($sort ?? '') === 'price_asc' ? 'selected' : '' }}>
                            {{ __('Price: Low to High') }}
                        </option>
                        <option value="price_desc" {{ ($sort ?? '') === 'price_desc' ? 'selected' : '' }}>
                            {{ __('Price: High to Low') }}
                        </option>
                        <option value="oldest" {{ ($sort ?? '') === 'oldest' ? 'selected' : '' }}>
                            {{ __('Oldest') }}
                        </option>
                    </select>
                </form>
            </div>
        </div>
    </div>

    {{-- Product count --}}
    <p class="text-sm text-[#6b7280] mb-8">
        {{ $products->count() }} {{ __('products') }}
    </p>

    @if($products->isEmpty())
        {{-- Empty state --}}
        <div class="flex flex-col items-center justify-center py-16 lg:py-24 px-8 bg-white border border-[#eee] rounded-xl text-center">
            <h3 class="text-lg font-semibold text-[#111] mb-2">{{ __('No products found') }}</h3>
            <p class="text-[#6b7280] mb-8 max-w-md">
                {{ __('Try adjusting your filters or browse our full collection.') }}
            </p>
            <a
                href="{{ route('home') }}"
                class="inline-flex items-center justify-center px-6 py-3 bg-[#000] text-white text-sm font-semibold rounded-lg hover:bg-[#333] transition-colors"
            >
                {{ __('Reset Filters') }}
            </a>
        </div>
    @else
        {{-- Product grid: 1 col mobile, 2 tablet, 3-4 desktop --}}
        <div
            class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 lg:gap-8"
            role="list"
            aria-label="{{ __('Product grid') }}"
        >
            @foreach($products as $product)
                <div role="listitem">
                    <x-product-card :product="$product" :show-badge-new="false" />
                </div>
            @endforeach
        </div>
    @endif
</section>
@endsection
