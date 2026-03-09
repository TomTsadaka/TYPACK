<x-guest-layout>
    <div class="mb-8">
        <h2 class="guest-heading">{{ __('Create your account') }}</h2>
        <p class="guest-subheading">{{ __('Join us and start shopping') }}</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <!-- Name -->
        <div class="guest-field">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1.5 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="guest-errors mt-2" />
        </div>

        <!-- Email Address -->
        <div class="guest-field">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1.5 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="guest-errors mt-2" />
        </div>

        <!-- Password -->
        <div class="guest-field">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1.5 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="guest-errors mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="guest-field">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1.5 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="guest-errors mt-2" />
        </div>

        <div class="guest-actions flex justify-end pt-1">
            <x-primary-button class="guest-btn">
                {{ __('Register') }}
            </x-primary-button>
        </div>

        <div class="guest-footer pt-2">
            <span class="text-calm-muted">{{ __('Already have an account?') }}</span>
            <a class="guest-link-accent ms-1.5 hover:no-underline" href="{{ route('login') }}">
                {{ __('Log in') }}
            </a>
        </div>
    </form>
</x-guest-layout>
