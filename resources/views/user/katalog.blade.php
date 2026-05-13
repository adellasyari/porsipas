@extends('layouts.app')

@section('content')

    {{-- ===== KATALOG HERO ===== --}}
    <section class="catalog-hero">
        <div class="container">
            <div class="catalog-hero__inner">
                <div class="catalog-hero__text">
                    <h1 class="catalog-hero__title">Menu PorsiPas <span class="text-orange">Hari Ini</span></h1>
                    <p class="catalog-hero__sub">Semua bahan sudah dicuci, dipotong, dan ditakar pas. Tinggal masak.</p>
                </div>
                <div class="catalog-search">
                    <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                    <input type="text" class="search-input" placeholder="Cari menu favoritmu..." id="catalog-search-input">
                </div>
            </div>
        </div>
    </section>

    {{-- ===== FILTER KATEGORI ===== --}}
    <div class="catalog-filter-bar">
        <div class="container">
            <div class="filter-chips" id="catalog-filter-chips">
                <button class="chip chip--active" data-filter="semua">Semua</button>
                <button class="chip" data-filter="ayam">🍗 Ayam</button>
                <button class="chip" data-filter="daging">🥩 Daging</button>
                <button class="chip" data-filter="sayur">🥦 Sayur / Vegan</button>
                <button class="chip" data-filter="pedas">🌶️ Pedas</button>
            </div>
        </div>
    </div>

    {{-- ===== GRID PRODUK (DINAMIK) ===== --}}
    <section class="catalog-section">
        <div class="container">
            <div class="catalog-grid" id="catalog-grid">

                @foreach($products as $item)
                <a href="{{ url('/produk/' . $item['id']) }}"
                   class="product-card"
                   data-category="{{ $item['kategori'] }}"
                   data-name="{{ strtolower($item['nama_menu']) }}">

                    <div class="product-card__img-wrap">
                        <img src="{{ $item['url_gambar'] }}" alt="{{ $item['nama_menu'] }}" loading="lazy">
                        <span class="product-badge product-badge--{{ $item['badge_type'] }}">
                            @if($item['badge_type'] === 'bestseller') ⭐
                            @elseif($item['badge_type'] === 'vegan') 🌿
                            @elseif($item['badge_type'] === 'pedas') 🌶️
                            @else ⏱️
                            @endif
                            {{ $item['badge'] }}
                        </span>
                    </div>

                    <div class="product-card__body">
                        <p class="product-card__category">{{ ucfirst($item['kategori']) }}</p>
                        <h2 class="product-card__name">{{ $item['nama_menu'] }}</h2>
                        <div class="product-card__footer">
                            <span class="product-card__price">Rp {{ number_format($item['harga'], 0, ',', '.') }}</span>
                            <button class="btn-add-cart"
                                    onclick="event.preventDefault();event.stopPropagation();"
                                    aria-label="Tambah ke keranjang">+ Tambah</button>
                        </div>
                    </div>
                </a>
                @endforeach

            </div>

            <div class="catalog-empty-state" id="catalog-empty" style="display:none;">
                <span class="empty-state__icon">🍽️</span>
                <p>Tidak ada menu di kategori ini.</p>
            </div>
        </div>
    </section>

@endsection
