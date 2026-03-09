@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-calm-border focus:border-calm-primary focus:ring-calm-primary rounded-store shadow-store transition-colors']) }}>
