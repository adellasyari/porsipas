<?php

/**
 * PorsiPas – Vercel Serverless Entry Point
 *
 * PENTING: Semua override environment HARUS dilakukan sebelum autoloader
 * dipanggil agar Laravel membacanya sebelum service providers diregistrasi.
 */

define('LARAVEL_START', microtime(true));

// ─── LANGKAH 1: Override env vars dengan 3 metode sekaligus ─────────────────
// putenv()  → dibaca PHP
// $_ENV     → dibaca Dotenv/Illuminate
// $_SERVER  → fallback untuk beberapa environment
$overrides = [
    'APP_ENV'                    => 'production',
    'APP_DEBUG'                  => 'false',
    'LOG_CHANNEL'                => 'stderr',
    'LOG_DEPRECATIONS_CHANNEL'   => 'null',
    'CACHE_STORE'                => 'array',
    'SESSION_DRIVER'             => 'array',
    'QUEUE_CONNECTION'           => 'sync',
    'VIEW_COMPILED_PATH'         => '/tmp/views',
];

foreach ($overrides as $key => $value) {
    putenv("{$key}={$value}");
    $_ENV[$key]    = $value;
    $_SERVER[$key] = $value;
}

// ─── LANGKAH 2: Buat semua direktori /tmp yang dibutuhkan Laravel ────────────
// Vercel filesystem bersifat read-only kecuali /tmp
$tmpDirs = [
    '/tmp/views',
    '/tmp/framework/cache/data',
    '/tmp/framework/sessions',
    '/tmp/framework/testing',
    '/tmp/app/public',
    '/tmp/logs',
];

foreach ($tmpDirs as $dir) {
    if (!is_dir($dir)) {
        @mkdir($dir, 0775, true);
    }
}

// ─── LANGKAH 3: Boot Laravel via public/index.php ───────────────────────────
require __DIR__ . '/../public/index.php';
