@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-calm-charcoal']) }}>
    {{ $value ?? $slot }}
</label>
