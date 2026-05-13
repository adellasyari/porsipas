@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="container hero-container">
            <!-- Teks Hero -->
            <div class="hero-text">
                <div class="badge">🔥 Solusi Makan Praktis</div>
                <h1>Masak Enak 10 Menit, <br><span class="text-orange">Pas Porsinya, Pas Harganya!</span></h1>
                <p>Solusi meal-kit bahan mentah 1 porsi untuk anak kos. Udah dicuci, dipotong, tinggal cemplung panci. Anti mubazir, dompet aman.</p>
                <div class="hero-buttons">
                    <a href="/katalog" class="btn btn-primary btn-lg">Pesan Sekarang</a>
                    <a href="#how-it-works" class="btn btn-secondary btn-lg">Cara Kerja</a>
                </div>
            </div>
            
            <!-- Gambar Ilustrasi Hero -->
            <div class="hero-image">
                <div class="image-wrapper">
                    <!-- Placeholder premium dari Unsplash -->
                    <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Ilustrasi Meal Kit PorsiPas">
                    
                    <!-- Floating Elements (Aksen dinamis) -->
                    <div class="floating-card card-1">
                        <span class="icon">🥬</span> Sayur Segar
                    </div>
                    <div class="floating-card card-2">
                        <span class="icon">⏱️</span> Siap 10 Menit
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Cara Kerja Section -->
    <section class="how-it-works section-padding" id="how-it-works">
        <div class="container">
            <div class="section-title">
                <h2>Cuma 3 Langkah Praktis</h2>
                <p>Nggak perlu bingung mikir menu atau ribet belanja ke pasar.</p>
            </div>
            
            <div class="steps-grid">
                <div class="step-card">
                    <div class="step-icon">1</div>
                    <h3>Pilih Menu</h3>
                    <p>Pilih dari puluhan menu rumahan yang kami sediakan dan perbarui tiap minggunya.</p>
                </div>
                <div class="step-card">
                    <div class="step-icon">2</div>
                    <h3>Bayar Instan</h3>
                    <p>Checkout cepat pakai e-wallet. Pesanan akan diantar pas di jam yang kamu mau.</p>
                </div>
                <div class="step-card">
                    <div class="step-icon">3</div>
                    <h3>Masak Cepat</h3>
                    <p>Semua bahan sudah dicuci dan ditakar. Tinggal ikuti panduan praktis dan cemplung panci!</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Menu Terfavorit Section -->
    <section class="favorites section-padding bg-light" id="favorites">
        <div class="container">
            <div class="section-title">
                <h2>Menu Terfavorit Anak Kos</h2>
                <p>Pilihan menu andalan yang paling sering dipesan dan pasti enak.</p>
            </div>

            <div class="menu-grid">
                <!-- Card 1 -->
                <div class="menu-card">
                    <div class="menu-img">
                        <img src="https://images.unsplash.com/photo-1512058564366-18510be2db19?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Nasi Gila Spesial">
                        <span class="badge-price">Rp 15.000</span>
                    </div>
                    <div class="menu-info">
                        <h3>Nasi Gila Spesial</h3>
                        <p>Isian sosis, bakso, dan telur dengan saus gurih pedas nendang.</p>
                        <div class="menu-meta">
                            <span>⏱️ 8 Menit</span>
                            <span class="text-green">🔥 Pedas Sedang</span>
                        </div>
                        <a href="/katalog" class="btn btn-outline btn-block">Lihat Detail</a>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="menu-card">
                    <div class="menu-img">
                        <img src="https://images.unsplash.com/photo-1604908176997-125f25cc6f3d?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Ayam Sup Klaten">
                        <span class="badge-price">Rp 18.000</span>
                    </div>
                    <div class="menu-info">
                        <h3>Sop Ayam Klaten</h3>
                        <p>Kuah kaldu bening yang segar dengan potongan dada ayam fillet.</p>
                        <div class="menu-meta">
                            <span>⏱️ 12 Menit</span>
                            <span class="text-green">🍲 Segar</span>
                        </div>
                        <a href="/katalog" class="btn btn-outline btn-block">Lihat Detail</a>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="menu-card">
                    <div class="menu-img">
                        <img src="https://images.unsplash.com/photo-1564834724105-918b73d1b9e0?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Tumis Kangkung Terasi">
                        <span class="badge-price">Rp 12.000</span>
                    </div>
                    <div class="menu-info">
                        <h3>Tumis Kangkung Terasi</h3>
                        <p>Sayur kangkung renyah dengan bumbu terasi khas yang menggugah selera.</p>
                        <div class="menu-meta">
                            <span>⏱️ 5 Menit</span>
                            <span class="text-green">🥬 Sehat</span>
                        </div>
                        <a href="/katalog" class="btn btn-outline btn-block">Lihat Detail</a>
                    </div>
                </div>
            </div>
            
            <div class="center-action mt-5">
                <a href="/katalog" class="btn btn-primary btn-lg">Lihat Semua Menu</a>
            </div>
        </div>
    </section>
    {{-- Blog Preview Section --}}
    <section class="blog-preview section-padding" id="blog-preview">
        <div class="container">
            <div class="blog-preview__inner">
                <div class="blog-preview__text">
                    <span class="blog-preview__eyebrow">📝 Dari Blog Kami</span>
                    <h2 class="blog-preview__title">Intip Tips Masak Hemat <br>Ala Anak Kos</h2>
                    <p class="blog-preview__sub">Belajar cara kelola bahan makanan agar tidak mubazir dan resep sat-set pakai rice-cooker. Sat-set, anti ribet, dompet tetap selamat.</p>
                    <a href="{{ url('/arsip') }}" class="btn btn-outline btn-lg blog-preview__cta">
                        Lihat Semua Artikel &rarr;
                    </a>
                </div>
                <div class="blog-preview__visual" aria-hidden="true">
                    <div class="blog-preview__card-stack">
                        <div class="preview-card preview-card--back">
                            <span>💰 Tips Hemat</span>
                            <p>Meal Prep Mingguan...</p>
                        </div>
                        <div class="preview-card preview-card--mid">
                            <span>💡 Lifehack Kos</span>
                            <p>5 Peralatan Masak Wajib...</p>
                        </div>
                        <div class="preview-card preview-card--front">
                            <span>🍳 Resep Kilat</span>
                            <p>Nasi Goreng Rice Cooker...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
