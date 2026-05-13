@extends('layouts.app')

@section('content')

    {{-- ===== ARTICLE HERO SECTION ===== --}}
    <section class="article-hero">
        <div class="container">
            <span class="article-hero__eyebrow">📖 Blog & Tips</span>
            <h1 class="article-hero__title">Tips & Resep Ala Anak Kos</h1>
            <p class="article-hero__sub">Baca panduan singkat biar masak makin sat-set dan dompet tetap aman.</p>
        </div>
    </section>

    {{-- ===== FILTER KATEGORI ===== --}}
    <section class="article-filter-bar">
        <div class="container">
            <div class="filter-chips" id="filter-chips">
                <button class="chip chip--active" data-filter="semua">Semua</button>
                <button class="chip" data-filter="resep-kilat">🍳 Resep Kilat</button>
                <button class="chip" data-filter="lifehack-kos">💡 Lifehack Kos</button>
                <button class="chip" data-filter="tips-hemat">💰 Tips Hemat</button>
            </div>
        </div>
    </section>

    {{-- ===== GRID ARTIKEL ===== --}}
    <section class="article-grid-section">
        <div class="container">
            <div class="article-grid" id="article-grid">

                {{-- === CARD 1 === --}}
                <a href="{{ url('/artikel/1') }}" class="article-card" data-category="resep-kilat">
                    <div class="article-card__img-link">
                        <div class="article-card__thumb">
                            <img src="https://images.unsplash.com/photo-1603133872878-684f208fb84b?w=600&q=80" alt="Nasi Goreng Rice Cooker">
                        </div>
                        <span class="article-card__badge">Resep Kilat</span>
                    </div>
                    <div class="article-card__body">
                        <p class="article-card__meta">12 Mei 2026 &bull; 3 Min Read</p>
                        <h2 class="article-card__title">Cara Masak Nasi Goreng Porsi Pas di Rice Cooker</h2>
                        <p class="article-card__excerpt">Siapa bilang nasi goreng harus pakai wajan besar? Dengan rice cooker kesayangan kamu, nasi goreng 1 porsi bisa jadi dalam 10 menit.</p>
                        <span class="article-card__read-more">Baca Selengkapnya &rarr;</span>
                    </div>
                </a>

                {{-- === CARD 2 === --}}
                <a href="{{ url('/artikel/2') }}" class="article-card" data-category="lifehack-kos">
                    <div class="article-card__img-link">
                        <div class="article-card__thumb">
                            <img src="https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=600&q=80" alt="Peralatan Masak Kos">
                        </div>
                        <span class="article-card__badge badge--lifehack">Lifehack Kos</span>
                    </div>
                    <div class="article-card__body">
                        <p class="article-card__meta">10 Mei 2026 &bull; 5 Min Read</p>
                        <h2 class="article-card__title">5 Peralatan Masak Wajib yang Muat di Dapur Kos 1x1 Meter</h2>
                        <p class="article-card__excerpt">Dapur sempit bukan alasan buat makan nggak enak. Ini daftar peralatan esensial yang multifungsi dan hemat tempat banget.</p>
                        <span class="article-card__read-more">Baca Selengkapnya &rarr;</span>
                    </div>
                </a>

                {{-- === CARD 3 === --}}
                <a href="{{ url('/artikel/3') }}" class="article-card" data-category="tips-hemat">
                    <div class="article-card__img-link">
                        <div class="article-card__thumb">
                            <img src="https://images.unsplash.com/photo-1490645935967-10de6ba17061?w=600&q=80" alt="Meal Prep Mingguan">
                        </div>
                        <span class="article-card__badge badge--hemat">Tips Hemat</span>
                    </div>
                    <div class="article-card__body">
                        <p class="article-card__meta">8 Mei 2026 &bull; 4 Min Read</p>
                        <h2 class="article-card__title">Meal Prep Mingguan: Hemat Rp 200rb Cuma Modal 2 Jam</h2>
                        <p class="article-card__excerpt">Dengan strategi meal prep yang benar, kamu bisa makan 3x sehari selama 5 hari dengan bujet mahasiswa. Yuk coba!</p>
                        <span class="article-card__read-more">Baca Selengkapnya &rarr;</span>
                    </div>
                </a>

                {{-- === CARD 4 === --}}
                <a href="{{ url('/artikel/4') }}" class="article-card" data-category="resep-kilat">
                    <div class="article-card__img-link">
                        <div class="article-card__thumb">
                            <img src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd?w=600&q=80" alt="Salad Buah Segar">
                        </div>
                        <span class="article-card__badge">Resep Kilat</span>
                    </div>
                    <div class="article-card__body">
                        <p class="article-card__meta">5 Mei 2026 &bull; 2 Min Read</p>
                        <h2 class="article-card__title">Salad Buah Segar 5 Menit: Sarapan Sehat Anti Ribet</h2>
                        <p class="article-card__excerpt">Nggak sempat masak pagi? Salad buah ini cuma butuh 5 menit dan nggak perlu kompor sama sekali. Cocok buat ngebut.</p>
                        <span class="article-card__read-more">Baca Selengkapnya &rarr;</span>
                    </div>
                </a>

                {{-- === CARD 5 === --}}
                <a href="{{ url('/artikel/5') }}" class="article-card" data-category="lifehack-kos">
                    <div class="article-card__img-link">
                        <div class="article-card__thumb">
                            <img src="https://images.unsplash.com/photo-1585338107529-13afc5f02586?w=600&q=80" alt="Simpan Bahan di Kulkas Mini">
                        </div>
                        <span class="article-card__badge badge--lifehack">Lifehack Kos</span>
                    </div>
                    <div class="article-card__body">
                        <p class="article-card__meta">3 Mei 2026 &bull; 6 Min Read</p>
                        <h2 class="article-card__title">Cara Simpan Bahan Makanan di Kulkas Mini Kos Biar Tahan Seminggu</h2>
                        <p class="article-card__excerpt">Kulkas mini berkapasitas kecil butuh strategi penyimpanan yang tepat agar bahan makananmu tidak cepat busuk.</p>
                        <span class="article-card__read-more">Baca Selengkapnya &rarr;</span>
                    </div>
                </a>

                {{-- === CARD 6 === --}}
                <a href="{{ url('/artikel/6') }}" class="article-card" data-category="tips-hemat">
                    <div class="article-card__img-link">
                        <div class="article-card__thumb">
                            <img src="https://images.unsplash.com/photo-1534483509719-3feaee7c30da?w=600&q=80" alt="Belanja Pasar vs Supermarket">
                        </div>
                        <span class="article-card__badge badge--hemat">Tips Hemat</span>
                    </div>
                    <div class="article-card__body">
                        <p class="article-card__meta">1 Mei 2026 &bull; 4 Min Read</p>
                        <h2 class="article-card__title">Belanja Pasar Pagi vs Supermarket: Mana Lebih Hemat buat Anak Kos?</h2>
                        <p class="article-card__excerpt">Perbandingan jujur antara belanja di pasar tradisional dan supermarket modern — dari segi harga, kualitas, hingga kepraktisannya.</p>
                        <span class="article-card__read-more">Baca Selengkapnya &rarr;</span>
                    </div>
                </a>

                {{-- === CARD 7 === --}}
                <a href="{{ url('/artikel/7') }}" class="article-card" data-category="resep-kilat">
                    <div class="article-card__img-link">
                        <div class="article-card__thumb">
                            <img src="https://images.unsplash.com/photo-1547592166-23ac45744acd?w=600&q=80" alt="Telur Orak-Arik">
                        </div>
                        <span class="article-card__badge">Resep Kilat</span>
                    </div>
                    <div class="article-card__body">
                        <p class="article-card__meta">28 Apr 2026 &bull; 3 Min Read</p>
                        <h2 class="article-card__title">3 Variasi Telur Orak-Arik yang Bikin Sarapan Makin Nagih</h2>
                        <p class="article-card__excerpt">Telur orak-arik bukan cuma asin doang. Dengan 3 variasi ini, sarapanmu bakal lebih berwarna dan tetap under 5 menit.</p>
                        <span class="article-card__read-more">Baca Selengkapnya &rarr;</span>
                    </div>
                </a>

                {{-- === CARD 8 === --}}
                <a href="{{ url('/artikel/8') }}" class="article-card" data-category="lifehack-kos">
                    <div class="article-card__img-link">
                        <div class="article-card__thumb">
                            <img src="https://images.unsplash.com/photo-1466637574441-749b8f19452f?w=600&q=80" alt="Bumbu Dasar Kos">
                        </div>
                        <span class="article-card__badge badge--lifehack">Lifehack Kos</span>
                    </div>
                    <div class="article-card__body">
                        <p class="article-card__meta">25 Apr 2026 &bull; 5 Min Read</p>
                        <h2 class="article-card__title">7 Bumbu Dasar yang Wajib Ada di Dapur Kos Kamu</h2>
                        <p class="article-card__excerpt">Dengan 7 bumbu dasar ini, hampir semua masakan rumahan bisa kamu bikin tanpa perlu belanja banyak bahan.</p>
                        <span class="article-card__read-more">Baca Selengkapnya &rarr;</span>
                    </div>
                </a>

                {{-- === CARD 9 === --}}
                <a href="{{ url('/artikel/9') }}" class="article-card" data-category="tips-hemat">
                    <div class="article-card__img-link">
                        <div class="article-card__thumb">
                            <img src="https://images.unsplash.com/photo-1498837167922-ddd27525d352?w=600&q=80" alt="Atur Bujet Makan">
                        </div>
                        <span class="article-card__badge badge--hemat">Tips Hemat</span>
                    </div>
                    <div class="article-card__body">
                        <p class="article-card__meta">22 Apr 2026 &bull; 7 Min Read</p>
                        <h2 class="article-card__title">Cara Atur Bujet Makan Rp 500rb Sebulan Tanpa Kelaparan</h2>
                        <p class="article-card__excerpt">Dengan perencanaan yang tepat, Rp 500 ribu bisa cukup untuk makan enak selama sebulan penuh. Ini panduan lengkapnya.</p>
                        <span class="article-card__read-more">Baca Selengkapnya &rarr;</span>
                    </div>
                </a>

            </div>{{-- End .article-grid --}}

            {{-- Empty State --}}
            <div class="article-empty-state" id="empty-state" style="display:none;">
                <span class="empty-state__icon">🔍</span>
                <p>Tidak ada artikel di kategori ini.</p>
            </div>

        </div>
    </section>

@endsection
