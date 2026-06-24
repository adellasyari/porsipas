<?php

/**
 * PorsiPas – Vercel Serverless Entry Point
 * Pendekatan paling solid untuk Laravel 11/12 di Vercel
 */

// 1. Definisikan start time (karena kita bypass public/index.php)
define('LARAVEL_START', microtime(true));

// 2. Set environment overrides secara eksplisit
$_ENV['APP_ENV'] = 'local';
$_ENV['APP_DEBUG'] = 'true';
$_ENV['LOG_CHANNEL'] = 'stderr';    // Log ke Vercel runtime logs
$_ENV['CACHE_STORE'] = 'array';     // Gunakan memory untuk cache
$_ENV['SESSION_DRIVER'] = 'array';  // Gunakan memory untuk session
$_ENV['QUEUE_CONNECTION'] = 'sync';
$_ENV['VIEW_COMPILED_PATH'] = '/tmp/storage/framework/views';

foreach ($_ENV as $key => $value) {
    putenv("{$key}={$value}");
    $_SERVER[$key] = $value;
}

// 3. Buat struktur folder storage di memori sementara (/tmp) milik Vercel
$tmpStorageDirs = [
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/testing',
    '/tmp/storage/logs',
    '/tmp/storage/app/public',
];

foreach ($tmpStorageDirs as $dir) {
    if (!is_dir($dir)) {
        @mkdir($dir, 0777, true);
    }
}

// 4. Load Composer Autoloader
require __DIR__.'/../vendor/autoload.php';

// 5. Bootstrap Laravel
$app = require_once __DIR__.'/../bootstrap/app.php';

// 6. PAKSA Laravel untuk menggunakan /tmp/storage daripada folder asli!
$app->useStoragePath('/tmp/storage');

// 7. Handle Request
$app->handleRequest(Illuminate\Http\Request::capture());
