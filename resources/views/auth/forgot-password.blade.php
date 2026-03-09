<x-guest-layout>
    <div class="mb-8">
        <h2 class="guest-heading">{{ __('Reset your password') }}</h2>
        <p class="guest-subheading mt-2">
            {{ __('Enter your email and we\'ll send you a link to choose a new password.') }}
        </p>
    </div>

    <x-auth-session-status class="mb-5" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
        @csrf

        <div class="guest-field">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1.5 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="guest-errors mt-2" />
        </div>

        <div class="flex justify-end">
            <x-primary-button class="guest-btn">
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
