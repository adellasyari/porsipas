@extends('layouts.app')

@section('content')

<div class="cart-page">
    <div class="container">

        {{-- PAGE HEADER --}}
        <div class="cart-page__header">
            <a href="{{ url('/katalog') }}" class="back-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>
                Lanjut Belanja
            </a>
            <div class="cart-page__title-wrap">
                <h1 class="cart-page__title">🛒 Keranjang Belanjamu</h1>
                <span class="cart-item-count" id="cart-item-count">3 item</span>
            </div>
        </div>

        {{-- SPLIT LAYOUT --}}
        <div class="cart-layout">

            {{-- KIRI: DAFTAR ITEM --}}
            <div class="cart-items-col">
                <div id="cart-items-list">

                    {{-- ITEM 1 --}}
                    <div class="cart-item" id="cart-item-1" data-price="28000">
                        <div class="cart-item__img-wrap">
                            <img src="https://images.unsplash.com/photo-1604908176997-125f25cc6f3d?w=200&q=80&fit=crop" alt="Ayam Geprek Sambal Matah" class="cart-item__img" loading="lazy">
                        </div>
                        <div class="cart-item__details">
                            <div class="cart-item__top">
                                <div>
                                    <p class="cart-item__category">🌶️ Ayam &amp; Unggas</p>
                                    <h2 class="cart-item__name">Ayam Geprek Sambal Matah</h2>
                                    <p class="cart-item__desc">Paket bahan segar: dada ayam, sambal matah, lalapan</p>
                                </div>
                                <button class="cart-item__delete" aria-label="Hapus item" onclick="removeCartItem('cart-item-1')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/><path d="M10 11v6M14 11v6"/><path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/></svg>
                                </button>
                            </div>
                            <div class="cart-item__bottom">
                                <p class="cart-item__price" id="price-display-1">Rp 28.000</p>
                                <div class="quantity-control">
                                    <button class="qty-ctrl__btn" onclick="changeQty('cart-item-1', -1)" aria-label="Kurangi">−</button>
                                    <span class="qty-ctrl__val" id="qty-val-1">1</span>
                                    <button class="qty-ctrl__btn" onclick="changeQty('cart-item-1', 1)" aria-label="Tambah">+</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- ITEM 2 --}}
                    <div class="cart-item" id="cart-item-2" data-price="18000">
                        <div class="cart-item__img-wrap">
                            <img src="https://images.unsplash.com/photo-1574894709920-11b28e7367e3?w=200&q=80&fit=crop" alt="Tempe Orek Kacang" class="cart-item__img" loading="lazy">
                        </div>
                        <div class="cart-item__details">
                            <div class="cart-item__top">
                                <div>
                                    <p class="cart-item__category">🌿 Vegan &amp; Sehat</p>
                                    <h2 class="cart-item__name">Tempe Orek Kacang Manis</h2>
                                    <p class="cart-item__desc">Paket bahan segar: tempe, kacang tanah, bumbu orek lengkap</p>
                                </div>
                                <button class="cart-item__delete" aria-label="Hapus item" onclick="removeCartItem('cart-item-2')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/><path d="M10 11v6M14 11v6"/><path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/></svg>
                                </button>
                            </div>
                            <div class="cart-item__bottom">
                                <p class="cart-item__price" id="price-display-2">Rp 36.000</p>
                                <div class="quantity-control">
                                    <button class="qty-ctrl__btn" onclick="changeQty('cart-item-2', -1)" aria-label="Kurangi">−</button>
                                    <span class="qty-ctrl__val" id="qty-val-2">2</span>
                                    <button class="qty-ctrl__btn" onclick="changeQty('cart-item-2', 1)" aria-label="Tambah">+</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- Empty State --}}
                <div class="cart-empty-state" id="cart-empty-state" style="display:none;">
                    <div class="cart-empty-state__icon">🛒</div>
                    <h3>Keranjangmu masih kosong</h3>
                    <p>Yuk, pilih menu lezat dari katalog kami!</p>
                    <a href="{{ url('/katalog') }}" class="btn btn-primary" style="margin-top:1.5rem;">Lihat Katalog</a>
                </div>
            </div>

            {{-- KANAN: RINGKASAN BELANJA --}}
            <div class="cart-summary-col">
                <div class="summary-card">
                    <h2 class="summary-card__title">Ringkasan Belanja</h2>

                    <div class="summary-card__promo">
                        <span class="promo-badge">🎉 Promo Aktif</span>
                        <p>Gratis ongkir untuk wilayah kampus!</p>
                    </div>

                    <div class="summary-card__rows">
                        <div class="summary-row">
                            <span class="summary-row__label">Subtotal <span id="summary-item-count">(3 item)</span></span>
                            <span class="summary-row__val" id="summary-subtotal">Rp 64.000</span>
                        </div>
                        <div class="summary-row">
                            <span class="summary-row__label">Ongkos Kirim</span>
                            <span class="summary-row__val summary-row__val--green">
                                Gratis ✓<br><small>Promo Anak Kos</small>
                            </span>
                        </div>
                        <div class="summary-divider"></div>
                        <div class="summary-row summary-row--total">
                            <span class="summary-row__label">Total Keseluruhan</span>
                            <span class="summary-row__val summary-row__val--total" id="summary-total">Rp 64.000</span>
                        </div>
                    </div>

                    <a href="{{ url('/pembayaran') }}" class="btn btn-primary btn-block btn-lg summary-card__cta" id="btn-checkout">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="margin-right:0.5rem;"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        Lanjut ke Pembayaran
                    </a>

                    <div class="summary-card__trust">
                        <div class="trust-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                            Transaksi Aman &amp; Terenkripsi
                        </div>
                        <div class="trust-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                            Pengiriman &lt; 60 Menit
                        </div>
                    </div>
                </div>
            </div>

        </div>{{-- End .cart-layout --}}

    </div>{{-- End .container --}}
</div>{{-- End .cart-page --}}

@endsection
