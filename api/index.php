<?php

/**
 * PorsiPas – Vercel Serverless Entry Point (Final Fix)
 *
 * vercel-php menjalankan PHP built-in server dengan document root di /project root,
 * bukan di /public. Akibatnya, file CSS/JS di public/ tidak bisa diakses langsung.
 * Script ini mendeteksi request untuk file statis dan melayaninya secara langsung
 * dari folder public/ sebelum meneruskan ke Laravel.
 */

define('LARAVEL_START', microtime(true));

// ─── BAGIAN 1: Layani file statis dari public/ secara langsung ──────────────
$requestUri = $_SERVER['REQUEST_URI'] ?? '/';
$requestPath = parse_url($requestUri, PHP_URL_PATH);
$publicFile  = __DIR__ . '/../public' . $requestPath;

if (
    $requestPath !== '/' &&
    file_exists($publicFile) &&
    !is_dir($publicFile)
) {
    $ext = strtolower(pathinfo($publicFile, PATHINFO_EXTENSION));

    $mimeTypes = [
        'css'   => 'text/css; charset=utf-8',
        'js'    => 'application/javascript; charset=utf-8',
        'png'   => 'image/png',
        'jpg'   => 'image/jpeg',
        'jpeg'  => 'image/jpeg',
        'gif'   => 'image/gif',
        'svg'   => 'image/svg+xml',
        'ico'   => 'image/x-icon',
        'webp'  => 'image/webp',
        'woff'  => 'font/woff',
        'woff2' => 'font/woff2',
        'ttf'   => 'font/ttf',
        'eot'   => 'application/vnd.ms-fontobject',
        'json'  => 'application/json',
        'txt'   => 'text/plain',
        'xml'   => 'application/xml',
        'map'   => 'application/json',
    ];

    if (isset($mimeTypes[$ext])) {
        header('Content-Type: ' . $mimeTypes[$ext]);
        header('Cache-Control: public, max-age=31536000');
        readfile($publicFile);
        exit;
    }
}

// ─── BAGIAN 2: Override environment sebelum Laravel boot ────────────────────
$tmpCacheDir = '/tmp/storage/bootstrap/cache';

$_ENV['APP_ENV']            = 'production';
$_ENV['APP_DEBUG']          = 'false';
$_ENV['LOG_CHANNEL']        = 'stderr';
$_ENV['CACHE_STORE']        = 'array';
$_ENV['SESSION_DRIVER']     = 'array';
$_ENV['QUEUE_CONNECTION']   = 'sync';
$_ENV['VIEW_COMPILED_PATH'] = '/tmp/storage/framework/views';

$_ENV['APP_SERVICES_CACHE'] = $tmpCacheDir . '/services.php';
$_ENV['APP_PACKAGES_CACHE'] = $tmpCacheDir . '/packages.php';
$_ENV['APP_CONFIG_CACHE']   = $tmpCacheDir . '/config.php';
$_ENV['APP_ROUTES_CACHE']   = $tmpCacheDir . '/routes.php';
$_ENV['APP_EVENTS_CACHE']   = $tmpCacheDir . '/events.php';

foreach ($_ENV as $key => $value) {
    putenv("{$key}={$value}");
    $_SERVER[$key] = $value;
}

// ─── BAGIAN 3: Siapkan direktori sementara /tmp ──────────────────────────────
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

// ─── BAGIAN 4: Boot Laravel ──────────────────────────────────────────────────
require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';

$app->useStoragePath('/tmp/storage');

$app->handleRequest(Illuminate\Http\Request::capture());
