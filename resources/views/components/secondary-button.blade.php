<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-calm-card border border-calm-border rounded-lg font-semibold text-xs text-calm-charcoal uppercase tracking-widest shadow-calm-sm hover:bg-calm-surface focus:outline-none focus:ring-2 focus:ring-calm-primary focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
