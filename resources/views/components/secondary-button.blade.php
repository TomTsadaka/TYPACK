<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center justify-center px-6 py-3 bg-white border border-calm-border rounded-store font-semibold text-sm text-calm-charcoal shadow-store hover:bg-calm-surface hover:border-calm-primary/30 focus:outline-none focus:ring-2 focus:ring-calm-primary focus:ring-offset-2 disabled:opacity-50 transition-all duration-200']) }}>
    {{ $slot }}
</button>
