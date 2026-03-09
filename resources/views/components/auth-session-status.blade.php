@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'font-medium text-sm text-calm-success']) }}>
        {{ $status }}
    </div>
@endif
