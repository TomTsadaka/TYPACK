<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="mb-8">
        <h2 class="guest-heading">{{ __('Sign in to your account') }}</h2>
        <p class="guest-subheading">{{ __('Log in to view orders, save favorites, and checkout faster.') }}</p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <!-- Email Address -->
        <div class="guest-field">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1.5 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="guest-errors mt-2" />
        </div>

        <!-- Password -->
        <div class="guest-field">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1.5 w-full" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="guest-errors mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="guest-remember flex items-center">
            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                <input id="remember_me" type="checkbox" class="rounded border-calm-border text-calm-primary focus:ring-calm-primary" name="remember">
                <span class="ms-2.5 text-sm text-calm-muted">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="guest-actions flex items-center justify-between pt-1">
            @if (Route::has('password.request'))
                <a class="text-sm text-calm-muted hover:text-calm-charcoal transition-colors focus:outline-none focus:ring-2 focus:ring-calm-primary focus:ring-offset-2 rounded-store px-1" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @else
                <span></span>
            @endif
            <x-primary-button class="guest-btn ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>

        <div class="guest-footer pt-2">
            <span class="text-calm-muted">{{ __("Don't have an account?") }}</span>
            <a class="guest-link-accent ms-1.5 hover:no-underline" href="{{ route('register') }}">
                {{ __('Register') }}
            </a>
        </div>
    </form>
</x-guest-layout>
