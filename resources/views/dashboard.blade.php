<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-calm-charcoal leading-tight tracking-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- Hero Welcome Section -->
    <div class="relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-calm-primary/5 via-transparent to-calm-surface"></div>
        <div class="absolute top-0 right-0 w-48 h-48 bg-calm-primary/5 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
        <div class="absolute bottom-0 left-0 w-40 h-40 bg-calm-primary/5 rounded-full blur-3xl translate-y-1/2 -translate-x-1/2"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-16">
            <div class="max-w-2xl">
                <p class="text-sm font-medium text-calm-primary uppercase tracking-widest mb-3">{{ __('Welcome back') }}</p>
                <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-calm-charcoal tracking-tight leading-tight">
                    {{ __('Hello') }}, {{ Auth::user()->name }}
                </h1>
                <p class="mt-5 text-lg text-calm-muted leading-relaxed">
                    {{ __("Your account is ready. Manage your profile and settings below.") }}
                </p>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-20 -mt-4">
        <div class="grid gap-5 sm:grid-cols-1 lg:grid-cols-2">
            <a href="{{ route('profile.edit') }}" class="store-card-interactive group block p-5 lg:p-6">
                <div class="flex items-start gap-5">
                    <div class="flex-shrink-0 w-10 h-10 rounded-store-lg bg-calm-primary/10 flex items-center justify-center group-hover:bg-calm-primary/15 transition-colors">
                        <svg class="w-5 h-5 text-calm-primary" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4 21a8 8 0 0116 0v-2.5H4V21z" />
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <h3 class="font-semibold text-lg text-calm-charcoal group-hover:text-calm-primary transition-colors">{{ __('Profile') }}</h3>
                        <p class="mt-1.5 text-sm text-calm-muted leading-relaxed">{{ __('Update your account details and preferences') }}</p>
                    </div>
                    <svg class="w-4 h-4 text-calm-muted group-hover:text-calm-primary group-hover:translate-x-0.5 transition-all flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </div>
            </a>

            <div class="store-card p-5 lg:p-6">
                <div class="flex items-start gap-5">
                    <div class="flex-shrink-0 w-10 h-10 rounded-store-lg bg-calm-surface flex items-center justify-center">
                        <svg class="w-5 h-5 text-calm-muted" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-lg text-calm-charcoal">{{ __('Your account') }}</h3>
                        <p class="mt-1.5 text-sm text-calm-muted leading-relaxed">{{ __('Manage your profile, password, and account settings in one place') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
