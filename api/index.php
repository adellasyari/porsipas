<?php

/**
 * PorsiPas – Vercel Serverless Entry Point
 * Pendekatan Vercel khusus Laravel 11/12 
 */

define('LARAVEL_START', microtime(true));

// 1. Bypass folder read-only Vercel untuk Storage dan Bootstrap Cache
$tmpCacheDir = '/tmp/storage/bootstrap/cache';

$_ENV['APP_ENV'] = 'production';
$_ENV['APP_DEBUG'] = 'true'; // Kita biarkan true dulu untuk jaga-jaga
$_ENV['LOG_CHANNEL'] = 'stderr';
$_ENV['CACHE_STORE'] = 'array';
$_ENV['SESSION_DRIVER'] = 'array';
$_ENV['QUEUE_CONNECTION'] = 'sync';
$_ENV['VIEW_COMPILED_PATH'] = '/tmp/storage/framework/views';

// Pindahkan semua cache bawaan Laravel ke /tmp
$_ENV['APP_SERVICES_CACHE'] = $tmpCacheDir . '/services.php';
$_ENV['APP_PACKAGES_CACHE'] = $tmpCacheDir . '/packages.php';
$_ENV['APP_CONFIG_CACHE']   = $tmpCacheDir . '/config.php';
$_ENV['APP_ROUTES_CACHE']   = $tmpCacheDir . '/routes.php';
$_ENV['APP_EVENTS_CACHE']   = $tmpCacheDir . '/events.php';

foreach ($_ENV as $key => $value) {
    putenv("{$key}={$value}");
    $_SERVER[$key] = $value;
}

// 2. Buat direktori sementara di memori Vercel
$tmpDirs = [
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/testing',
    '/tmp/storage/logs',
    '/tmp/storage/app/public',
    $tmpCacheDir,
];

foreach ($tmpDirs as $dir) {
    if (!is_dir($dir)) {
        @mkdir($dir, 0777, true);
    }
}

// 3. Autoloader
require __DIR__.'/../vendor/autoload.php';

// 4. Bootstrap Aplikasi
$app = require_once __DIR__.'/../bootstrap/app.php';

// 5. Override Storage Path
$app->useStoragePath('/tmp/storage');

// 6. Handle Request
$app->handleRequest(Illuminate\Http\Request::capture());
