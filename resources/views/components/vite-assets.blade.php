@php
$manifestPath = public_path('build/manifest.json');
$entryPoints = ['resources/css/app.css', 'resources/js/app.js'];

if (file_exists($manifestPath)) {
    // Normal: use Laravel Vite
    $useVite = true;
} elseif (getenv('VERCEL') && ($base = config('app.asset_url') ?: config('app.url') ?: (getenv('VERCEL_URL') ? 'https://' . getenv('VERCEL_URL') : null))) {
    $base = rtrim($base, '/');
    $manifestUrl = $base . '/build/manifest.json';
    $json = @file_get_contents($manifestUrl);
    $manifest = $json ? json_decode($json, true) : null;
    $useVite = false;
} else {
    $manifest = null;
    $useVite = false;
}
@endphp
@if ($useVite)
    @vite($entryPoints)
@elseif ($manifest)
    @foreach ($entryPoints as $entry)
        @if (isset($manifest[$entry]))
            @php $entryManifest = $manifest[$entry]; @endphp
            @if (!empty($entryManifest['file']) && str_ends_with($entryManifest['file'], '.css'))
                <link rel="stylesheet" href="{{ $base }}/build/{{ $entryManifest['file'] }}" />
            @endif
        @endif
    @endforeach
    @foreach ($entryPoints as $entry)
        @if (isset($manifest[$entry]))
            @php $entryManifest = $manifest[$entry]; @endphp
            @if (!empty($entryManifest['file']) && str_ends_with($entryManifest['file'], '.js'))
                <script type="module" src="{{ $base }}/build/{{ $entryManifest['file'] }}"></script>
            @endif
        @endif
    @endforeach
@endif
