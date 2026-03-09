<x-guest-layout>
    <div class="mb-8">
        <h2 class="guest-heading">{{ __('Confirm password') }}</h2>
        <p class="guest-subheading mt-2">
            {{ __('This is a secure area. Please confirm your password to continue.') }}
        </p>
    </div>

    <form method="POST" action="{{ route('password.confirm') }}" class="space-y-5">
        @csrf

        <div class="guest-field">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1.5 w-full" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="guest-errors mt-2" />
        </div>

        <div class="flex justify-end pt-1">
            <x-primary-button class="guest-btn">
                {{ __('Confirm') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
