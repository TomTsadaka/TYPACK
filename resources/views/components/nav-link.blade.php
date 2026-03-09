@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-calm-primary text-sm font-medium leading-5 text-calm-charcoal focus:outline-none focus:border-calm-primary-hover transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-calm-muted hover:text-calm-charcoal hover:border-calm-border focus:outline-none focus:text-calm-charcoal focus:border-calm-border transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
