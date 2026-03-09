<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-calm-primary border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-calm-primary-hover focus:bg-calm-primary-hover active:bg-calm-primary-hover focus:outline-none focus:ring-2 focus:ring-calm-primary focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
