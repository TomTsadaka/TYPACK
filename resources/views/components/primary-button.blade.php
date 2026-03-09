<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center px-6 py-3 bg-calm-primary border border-transparent rounded-store font-semibold text-sm text-white shadow-store hover:bg-calm-primary-hover hover:shadow-glow focus:outline-none focus:ring-2 focus:ring-calm-primary focus:ring-offset-2 transition-all duration-200 disabled:opacity-50 disabled:cursor-not-allowed']) }}>
    {{ $slot }}
</button>
