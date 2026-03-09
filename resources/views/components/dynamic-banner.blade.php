@php
use App\Models\Banner;

/** @var \Illuminate\View\Component $component */
/** @var string|null $title */
/** @var string|null $subtitle */
/** @var string $image */
/** @var string|null $mobileImage */
/** @var string|null $link */
/** @var bool $isActive */
/** @var bool $showTitle = true */
/** @var bool $showSubtitle = true */
/** @var string $size = 'full' */
?>

@if ($isActive)
    @if($link)
        <a href="{{ $link }}" class="block group relative overflow-hidden rounded-lg">
    @else
        <div class="group relative overflow-hidden rounded-lg">
    @endif

    {{-- Mobile Image --}}
    <div class="lg:hidden">
        <img 
            src="{{ $mobileImage ?: $image }}" 
            alt="{{ $title ?? 'Banner' }}"
            class="w-full max-h-40 h-36 object-cover object-center transition-transform duration-300 group-hover:scale-105"
        >
    </div>

    {{-- Desktop Image --}}
    <div class="hidden lg:block">
        <img 
            src="{{ $image }}" 
            alt="{{ $title ?? 'Banner' }}"
            class="w-full {{ $size === 'full' ? 'max-h-48 md:max-h-56 h-40 md:h-48' : 'max-h-36 md:max-h-44 h-32 md:h-40' }} object-cover object-center transition-transform duration-300 group-hover:scale-105"
        >
    </div>

    {{-- Content Overlay --}}
    @if ($showTitle || $showSubtitle)
        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex items-end p-4">
            <div class="text-white">
                @if ($showTitle && $title)
                    <h2 class="text-lg md:text-xl font-bold mb-1">{{ $title }}</h2>
                @endif
                
                @if ($showSubtitle && $subtitle)
                    <p class="text-xs md:text-sm opacity-90">{{ $subtitle }}</p>
                @endif
            </div>
        </div>
    @endif

    @if($link)
        </a>
    @else
        </div>
    @endif
@endif