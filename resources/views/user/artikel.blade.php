@extends('layouts.app')

@section('content')

<article class="article-detail">
    <div class="container article-container">

        {{-- ===== BACK NAVIGATION ===== --}}
        <nav class="article-back-nav">
            <a href="{{ url('/arsip') }}" class="back-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H5M12 5l-7 7 7 7"/></svg>
                Kembali ke Semua Artikel
            </a>
        </nav>

        {{-- ===== ARTICLE HEADER ===== --}}
        <header class="article-header">
            <span class="article-detail__badge">🍳 Resep Kilat</span>
            <h1 class="article-detail__title">Cara Masak Nasi Goreng Porsi Pas di Rice Cooker</h1>

            {{-- Meta: Penulis + Tanggal + Waktu Baca --}}
            <div class="article-detail__meta">
                <img
                    src="https://ui-avatars.com/api/?name=Admin+PorsiPas&background=FF6B35&color=fff&bold=true&size=40"
                    alt="Admin PorsiPas"
                    class="author-avatar"
                >
                <div class="author-info">
                    <span class="author-name">Admin PorsiPas</span>
                    <span class="article-detail__date">12 Mei 2026 &bull; 3 Min Read</span>
                </div>
            </div>
        </header>

        {{-- ===== COVER IMAGE ===== --}}
        <div class="article-cover">
            <img
                src="https://images.unsplash.com/photo-1603133872878-684f208fb84b?w=1200&q=85"
                alt="Nasi Goreng Porsi Pas di Rice Cooker"
            >
        </div>

        {{-- ===== ARTICLE BODY ===== --}}
        <div class="article-body">

            <p>Hidup di kos bukan berarti kamu harus resign dari makan enak. Nasi goreng adalah salah satu menu paling ikonik Indonesia — dan kabar baiknya, kamu bisa membuatnya dengan rice cooker yang ada di meja kamar kosmu. Tidak perlu wajan, tidak perlu kompor gas, dan tidak perlu banyak bahan. Cukup <strong>10 menit</strong> dan bahan dari <a href="{{ url('/katalog') }}">paket PorsiPas</a>, nasi goreng hangat siap disantap!</p>

            <h2>Bahan-bahan (1 Porsi)</h2>
            <ul>
                <li>150 gram nasi putih (sisa kemarin lebih bagus)</li>
                <li>1 butir telur ayam</li>
                <li>2 siung bawang putih, cincang halus</li>
                <li>1 batang daun bawang, iris tipis</li>
                <li>2 sdm kecap manis</li>
                <li>1 sdm saus tiram</li>
                <li>Garam, merica, dan cabai bubuk secukupnya</li>
                <li>1 sdm minyak goreng</li>
            </ul>

            <blockquote class="article-tip">
                <strong>💡 Tips Ekstra:</strong> Nasi sisa kemarin yang sudah dingin dan agak keras justru menghasilkan nasi goreng yang lebih "kering" dan tidak menggumpal. Ini rahasia nasi goreng restoran yang selalu enak!
            </blockquote>

            <h2>Cara Memasak</h2>
            <ol>
                <li>Nyalakan rice cooker ke mode <strong>"Cook"</strong> (bukan Warm). Tuang 1 sdm minyak goreng ke dalam mangkuk rice cooker.</li>
                <li>Setelah minyak panas (sekitar 1 menit), masukkan bawang putih cincang. Aduk cepat selama 30 detik sampai harum.</li>
                <li>Geser bawang ke pinggir, lalu pecahkan telur di tengah mangkuk. Orak-arik telur sampai setengah matang.</li>
                <li>Masukkan nasi putih. Aduk rata dengan spatula atau sendok kayu bersih.</li>
                <li>Tambahkan kecap manis, saus tiram, garam, merica, dan cabai bubuk. Aduk terus sampai semua bumbu meresap merata ke nasi.</li>
                <li>Taburi daun bawang, aduk sebentar, lalu tutup rice cooker sekitar 2 menit.</li>
                <li>Buka tutup, aduk sekali lagi. Nasi goreng siap disajikan langsung dari mangkuk!</li>
            </ol>

            <p>Mudah banget, kan? Dengan metode ini kamu bahkan nggak perlu piring kotor — makan langsung dari mangkuk rice cooker. Hemat air, hemat waktu, hemat tenaga. Sat-set!</p>

            <blockquote class="article-tip article-tip--green">
                <strong>🥗 Variasi Menu:</strong> Mau yang lebih bergizi? Tambahkan sayuran frozen (wortel, kacang polong) langsung ke dalam rice cooker bersama nasi. Tidak perlu dimasak terpisah!
            </blockquote>

        </div>{{-- End .article-body --}}

        {{-- ===== BACA JUGA SECTION ===== --}}
        <section class="article-related">
            <h2 class="article-related__title">Baca Juga</h2>
            <div class="article-related__grid">

                <a href="{{ url('/artikel/4') }}" class="article-card">
                    <div class="article-card__img-link">
                        <div class="article-card__thumb">
                            <img src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd?w=600&q=80" alt="Salad Buah Segar">
                        </div>
                        <span class="article-card__badge">Resep Kilat</span>
                    </div>
                    <div class="article-card__body">
                        <p class="article-card__meta">5 Mei 2026 &bull; 2 Min Read</p>
                        <h3 class="article-card__title">Salad Buah Segar 5 Menit: Sarapan Sehat Anti Ribet</h3>
                        <p class="article-card__excerpt">Nggak sempat masak pagi? Salad buah ini cuma butuh 5 menit dan nggak perlu kompor sama sekali.</p>
                        <span class="article-card__read-more">Baca Selengkapnya &rarr;</span>
                    </div>
                </a>

                <a href="{{ url('/artikel/7') }}" class="article-card">
                    <div class="article-card__img-link">
                        <div class="article-card__thumb">
                            <img src="https://images.unsplash.com/photo-1547592166-23ac45744acd?w=600&q=80" alt="Telur Orak-Arik">
                        </div>
                        <span class="article-card__badge">Resep Kilat</span>
                    </div>
                    <div class="article-card__body">
                        <p class="article-card__meta">28 Apr 2026 &bull; 3 Min Read</p>
                        <h3 class="article-card__title">3 Variasi Telur Orak-Arik yang Bikin Sarapan Makin Nagih</h3>
                        <p class="article-card__excerpt">Telur orak-arik bukan cuma asin doang. Dengan 3 variasi ini, sarapanmu bakal lebih berwarna.</p>
                        <span class="article-card__read-more">Baca Selengkapnya &rarr;</span>
                    </div>
                </a>

                <a href="{{ url('/artikel/3') }}" class="article-card">
                    <div class="article-card__img-link">
                        <div class="article-card__thumb">
                            <img src="https://images.unsplash.com/photo-1490645935967-10de6ba17061?w=600&q=80" alt="Meal Prep">
                        </div>
                        <span class="article-card__badge badge--hemat">Tips Hemat</span>
                    </div>
                    <div class="article-card__body">
                        <p class="article-card__meta">8 Mei 2026 &bull; 4 Min Read</p>
                        <h3 class="article-card__title">Meal Prep Mingguan: Hemat Rp 200rb Cuma Modal 2 Jam</h3>
                        <p class="article-card__excerpt">Dengan strategi meal prep yang benar, kamu bisa makan enak selama 5 hari dengan bujet mahasiswa.</p>
                        <span class="article-card__read-more">Baca Selengkapnya &rarr;</span>
                    </div>
                </a>

            </div>
        </section>

    </div>{{-- End .article-container --}}
</article>

@endsection
