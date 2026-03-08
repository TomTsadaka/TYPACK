<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';

// Vercel: use writable /tmp for bootstrap cache and bind view before any request
if (getenv('VERCEL')) {
    $cacheDir = '/tmp/bootstrap-cache';
    if (! is_dir($cacheDir)) {
        @mkdir($cacheDir, 0755, true);
    }
    // Replace PackageManifest with one that writes to /tmp so the container returns it before the default binding runs.
    $app->forgetInstance(\Illuminate\Foundation\PackageManifest::class);
    $app->instance(\Illuminate\Foundation\PackageManifest::class, new \Illuminate\Foundation\PackageManifest(
        new \Illuminate\Filesystem\Filesystem,
        $app->basePath(),
        $cacheDir . '/packages.php'
    ));
    if (! $app->bound('view')) {
        $app->register(\Illuminate\Filesystem\FilesystemServiceProvider::class);
        $app->register(\Illuminate\View\ViewServiceProvider::class);
    }
}

$app->handleRequest(Request::capture());
