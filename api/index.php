<?php

// On Vercel, require APP_KEY or show a clear error instead of 500
if (getenv('VERCEL') && empty(getenv('APP_KEY'))) {
    http_response_code(503);
    header('Content-Type: text/html; charset=utf-8');
    echo '<!DOCTYPE html><html><head><meta charset="utf-8"><title>Setup required</title></head><body style="font-family:sans-serif;max-width:520px;margin:3rem auto;padding:1rem;">';
    echo '<h1>Configuration required</h1>';
    echo '<p>Set <strong>APP_KEY</strong> in Vercel:</p>';
    echo '<ol><li>Vercel Dashboard → your project → <strong>Settings</strong> → <strong>Environment Variables</strong></li>';
    echo '<li>Add <code>APP_KEY</code> – generate with: <code>php artisan key:generate --show</code></li>';
    echo '<li>Add <code>APP_URL</code> = your site URL (e.g. https://dream-pack-store-be-main.vercel.app)</li>';
    echo '<li>Redeploy the project</li></ol>';
    echo '</body></html>';
    exit;
}

// Fail fast with a clear message if Composer deps are missing (vercel-php may not have run composer install)
$vendorAutoload = __DIR__ . '/../vendor/autoload.php';
if (!is_file($vendorAutoload)) {
    http_response_code(503);
    header('Content-Type: text/html; charset=utf-8');
    echo '<!DOCTYPE html><html><head><meta charset="utf-8"><title>Build issue</title></head><body style="font-family:sans-serif;max-width:600px;margin:3rem auto;padding:1rem;">';
    echo '<h1>Vendor not found</h1>';
    echo '<p>The <code>vendor</code> directory is missing. On Vercel, the PHP builder should run <code>composer install</code> when it finds <code>composer.json</code>.</p>';
    echo '<p>Ensure <code>composer.json</code> and <code>composer.lock</code> are in the repo and redeploy.</p>';
    echo '</body></html>';
    exit;
}

// Surface bootstrap errors on Vercel so we can fix them (remove or set APP_DEBUG=false in prod later)
try {
    require __DIR__ . '/../public/index.php';
} catch (Throwable $e) {
    if (getenv('VERCEL')) {
        http_response_code(500);
        header('Content-Type: text/html; charset=utf-8');
        echo '<!DOCTYPE html><html><head><meta charset="utf-8"><title>Error</title></head><body style="font-family:monospace;max-width:800px;margin:2rem auto;padding:1rem;background:#1e1e1e;color:#d4d4d4;">';
        echo '<h1 style="color:#f48771;">' . htmlspecialchars($e->getMessage()) . '</h1>';
        echo '<pre style="overflow:auto;font-size:12px;">' . htmlspecialchars($e->getFile() . ':' . $e->getLine() . "\n\n" . $e->getTraceAsString()) . '</pre>';
        echo '</body></html>';
    } else {
        throw $e;
    }
}
