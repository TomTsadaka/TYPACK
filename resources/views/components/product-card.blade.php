@props(['product', 'showBadgeNew' => false])

@php
    $isOnSale = $product->sale_price && $product->sale_price < $product->price;
    $displayPrice = $isOnSale ? $product->sale_price : ($product->price ?? 0);
@endphp

<article
    class="group relative bg-white border border-[#eee] rounded-xl overflow-hidden transition-all duration-300 hover:shadow-[0_12px_40px_-12px_rgba(0,0,0,0.12)] hover:-translate-y-1"
    itemscope
    itemtype="https://schema.org/Product"
>
    {{-- Image container: 4:5 aspect ratio --}}
    <a
        href="{{ route('product.show', $product->slug) }}"
        class="block relative aspect-[4/5] bg-[#f5f5f5] overflow-hidden"
        aria-label="{{ __('View') }}: {{ $product->title }}"
    >
        @if($product->featured_image_url)
            <img
                src="{{ asset($product->featured_image_url) }}"
                alt="{{ $product->title }}"
                class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-105"
                loading="lazy"
                decoding="async"
            />
        @else
            <div class="w-full h-full flex items-center justify-center text-[#9ca3af] text-sm" aria-hidden="true">
                {{ __('No image') }}
            </div>
        @endif

        {{-- Badge: Sale or New --}}
        @if($isOnSale)
            <span
                class="absolute top-3 left-3 px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider bg-[#000] text-white rounded-md"
                aria-label="{{ __('On sale') }}"
            >
                {{ __('Sale') }}
            </span>
        @elseif($showBadgeNew)
            <span
                class="absolute top-3 left-3 px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider bg-[#000] text-white rounded-md"
                aria-label="{{ __('New arrival') }}"
            >
                {{ __('New') }}
            </span>
        @endif

        {{-- Quick actions: Add to Cart overlay (always on mobile, hover on desktop) --}}
        <div class="absolute inset-x-0 bottom-0 p-4 bg-gradient-to-t from-black/60 to-transparent opacity-100 sm:opacity-0 sm:group-hover:opacity-100 transition-opacity duration-300">
            <div class="flex gap-2">
                <a
                    href="{{ route('product.show', $product->slug) }}"
                    class="flex-1 flex items-center justify-center gap-2 py-2.5 px-4 bg-white text-[#111] text-sm font-semibold rounded-lg hover:bg-[#f5f5f5] transition-colors"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7C4.732 19 7.523 19 12 19c4.478 0 8.268-2.943 9.542-7z" />
                    </svg>
                    {{ __('Quick View') }}
                </a>
                <a
                    href="{{ route('product.show', $product->slug) }}"
                    class="flex-1 flex items-center justify-center gap-2 py-2.5 px-4 bg-[#000] text-white text-sm font-semibold rounded-lg hover:bg-[#333] transition-colors"
                    aria-label="{{ __('Add to cart') }}: {{ $product->title }}"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    {{ __('Add to Cart') }}
                </a>
            </div>
        </div>
    </a>

    {{-- Content --}}
    <div class="p-5">
        <a href="{{ route('product.show', $product->slug) }}" class="block">
            <h2
                class="font-bold text-[#111] text-[15px] leading-snug line-clamp-2 mb-2 group-hover:text-[#333] transition-colors"
                itemprop="name"
            >
                {{ $product->title }}
            </h2>
            <div class="flex items-baseline gap-2" itemprop="offers" itemscope itemtype="https://schema.org/Offer">
                @if($isOnSale)
                    <span class="text-sm text-[#9ca3af] line-through">
                        {{ number_format($product->price, 0) }} ₪
                    </span>
                    <span class="font-bold text-[#111] text-lg" itemprop="price" content="{{ $displayPrice }}">
                        {{ number_format($displayPrice, 0) }} ₪
                    </span>
                @else
                    <span class="font-bold text-[#111] text-lg" itemprop="price" content="{{ $displayPrice }}">
                        {{ number_format($displayPrice, 0) }} ₪
                    </span>
                @endif
            </div>
        </a>
    </div>
</article>
