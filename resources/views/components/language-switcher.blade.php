@php
    $locales = config('locales.available', ['en' => ['name' => 'English', 'flag' => '🇬🇧'], 'he' => ['name' => 'עברית', 'flag' => '🇮🇱']]);
    $current = app()->getLocale();
@endphp
<div class="flex items-center gap-0.5 rounded-md border border-gray-200 bg-gray-50 p-0.5" role="group" aria-label="{{ __('Language') }}">
    @foreach ($locales as $code => $config)
        <a href="{{ route('locale.switch', ['locale' => $code]) }}"
           class="inline-flex items-center justify-center w-9 h-9 rounded text-lg hover:bg-white hover:shadow-sm focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-1 {{ $current === $code ? 'bg-white shadow-sm ring-1 ring-gray-200' : '' }}"
           title="{{ $config['name'] }}"
           aria-current="{{ $current === $code ? 'true' : 'false' }}">
            {{ $config['flag'] }}
        </a>
    @endforeach
</div>
