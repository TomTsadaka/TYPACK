<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="guest-field">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="guest-errors mt-2" />
        </div>

        <!-- Password -->
        <div class="guest-field mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="guest-errors mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="guest-remember block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-calm-border text-calm-primary shadow-calm-sm focus:ring-calm-primary" name="remember">
                <span class="ms-2 text-sm text-calm-muted">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="guest-actions flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-calm-muted hover:text-calm-charcoal rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-calm-primary" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="guest-btn ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>

        <div class="guest-footer mt-6 text-center">
            <span class="text-sm text-calm-muted">{{ __("Don't have an account?") }}</span>
            <a class="guest-link-accent text-sm font-semibold underline ms-1" href="{{ route('register') }}">
                {{ __('Register') }}
            </a>
        </div>
    </form>
</x-guest-layout>
