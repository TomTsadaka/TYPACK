<?php

namespace App;

use Illuminate\Foundation\Application as BaseApplication;

/**
 * Extends Laravel Application so bootstrap/cache can point to a writable path on Vercel.
 */
class Application extends BaseApplication
{
    /**
     * Get the path to the bootstrap cache directory.
     * On Vercel the project filesystem is read-only; use /tmp so PackageManifest can write.
     */
    public function bootstrapPath($path = '')
    {
        if (getenv('VERCEL') && ($path === 'cache' || str_starts_with($path, 'cache' . \DIRECTORY_SEPARATOR))) {
            $cacheDir = '/tmp/bootstrap-cache';
            if (! is_dir($cacheDir)) {
                @mkdir($cacheDir, 0755, true);
            }
            $suffix = $path === 'cache' ? '' : \DIRECTORY_SEPARATOR . substr($path, 6);
            return $cacheDir . $suffix;
        }

        return parent::bootstrapPath($path);
    }
}
