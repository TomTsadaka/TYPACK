<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center px-6 py-3 bg-calm-primary border border-transparent rounded-store font-semibold text-sm text-white hover:bg-calm-primary-hover focus:outline-none focus:ring-2 focus:ring-calm-primary focus:ring-offset-2 transition-all duration-200 shadow-store hover:shadow-store-lg']) }}>
    {{ $slot }}
</button>
