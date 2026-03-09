<x-guest-layout>
    <div class="mb-8">
        <h2 class="guest-heading">{{ __('Verify your email') }}</h2>
        <p class="guest-subheading mt-2">
            {{ __('Thanks for signing up! Click the link we emailed you to verify your address. Didn\'t receive it? We can send another.') }}
        </p>
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-6 p-4 rounded-store bg-calm-success/10 text-calm-success text-sm font-medium">
            {{ __('A new verification link has been sent to your email address.') }}
        </div>
    @endif

    <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-4">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <x-primary-button class="guest-btn">
                {{ __('Resend Verification Email') }}
            </x-primary-button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-sm text-calm-muted hover:text-calm-charcoal transition-colors focus:outline-none focus:ring-2 focus:ring-calm-primary focus:ring-offset-2 rounded-store px-2 py-1">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout>
