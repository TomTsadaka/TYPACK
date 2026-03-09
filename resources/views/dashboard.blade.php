<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-calm-charcoal leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-calm-card overflow-hidden shadow-calm sm:rounded-xl border border-calm-border">
                <div class="p-6 text-calm-charcoal">
                    {{ __("Welcome back! You're logged in.") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
