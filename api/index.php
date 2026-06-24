<?php

// Memaksa Laravel menggunakan memori sementara (/tmp) milik Vercel
putenv('VIEW_COMPILED_PATH=/tmp');
putenv('CACHE_STORE=array');
putenv('SESSION_DRIVER=array');
putenv('LOG_CHANNEL=stderr');

// Memanggil aplikasi utama Laravel
require __DIR__ . '/../public/index.php';
