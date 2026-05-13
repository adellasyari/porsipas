<?php

use Illuminate\Support\Facades\Route;

// =============================================
// DATA DUMMY PRODUK (Pengganti Database)
// =============================================
$products = [
    [
        'id'               => 1,
        'nama_menu'        => 'Paket Ayam Teriyaki',
        'kategori'         => 'ayam',
        'harga'            => 18000,
        'masa_penyediaan'  => '10 Menit',
        'badge'            => 'Best Seller',
        'badge_type'       => 'bestseller',
        'url_gambar'       => 'https://images.unsplash.com/photo-1569050467447-ce54b3bbc37d?w=800&q=85',
        'deskripsi'        => 'Bahan mentah segar yang sudah dipotong dan dibersihkan. Saus teriyaki autentik yang kaya rasa umami. Langsung masak, no ribet — sajian restoran di dapur kos.',
        'isi_paket'        => ['100gr Ayam Filet (sudah dicuci & dipotong dadu)', '1 Sachet Saus Teriyaki Premium', 'Irisan Bawang Bombay & Bawang Putih', 'Wijen sangrai secukupnya', 'Daun bawang iris tipis'],
        'kalori'           => '320 kkal',
        'protein'          => '28g',
    ],
    [
        'id'               => 2,
        'nama_menu'        => 'Sop Iga Sapi Porsi Pas',
        'kategori'         => 'daging',
        'harga'            => 25000,
        'masa_penyediaan'  => '20 Menit',
        'badge'            => '20 Menit',
        'badge_type'       => 'default',
        'url_gambar'       => 'https://images.unsplash.com/photo-1544025162-d76694265947?w=800&q=85',
        'deskripsi'        => 'Iga sapi segar pilihan dengan bumbu sop yang sudah dihaluskan. Kuah bening yang gurih dan menyegarkan. Cocok dimakan siang hari setelah kuliah.',
        'isi_paket'        => ['150gr Iga Sapi Segar', 'Bumbu Sop Rempah Halus', 'Wortel & Kentang Potong Dadu', 'Seledri & Bawang Goreng', 'Tomat segar 2 buah'],
        'kalori'           => '410 kkal',
        'protein'          => '32g',
    ],
    [
        'id'               => 3,
        'nama_menu'        => 'Tumis Sayur Campur Sehat',
        'kategori'         => 'sayur',
        'harga'            => 12000,
        'masa_penyediaan'  => '7 Menit',
        'badge'            => 'Vegan',
        'badge_type'       => 'vegan',
        'url_gambar'       => 'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?w=800&q=85',
        'deskripsi'        => 'Campuran sayuran segar yang kaya serat dan vitamin. Sudah dicuci bersih dan dipotong rapi. Pilihan sehat terbaik untuk anak kos yang peduli nutrisi.',
        'isi_paket'        => ['Brokoli segar 80gr', 'Wortel iris julienne', 'Buncis potong', 'Jagung pipil', 'Bumbu tumis bawang & saus tiram'],
        'kalori'           => '185 kkal',
        'protein'          => '6g',
    ],
    [
        'id'               => 4,
        'nama_menu'        => 'Ayam Geprek Sambal Bawang',
        'kategori'         => 'pedas',
        'harga'            => 16000,
        'masa_penyediaan'  => '12 Menit',
        'badge'            => 'Extra Pedas',
        'badge_type'       => 'pedas',
        'url_gambar'       => 'https://images.unsplash.com/photo-1588166524941-3bf61a9c41db?w=800&q=85',
        'deskripsi'        => 'Ayam fillet crispy dengan sambal bawang segar yang menggigit. Level pedas bisa disesuaikan. Dijamin bikin nagih dan bikin keringetan!',
        'isi_paket'        => ['120gr Ayam Fillet', '1 Sachet Bumbu Tepung Crispy', 'Sambal Bawang Segar (level: pedas)', 'Kubis & timun pelengkap'],
        'kalori'           => '380 kkal',
        'protein'          => '30g',
    ],
    [
        'id'               => 5,
        'nama_menu'        => 'Sop Ayam Klaten Kuah Bening',
        'kategori'         => 'ayam',
        'harga'            => 18000,
        'masa_penyediaan'  => '12 Menit',
        'badge'            => '12 Menit',
        'badge_type'       => 'default',
        'url_gambar'       => 'https://images.unsplash.com/photo-1604908176997-125f25cc6f3d?w=800&q=85',
        'deskripsi'        => 'Sop ayam khas Klaten dengan kuah bening yang bening dan gurih. Bumbu rempah sudah diuleg halus. Cocok banget saat cuaca hujan di kos.',
        'isi_paket'        => ['100gr Ayam Potong Segar', 'Bumbu Sop Rempah Klaten', 'Wortel & Kentang Potong', 'Tomat & Seledri', 'Bawang Goreng Renyah'],
        'kalori'           => '290 kkal',
        'protein'          => '25g',
    ],
    [
        'id'               => 6,
        'nama_menu'        => 'Rendang Daging Porsi Pas',
        'kategori'         => 'daging',
        'harga'            => 28000,
        'masa_penyediaan'  => '25 Menit',
        'badge'            => 'Best Seller',
        'badge_type'       => 'bestseller',
        'url_gambar'       => 'https://images.unsplash.com/photo-1603360946369-dc9bb6258143?w=800&q=85',
        'deskripsi'        => 'Rendang autentik Minang dengan bumbu rempah 15 bahan. Daging sapi premium yang empuk dan kaya rasa. Makanan terlezat Indonesia ada di sini.',
        'isi_paket'        => ['130gr Daging Sapi Segar', 'Bumbu Rendang Minang 15 Rempah', 'Santan Kental 1 Sachet', 'Daun Jeruk & Serai'],
        'kalori'           => '480 kkal',
        'protein'          => '36g',
    ],
    [
        'id'               => 7,
        'nama_menu'        => 'Tumis Kangkung Terasi',
        'kategori'         => 'sayur',
        'harga'            => 12000,
        'masa_penyediaan'  => '5 Menit',
        'badge'            => '5 Menit',
        'badge_type'       => 'default',
        'url_gambar'       => 'https://images.unsplash.com/photo-1564834724105-918b73d1b9e0?w=800&q=85',
        'deskripsi'        => 'Kangkung segar yang sudah dibersihkan dan dipotong rapi. Bumbu terasi khas yang harum dan gurih. Menu sayur paling sat-set dan murah meriah!',
        'isi_paket'        => ['1 Ikat Kangkung Segar (sudah bersih)', 'Bumbu Terasi Halus', 'Cabai Merah & Bawang Putih', 'Tomat Kecil 2 buah'],
        'kalori'           => '160 kkal',
        'protein'          => '4g',
    ],
    [
        'id'               => 8,
        'nama_menu'        => 'Nasi Goreng Gila Spesial',
        'kategori'         => 'pedas',
        'harga'            => 15000,
        'masa_penyediaan'  => '8 Menit',
        'badge'            => 'Pedas Sedang',
        'badge_type'       => 'pedas',
        'url_gambar'       => 'https://images.unsplash.com/photo-1512058564366-18510be2db19?w=800&q=85',
        'deskripsi'        => 'Nasi goreng dengan isian sosis, bakso kecil, dan telur dengan saus gurih pedas yang nendang. Anti bland, dijamin melek langsung setelah makan!',
        'isi_paket'        => ['Nasi putih 150gr (tidak termasuk)', 'Sosis 2 pcs + Bakso 3 pcs', '1 Butir Telur Ayam', 'Bumbu Nasi Goreng Gila', 'Kecap & saus sambal sachet'],
        'kalori'           => '420 kkal',
        'protein'          => '18g',
    ],
    [
        'id'               => 9,
        'nama_menu'        => 'Ayam Bakar Bumbu Rujak',
        'kategori'         => 'ayam',
        'harga'            => 20000,
        'masa_penyediaan'  => '15 Menit',
        'badge'            => 'New',
        'badge_type'       => 'bestseller',
        'url_gambar'       => 'https://images.unsplash.com/photo-1598515214211-89d3c73ae83b?w=800&q=85',
        'deskripsi'        => 'Ayam potong segar dengan bumbu rujak khas Jawa yang manis, pedas, dan gurih. Cocok dibakar di atas teflon atau bisa juga di oven.',
        'isi_paket'        => ['150gr Ayam Potong Segar', 'Bumbu Rujak Jawa Halus', 'Daun Pisang Pembungkus', 'Sambal Terasi Segar'],
        'kalori'           => '345 kkal',
        'protein'          => '30g',
    ],
    [
        'id'               => 10,
        'nama_menu'        => 'Capcay Goreng Seafood',
        'kategori'         => 'sayur',
        'harga'            => 22000,
        'masa_penyediaan'  => '10 Menit',
        'badge'            => '10 Menit',
        'badge_type'       => 'default',
        'url_gambar'       => 'https://images.unsplash.com/photo-1563379926898-05f4575a45d8?w=800&q=85',
        'deskripsi'        => 'Sayuran segar campur dengan udang dan cumi kecil yang sudah dibersihkan. Bumbu capcay khas restoran Tionghoa yang gurih dan wangi.',
        'isi_paket'        => ['Mix Sayur Segar (wortel, sawi, bakchoy)', 'Udang 50gr (sudah dikupas)', 'Cumi 40gr (sudah dibersihkan)', 'Saus Capcay Spesial', 'Bawang Putih & Jahe Iris'],
        'kalori'           => '280 kkal',
        'protein'          => '22g',
    ],
    [
        'id'               => 11,
        'nama_menu'        => 'Daging Sapi Lada Hitam',
        'kategori'         => 'daging',
        'harga'            => 26000,
        'masa_penyediaan'  => '10 Menit',
        'badge'            => 'Best Seller',
        'badge_type'       => 'bestseller',
        'url_gambar'       => 'https://images.unsplash.com/photo-1546833999-b9f581a1996d?w=800&q=85',
        'deskripsi'        => 'Potongan tipis daging sapi slice premium dengan saus lada hitam ala restoran western. Kaya rasa, mewah, tapi tetap masuk bujet mahasiswa.',
        'isi_paket'        => ['120gr Daging Sapi Slice Tipis', 'Saus Lada Hitam Premium', 'Paprika Merah & Hijau Iris', 'Bawang Bombay', 'Mentega 1 Sachet'],
        'kalori'           => '390 kkal',
        'protein'          => '34g',
    ],
    [
        'id'               => 12,
        'nama_menu'        => 'Sambal Goreng Tempe Teri',
        'kategori'         => 'pedas',
        'harga'            => 10000,
        'masa_penyediaan'  => '8 Menit',
        'badge'            => 'Hemat',
        'badge_type'       => 'vegan',
        'url_gambar'       => 'https://images.unsplash.com/photo-1455619452474-d2be8b1e70cd?w=800&q=85',
        'deskripsi'        => 'Tempe dan teri medan yang dimasak dengan sambal merah yang gurih dan pedas. Menu paling legendaris anak kos seluruh Indonesia!',
        'isi_paket'        => ['100gr Tempe Potong Dadu', 'Teri Medan 30gr', 'Bumbu Sambal Goreng Merah', 'Daun Salam & Serai', 'Gula Merah Serut'],
        'kalori'           => '310 kkal',
        'protein'          => '16g',
    ],
];

