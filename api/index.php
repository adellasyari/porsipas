<?php

/**
 * PorsiPas – Vercel Entry Point
 * 
 * File ini berfungsi sebagai "jembatan" antara request yang masuk
 * dari Vercel ke aplikasi Laravel di folder /public.
 * 
 * Vercel akan memanggil file ini untuk SETIAP request yang masuk,
 * dan file ini akan meneruskannya ke bootstrap Laravel seperti biasa.
 */

// ─── 1. Tentukan root proyek (satu level di atas folder /api) ──────────────
$projectRoot = dirname(__DIR__);

// ─── 2. Set APP_BASE_PATH agar Laravel tahu di mana root proyek berada ──────
if (!defined('LARAVEL_START')) {
    define('LARAVEL_START', microtime(true));
}

// ─── 3. Cek apakah aplikasi sedang dalam maintenance mode ───────────────────
if (file_exists($maintenance = $projectRoot . '/storage/framework/maintenance.php')) {
    require $maintenance;
}

// ─── 4. Daftarkan Composer autoloader ───────────────────────────────────────
require $projectRoot . '/vendor/autoload.php';

// ─── 5. Bootstrap aplikasi Laravel dan tangani request ──────────────────────
/** @var \Illuminate\Foundation\Application $app */
$app = require_once $projectRoot . '/bootstrap/app.php';

// ─── 6. Setel ulang path public agar asset bisa ditemukan ───────────────────
// (Diperlukan karena entry point bukan di folder /public)
$app->bind('path.public', function () use ($projectRoot) {
    return $projectRoot . '/public';
});

// ─── 7. Tangani request dan kirim response ───────────────────────────────────
use Illuminate\Http\Request;

$app->handleRequest(Request::capture());
