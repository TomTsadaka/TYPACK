<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-calm-charcoal leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- Hero Welcome Section -->
    <div class="relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-teal-50 via-white to-slate-50"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24">
            <div class="text-center max-w-2xl mx-auto">
                <h1 class="text-3xl sm:text-4xl font-bold text-calm-charcoal tracking-tight">
                    {{ __('Welcome back') }}, {{ Auth::user()->name }}!
                </h1>
                <p class="mt-4 text-lg text-calm-muted">
                    {{ __("You're all set. Your account is ready and you're logged in.") }}
                </p>
            </div>
        </div>
    </div>

    <!-- Quick Actions / Content Cards -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-16">
        <div class="grid gap-6 sm:grid-cols-1 lg:grid-cols-2">
            <a href="{{ route('profile.edit') }}" class="store-card group block p-6">
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0 w-12 h-12 rounded-store bg-teal-100 flex items-center justify-center group-hover:bg-teal-200 transition-colors">
                        <svg class="w-6 h-6 text-calm-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-calm-charcoal group-hover:text-calm-primary transition-colors">{{ __('Profile') }}</h3>
                        <p class="mt-1 text-sm text-calm-muted">{{ __('Update your account details and preferences') }}</p>
                    </div>
                    <svg class="w-5 h-5 text-calm-muted group-hover:text-calm-primary group-hover:translate-x-1 transition-all ml-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </div>
            </a>

            <div class="store-card p-6">
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0 w-12 h-12 rounded-store bg-slate-100 flex items-center justify-center">
                        <svg class="w-6 h-6 text-calm-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-calm-charcoal">{{ __('Your account') }}</h3>
                        <p class="mt-1 text-sm text-calm-muted">{{ __('Manage your profile, password, and account settings in one place') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
