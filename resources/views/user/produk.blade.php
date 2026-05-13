@extends('layouts.app')

@section('content')

<div class="produk-page">
    <div class="container">

        {{-- ===== BREADCRUMBS ===== --}}
        <nav class="breadcrumb" aria-label="Breadcrumb">
            <a href="{{ url('/') }}" class="breadcrumb__link">Beranda</a>
            <span class="breadcrumb__sep">/</span>
            <a href="{{ url('/katalog') }}" class="breadcrumb__link">Katalog Menu</a>
            <span class="breadcrumb__sep">/</span>
            <span class="breadcrumb__current">{{ $product['nama_menu'] }}</span>
        </nav>

        {{-- ===== PRODUCT DETAIL LAYOUT ===== --}}
        <div class="product-detail-layout">

            {{-- KIRI: Gambar --}}
            <div class="product-detail__gallery">
                <div class="product-detail__img-main" id="main-img-wrap">
                    <img src="{{ $product['url_gambar'] }}"
                         alt="{{ $product['nama_menu'] }}"
                         id="main-product-img">
                </div>
                <div class="product-detail__img-thumbs">
                    <img src="{{ $product['url_gambar'] }}" alt="Tampilan 1" class="thumb thumb--active">
                    <img src="{{ str_replace('w=800', 'w=800&sat=-30', $product['url_gambar']) }}" alt="Tampilan 2" class="thumb">
                    <img src="{{ str_replace('w=800', 'w=800&blur=100', $product['url_gambar']) }}" alt="Tampilan 3" class="thumb">
                </div>
            </div>

            {{-- KANAN: Informasi Produk --}}
            <div class="product-detail__info">

                <div class="product-detail__badges">
                    <span class="product-badge product-badge--{{ $product['badge_type'] }}">
                        @if($product['badge_type'] === 'bestseller') ⭐
                        @elseif($product['badge_type'] === 'vegan') 🌿
                        @elseif($product['badge_type'] === 'pedas') 🌶️
                        @else ⏱️
                        @endif
                        {{ $product['badge'] }}
                    </span>
                    <span class="product-badge">⏱️ {{ $product['masa_penyediaan'] }}</span>
                </div>

                <h1 class="product-detail__title">{{ $product['nama_menu'] }}</h1>

                <p class="product-detail__price">
                    Rp {{ number_format($product['harga'], 0, ',', '.') }}
                    <span class="product-detail__price-sub">/ 1 porsi</span>
                </p>

                {{-- Rating --}}
                <div class="product-detail__rating">
                    <div class="stars" aria-label="Rating 4.8 dari 5">
                        <span class="star star--full">★</span>
                        <span class="star star--full">★</span>
                        <span class="star star--full">★</span>
                        <span class="star star--full">★</span>
                        <span class="star star--half">★</span>
                    </div>
                    <span class="rating-score">4.8</span>
                    <span class="rating-count">(128 ulasan)</span>
                </div>

                <p class="product-detail__desc">{{ $product['deskripsi'] }}</p>

                {{-- Isi Paket --}}
                <div class="product-detail__includes">
                    <h3 class="includes__title">Isi Paket:</h3>
                    <ul class="includes__list">
                        @foreach($product['isi_paket'] as $isi)
                        <li>{{ $isi }}</li>
                        @endforeach
                    </ul>
                </div>

                {{-- Quantity Selector --}}
                <div class="product-detail__order">
                    <label class="order-label">Jumlah:</label>
                    <div class="quantity-selector" id="quantity-selector">
                        <button class="qty-btn qty-btn--minus" id="qty-minus" aria-label="Kurangi jumlah">−</button>
                        <span class="qty-value" id="qty-value">1</span>
                        <button class="qty-btn qty-btn--plus" id="qty-plus" aria-label="Tambah jumlah">+</button>
                    </div>
                    <span class="qty-total-price" id="qty-total-price">
                        Total: <strong>Rp {{ number_format($product['harga'], 0, ',', '.') }}</strong>
                    </span>
                </div>
                {{-- Harga dasar untuk JS quantity update --}}
                <input type="hidden" id="base-price" value="{{ $product['harga'] }}">

                {{-- CTA Buttons --}}
                <div class="product-detail__cta">
                    <a href="{{ url('/keranjang') }}" class="btn btn-primary btn-lg cta-cart" id="btn-add-to-cart">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
                        Masukkan Keranjang
                    </a>
                    <a href="{{ url('/pembayaran') }}" class="btn btn-outline btn-lg cta-buy">Beli Langsung</a>
                </div>

            </div>{{-- End .product-detail__info --}}
        </div>{{-- End .product-detail-layout --}}

        {{-- ===== TABS: CARA MEMASAK / NUTRISI / ULASAN ===== --}}
        <div class="product-tabs">
            <div class="tab-header" id="tab-header">
                <button class="tab-btn tab-btn--active" data-tab="cara-masak">Cara Memasak</button>
                <button class="tab-btn" data-tab="nutrisi">Info Nutrisi</button>
                <button class="tab-btn" data-tab="ulasan">Ulasan (128)</button>
            </div>

            <div class="tab-content tab-content--active" id="tab-cara-masak">
                <ol class="cooking-steps">
                    <li class="cooking-step">
                        <div class="step-num">1</div>
                        <div class="step-body">
                            <h4>Siapkan Peralatan</h4>
                            <p>Panaskan wajan anti lengket atau rice cooker dengan 1 sdm minyak goreng di atas api sedang selama 1-2 menit.</p>
                        </div>
                    </li>
                    <li class="cooking-step">
                        <div class="step-num">2</div>
                        <div class="step-body">
                            <h4>Masak Bahan Utama</h4>
                            <p>Masukkan bahan utama dari paket. Masak dengan api sedang selama 3-5 menit hingga matang merata, sambil sesekali diaduk.</p>
                        </div>
                    </li>
                    <li class="cooking-step">
                        <div class="step-num">3</div>
                        <div class="step-body">
                            <h4>Tambahkan Bumbu</h4>
                            <p>Tuangkan bumbu sachet yang sudah disediakan. Aduk rata dan masak 2-3 menit hingga bumbu meresap sempurna ke bahan utama.</p>
                        </div>
                    </li>
                    <li class="cooking-step">
                        <div class="step-num">4</div>
                        <div class="step-body">
                            <h4>Cek Kematangan</h4>
                            <p>Pastikan bahan sudah matang sempurna. Cicipi rasa, sesuaikan garam jika perlu. Masak 1-2 menit lagi jika diperlukan.</p>
                        </div>
                    </li>
                    <li class="cooking-step">
                        <div class="step-num">5</div>
                        <div class="step-body">
                            <h4>Sajikan & Nikmati</h4>
                            <p>Angkat dan sajikan hangat bersama nasi putih. Taburi pelengkap yang tersedia. Selamat makan! 🍱</p>
                        </div>
                    </li>
                </ol>
            </div>

            <div class="tab-content" id="tab-nutrisi" style="display:none;">
                <div class="nutrition-grid">
                    <div class="nutrition-item">
                        <span class="nutri-label">Kalori</span>
                        <span class="nutri-val">{{ $product['kalori'] }}</span>
                    </div>
                    <div class="nutrition-item">
                        <span class="nutri-label">Protein</span>
                        <span class="nutri-val">{{ $product['protein'] }}</span>
                    </div>
                    <div class="nutrition-item"><span class="nutri-label">Karbohidrat</span><span class="nutri-val">~20g</span></div>
                    <div class="nutrition-item"><span class="nutri-label">Lemak</span><span class="nutri-val">~12g</span></div>
                    <div class="nutrition-item"><span class="nutri-label">Serat</span><span class="nutri-val">~3g</span></div>
                    <div class="nutrition-item"><span class="nutri-label">Sodium</span><span class="nutri-val">~480mg</span></div>
                </div>
                <p class="nutri-note">*Nilai gizi per porsi (tanpa nasi). Berdasarkan kebutuhan harian 2000 kkal.</p>
            </div>

            <div class="tab-content" id="tab-ulasan" style="display:none;">
                <div class="review-summary">
                    <span class="review-big-score">4.8</span>
                    <div>
                        <div class="stars" style="font-size:1.5rem;">★★★★★</div>
                        <p>dari 128 ulasan</p>
                    </div>
                </div>
                <div class="review-list">
                    <div class="review-item">
                        <img src="https://ui-avatars.com/api/?name=Budi+S&background=2A9D8F&color=fff&size=40" alt="Budi S" class="review-avatar">
                        <div class="review-body">
                            <span class="review-name">Budi S.</span>
                            <div class="stars review-stars">★★★★★</div>
                            <p class="review-text">"Enak banget! Bahan-bahannya fresh, bumbunya nendang. 10 menit beneran cukup. Recommended banget buat anak kos!"</p>
                        </div>
                    </div>
                    <div class="review-item">
                        <img src="https://ui-avatars.com/api/?name=Dinda+R&background=FF6B35&color=fff&size=40" alt="Dinda R" class="review-avatar">
                        <div class="review-body">
                            <span class="review-name">Dinda R.</span>
                            <div class="stars review-stars">★★★★☆</div>
                            <p class="review-text">"Bahan-bahannya fresh banget, porsinya pas nggak lebih nggak kurang. Sudah pesan 3x, selalu puas! Pesan lagi deh."</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>{{-- End .product-tabs --}}

    </div>{{-- End .container --}}
</div>{{-- End .produk-page --}}

@endsection
