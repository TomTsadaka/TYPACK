@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-calm-primary text-start text-base font-medium text-calm-charcoal bg-calm-surface focus:outline-none focus:text-calm-charcoal focus:bg-calm-surface focus:border-calm-primary-hover transition duration-150 ease-in-out'
            : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-calm-muted hover:text-calm-charcoal hover:bg-calm-surface hover:border-calm-border focus:outline-none focus:text-calm-charcoal focus:bg-calm-surface focus:border-calm-border transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
