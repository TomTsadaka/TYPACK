<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    'paths' => ['api/*'],

    'allowed_methods' => ['*'],

    /*
    | Allowed origins for frontend (storefront) and same-origin.
    | Comma-separated list, e.g. https://dream-pack-store.vercel.app,https://typack.vercel.app,http://localhost:3000
    */
    'allowed_origins' => array_filter(array_map('trim', explode(',', env('CORS_ORIGINS', 'https://dream-pack-store.vercel.app,https://typack.vercel.app,http://localhost:3000')))),

    'allowed_origins_patterns' => [],

    'allowed_headers' => [
        'Content-Type',
        'Accept', 
        'Authorization',
        'X-Requested-With',
        'Origin'
    ],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => true,

];