// =============================================
// ROUTES
// =============================================

// Rute Halaman Utama
Route::get('/', function () {
    return view('user.landing');
});

// Rute Halaman Arsip Artikel
Route::get('/arsip', function () {
    return view('user.arsip');
});

// Rute Halaman Detail Artikel
Route::get('/artikel/{id}', function ($id) {
    return view('user.artikel', ['id' => $id]);
});

// Rute Halaman Katalog Produk — kirim semua produk ke view
Route::get('/katalog', function () use ($products) {
    return view('user.katalog', compact('products'));
});

// Rute Halaman Detail Produk — cari produk berdasarkan ID
Route::get('/produk/{id}', function ($id) use ($products) {
    $product = collect($products)->firstWhere('id', (int) $id);

    if (!$product) {
        abort(404);
    }

    return view('user.produk', compact('product'));
});
// Rute Halaman Keranjang Belanja
Route::get('/keranjang', function () {
    return view('user.keranjang');
});

// Rute Halaman Pembayaran / Checkout
Route::get('/pembayaran', function () {
    return view('user.pembayaran');
});

// Rute Halaman Riwayat Pesanan
Route::get('/history', function () {
    return view('user.history');
});

// Rute Halaman Login
Route::get('/login', function () {
    return view('auth.login');
});

// Rute Admin Dashboard
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

// Rute Admin Kelola Transaksi
Route::get('/admin/transaksi', function () {
    return view('admin.transaksi');
});

// Rute Admin Kelola Artikel
Route::get('/admin/artikel', function () {
    return view('admin.artikel');
});

// Rute Admin Kelola Produk
Route::get('/admin/produk', function () {
    return view('admin.produk');
});

// Rute Admin Kelola Pengguna
Route::get('/admin/pengguna', function () {
    return view('admin.pengguna');
});
// Rute Halaman Register
Route::get('/register', function () {
    return view('auth.register');
});
