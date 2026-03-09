@props(['active'])

@php
$classes = ($active ?? false)
    ? 'inline-flex items-center px-3 py-2 rounded-store text-sm font-medium text-calm-primary bg-calm-primary/5 border-b-2 border-calm-primary nav-active'
    : 'inline-flex items-center px-3 py-2 rounded-store text-sm font-medium text-calm-muted hover:text-calm-charcoal hover:bg-calm-surface/50 border-b-2 border-transparent transition duration-150';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
