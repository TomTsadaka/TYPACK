@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'input-refined border-calm-border focus:border-calm-primary focus:ring-calm-primary disabled:opacity-50 disabled:cursor-not-allowed']) }}>