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

require __DIR__ . '/../public/index.php';
