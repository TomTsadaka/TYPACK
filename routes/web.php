<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Route;

Route::get('/locale/{locale}', function (string $locale) {
    $available = array_keys(config('locales.available', ['en' => [], 'he' => []]));
    if (! in_array($locale, $available, true)) {
        abort(400, 'Invalid locale');
    }
    session(['locale' => $locale]);
    return redirect()->back();
})->name('locale.switch');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products/{slug}', [HomeController::class, 'show'])->name('product.show');

Route::get('/health', function () {
    return response()->json([
        'status' => 'ok',
        'timestamp' => now()->toISOString(),
        'environment' => app()->environment(),
        'version' => '1.0.0',
    ]);
});

Route::get('/banners/preview/{banner}', function (Banner $banner) {
    return view('banner-preview', ['banner' => $banner]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Session test route
Route::get('/_session-test', function () {
    $count = session('test_count', 0) + 1;
    session(['test_count' => $count]);
    
    return response()->json([
        'count' => $count,
        'session_id' => session()->getId(),
        'has_laravel_session' => isset($_COOKIE['laravel_session']),
        'has_cookie_prefix' => request()->cookie ? 'yes' : 'no',
        'cookie_set' => headers_sent(),
        'headers_before' => [],
        'csrf_token' => csrf_token(),
    ]);
})->name('session.test');

