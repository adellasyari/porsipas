@extends('layouts.app')

@section('content')

<div class="history-page">
    <div class="container">

        {{-- ===== PAGE HEADER ===== --}}
        <div class="history-header">
            <div class="history-header__text">
                <h1 class="history-header__title">Riwayat Pesanan</h1>
                <p class="history-header__sub">Pantau status meal-kit kamu di sini.</p>
            </div>
            <a href="{{ url('/katalog') }}" class="btn btn-primary history-header__cta">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="margin-right:0.4rem;"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                Pesan Lagi
            </a>
        </div>

        {{-- ===== TAB FILTER STATUS ===== --}}
        <div class="history-tabs" id="history-tabs" role="tablist" aria-label="Filter Status Pesanan">
            <button class="history-tab history-tab--active" data-status="semua" role="tab" aria-selected="true">
                Semua
                <span class="history-tab__count">3</span>
            </button>
            <button class="history-tab" data-status="diproses" role="tab" aria-selected="false">
                Diproses
                <span class="history-tab__count">1</span>
            </button>
            <button class="history-tab" data-status="dikirim" role="tab" aria-selected="false">
                Dikirim
                <span class="history-tab__count">1</span>
            </button>
            <button class="history-tab" data-status="selesai" role="tab" aria-selected="false">
                Selesai
                <span class="history-tab__count">1</span>
            </button>
        </div>

        {{-- ===== DAFTAR TRANSAKSI ===== --}}
        <div class="history-container" id="history-container">

            {{-- ========================= --}}
            {{-- CARD 1: STATUS SELESAI    --}}
            {{-- ========================= --}}
            <div class="transaction-card" data-status="selesai">
                {{-- Header Card --}}
                <div class="card-header">
                    <div class="card-header__left">
                        <div class="card-header__icon">🛍️</div>
                        <div class="card-header__info">
                            <span class="card-header__date">12 Mei 2026 · 08.42 WIB</span>
                            <span class="card-header__invoice">INV/20260512/001</span>
                        </div>
                    </div>
                    <span class="status-badge status-badge--success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        Selesai
                    </span>
                </div>

                {{-- Body Card --}}
                <div class="card-body">
                    <div class="card-body__product">
                        <div class="card-body__img-wrap">
                            <img
                                src="https://images.unsplash.com/photo-1569050467447-ce54b3bbc37d?w=80&q=75&fit=crop"
                                alt="Paket Ayam Teriyaki"
                                class="card-body__img"
                                loading="lazy"
                            >
                        </div>
                        <div class="card-body__detail">
                            <p class="card-body__name">Paket Ayam Teriyaki</p>
                            <p class="card-body__qty">2 Porsi</p>
                        </div>
                    </div>
                    <p class="card-body__more">+ 1 menu lainnya (Tumis Kangkung Terasi)</p>
                </div>

                {{-- Footer Card --}}
                <div class="card-footer">
                    <div class="card-footer__total">
                        Total: <strong>Rp 48.000</strong>
                    </div>
                    <div class="card-footer__actions">
                        <a href="{{ url('/produk/1') }}" class="btn btn-primary card-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M23 7l-7 5 7 5V7z"/><rect x="1" y="5" width="15" height="14" rx="2" ry="2"/></svg>
                            Beli Lagi
                        </a>
                        <button class="btn btn-outline card-btn btn-detail" data-order="INV/20260512/001">Lihat Detail</button>
                    </div>
                </div>
            </div>

            {{-- ========================= --}}
            {{-- CARD 2: STATUS DIKIRIM    --}}
            {{-- ========================= --}}
            <div class="transaction-card" data-status="dikirim">
                {{-- Header Card --}}
                <div class="card-header">
                    <div class="card-header__left">
                        <div class="card-header__icon">🛍️</div>
                        <div class="card-header__info">
                            <span class="card-header__date">12 Mei 2026 · 10.15 WIB</span>
                            <span class="card-header__invoice">INV/20260512/002</span>
                        </div>
                    </div>
                    <span class="status-badge status-badge--info">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        Dikirim
                    </span>
                </div>

                {{-- Body Card --}}
                <div class="card-body">
                    <div class="card-body__product">
                        <div class="card-body__img-wrap">
                            <img
                                src="https://images.unsplash.com/photo-1603360946369-dc9bb6258143?w=80&q=75&fit=crop"
                                alt="Rendang Daging Porsi Pas"
                                class="card-body__img"
                                loading="lazy"
                            >
                        </div>
                        <div class="card-body__detail">
                            <p class="card-body__name">Rendang Daging Porsi Pas</p>
                            <p class="card-body__qty">1 Porsi</p>
                        </div>
                    </div>
                    <p class="card-body__more">+ 2 menu lainnya (Tumis Sayur Campur, Sop Ayam Klaten)</p>
                </div>

                {{-- Footer Card --}}
                <div class="card-footer">
                    <div class="card-footer__total">
                        Total: <strong>Rp 64.000</strong>
                    </div>
                    <div class="card-footer__actions">
                        <a href="{{ url('/produk/6') }}" class="btn btn-primary card-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M23 7l-7 5 7 5V7z"/><rect x="1" y="5" width="15" height="14" rx="2" ry="2"/></svg>
                            Beli Lagi
                        </a>
                        <button class="btn btn-outline card-btn btn-track" data-order="INV/20260512/002">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                            Lacak Pengiriman
                        </button>
                    </div>
                </div>

                {{-- Progress tracker khusus status Dikirim --}}
                <div class="delivery-tracker">
                    <div class="delivery-step delivery-step--done">
                        <div class="delivery-step__dot"></div>
                        <span>Pesanan Masuk</span>
                    </div>
                    <div class="delivery-step__line delivery-step__line--done"></div>
                    <div class="delivery-step delivery-step--done">
                        <div class="delivery-step__dot"></div>
                        <span>Diproses Dapur</span>
                    </div>
                    <div class="delivery-step__line delivery-step__line--done"></div>
                    <div class="delivery-step delivery-step--active">
                        <div class="delivery-step__dot"></div>
                        <span>Dalam Pengiriman</span>
                    </div>
                    <div class="delivery-step__line"></div>
                    <div class="delivery-step">
                        <div class="delivery-step__dot"></div>
                        <span>Tiba</span>
                    </div>
                </div>
            </div>

            {{-- ========================= --}}
            {{-- CARD 3: STATUS DIPROSES   --}}
            {{-- ========================= --}}
            <div class="transaction-card" data-status="diproses">
                {{-- Header Card --}}
                <div class="card-header">
                    <div class="card-header__left">
                        <div class="card-header__icon">🛍️</div>
                        <div class="card-header__info">
                            <span class="card-header__date">12 Mei 2026 · 11.03 WIB</span>
                            <span class="card-header__invoice">INV/20260512/003</span>
                        </div>
                    </div>
                    <span class="status-badge status-badge--warning">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        Diproses
                    </span>
                </div>

                {{-- Body Card --}}
                <div class="card-body">
                    <div class="card-body__product">
                        <div class="card-body__img-wrap">
                            <img
                                src="https://images.unsplash.com/photo-1604908176997-125f25cc6f3d?w=80&q=75&fit=crop"
                                alt="Ayam Geprek Sambal Matah"
                                class="card-body__img"
                                loading="lazy"
                            >
                        </div>
                        <div class="card-body__detail">
                            <p class="card-body__name">Ayam Geprek Sambal Matah</p>
                            <p class="card-body__qty">1 Porsi</p>
                        </div>
                    </div>
                    <p class="card-body__more">+ 1 menu lainnya (Tempe Orek Kacang Manis)</p>
                </div>

                {{-- Footer Card --}}
                <div class="card-footer">
                    <div class="card-footer__total">
                        Total: <strong>Rp 46.000</strong>
                    </div>
                    <div class="card-footer__actions">
                        <a href="{{ url('/produk/4') }}" class="btn btn-primary card-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M23 7l-7 5 7 5V7z"/><rect x="1" y="5" width="15" height="14" rx="2" ry="2"/></svg>
                            Beli Lagi
                        </a>
                        <button class="btn btn-outline card-btn btn-detail" data-order="INV/20260512/003">Lihat Detail</button>
                    </div>
                </div>

                {{-- Estimasi waktu untuk pesanan yang sedang diproses --}}
                <div class="processing-eta">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    Dapur sedang menyiapkan pesananmu · Estimasi siap <strong>~15 menit</strong>
                </div>
            </div>

        </div>{{-- End .history-container --}}

        {{-- ===== EMPTY STATE (tersembunyi default) ===== --}}
        <div class="history-empty" id="history-empty" style="display:none;">
            <div class="history-empty__icon">📭</div>
            <h3 class="history-empty__title">Tidak ada pesanan ditemukan</h3>
            <p class="history-empty__sub">Belum ada pesanan dengan status ini.</p>
            <a href="{{ url('/katalog') }}" class="btn btn-primary" style="margin-top:1.5rem;">Mulai Pesan Sekarang</a>
        </div>

    </div>{{-- End .container --}}
</div>{{-- End .history-page --}}

{{-- ===================================================================== --}}
{{-- MODAL 1: DETAIL PESANAN                                               --}}
{{-- ===================================================================== --}}
<div class="modal-overlay" id="modal-detail" role="dialog" aria-modal="true" aria-labelledby="detail-title" style="display:none;">
    <div class="modal-box">
        {{-- Header --}}
        <div class="modal-box__header">
            <div class="modal-box__header-left">
                <div class="modal-box__header-icon">🧾</div>
                <div>
                    <h2 class="modal-box__title" id="detail-title">Detail Pesanan</h2>
                    <span class="modal-box__invoice" id="detail-invoice-num">INV/20260512/001</span>
                </div>
            </div>
            <button class="modal-close" id="close-modal-detail" aria-label="Tutup">&times;</button>
        </div>

        {{-- Body --}}
        <div class="modal-box__body">

            {{-- Alamat Pengiriman --}}
            <div class="modal-section">
                <h3 class="modal-section__title">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                    Alamat Pengiriman
                </h3>
                <div class="modal-address-card">
                    <strong>Rizky Aditya Putra</strong> &middot; 0812-3456-7890
                    <p>Kos Mawar Putri, Kamar 12B, Gang Manggis No.7, dekat Alfamart Jl. Veteran Dalam, Malang.</p>
                    <span class="modal-address-note">Catatan: Tolong hubungi WA dulu sebelum kirim.</span>
                </div>
            </div>

            {{-- Daftar Item --}}
            <div class="modal-section">
                <h3 class="modal-section__title">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
                    Item Pesanan
                </h3>
                <div class="modal-item-list">
                    <div class="modal-item">
                        <img src="https://images.unsplash.com/photo-1569050467447-ce54b3bbc37d?w=60&q=75&fit=crop" alt="Ayam Teriyaki" class="modal-item__img">
                        <div class="modal-item__info">
                            <span class="modal-item__name">Paket Ayam Teriyaki</span>
                            <span class="modal-item__qty">x2 Porsi</span>
                        </div>
                        <span class="modal-item__price">Rp 36.000</span>
                    </div>
                    <div class="modal-item">
                        <img src="https://images.unsplash.com/photo-1564834724105-918b73d1b9e0?w=60&q=75&fit=crop" alt="Tumis Kangkung" class="modal-item__img">
                        <div class="modal-item__info">
                            <span class="modal-item__name">Tumis Kangkung Terasi</span>
                            <span class="modal-item__qty">x1 Porsi</span>
                        </div>
                        <span class="modal-item__price">Rp 12.000</span>
                    </div>
                </div>
            </div>

            {{-- Rincian Pembayaran --}}
            <div class="modal-section">
                <h3 class="modal-section__title">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
                    Rincian Pembayaran
                </h3>
                <div class="modal-pay-rows">
                    <div class="modal-pay-row">
                        <span>Subtotal (3 item)</span>
                        <span>Rp 48.000</span>
                    </div>
                    <div class="modal-pay-row">
                        <span>Ongkos Kirim</span>
                        <span style="color:var(--secondary-green); font-weight:700;">Gratis ✓</span>
                    </div>
                    <div class="modal-pay-row modal-pay-row--total">
                        <span>Total</span>
                        <span>Rp 48.000</span>
                    </div>
                    <div class="modal-pay-row" style="padding-top:0.5rem; border-top: 1px dashed var(--border-color); margin-top:0.25rem;">
                        <span style="color:var(--text-secondary);">Metode Pembayaran</span>
                        <span style="font-weight:700;">⚡ QRIS</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Footer --}}
        <div class="modal-box__footer">
            <button class="btn btn-outline" id="close-detail-btn">Tutup</button>
            <a href="{{ url('/produk/1') }}" class="btn btn-primary">Beli Lagi</a>
        </div>
    </div>
</div>

{{-- ===================================================================== --}}
{{-- MODAL 2: LACAK PENGIRIMAN                                             --}}
{{-- ===================================================================== --}}
<div class="modal-overlay" id="modal-track" role="dialog" aria-modal="true" aria-labelledby="track-title" style="display:none;">
    <div class="modal-box modal-box--track">
        {{-- Header --}}
        <div class="modal-box__header">
            <div class="modal-box__header-left">
                <div class="modal-box__header-icon">🛵</div>
                <div>
                    <h2 class="modal-box__title" id="track-title">Lacak Kurir</h2>
                    <span class="modal-box__invoice">INV/20260512/002</span>
                </div>
            </div>
            <button class="modal-close" id="close-modal-track" aria-label="Tutup">&times;</button>
        </div>

        {{-- ETA Banner --}}
        <div class="track-eta-banner">
            <div class="track-eta-banner__icon">⏱️</div>
            <div>
                <p class="track-eta-banner__label">Estimasi Tiba</p>
                <p class="track-eta-banner__time">~12 Menit</p>
            </div>
            <div class="track-eta-banner__pulse"></div>
        </div>

        {{-- Map Mockup --}}
        <div class="map-mockup">
            <img
                src="https://images.unsplash.com/photo-1524661135-423995f22d0b?w=600&q=80&fit=crop"
                alt="Peta pengiriman"
                class="map-mockup__bg"
            >
            {{-- Overlay rute --}}
            <div class="map-mockup__overlay"></div>
            {{-- Titik tujuan (kos) --}}
            <div class="map-pin map-pin--dest" aria-label="Tujuan">
                <span>🏠</span>
                <div class="map-pin__label">Kos Kamu</div>
            </div>
            {{-- Motor bergerak --}}
            <div class="motorcycle" aria-label="Kurir">
                <span class="motorcycle__icon">🛵</span>
            </div>
        </div>

        {{-- Status Kurir --}}
        <div class="track-status">
            <div class="track-status__dot"></div>
            <p class="track-status__text">Kurir <strong>Bapak Andi</strong> sedang menuju alamat kos kamu...</p>
        </div>

        {{-- Kurir Info --}}
        <div class="track-courier-card">
            <div class="track-courier-card__avatar">👨</div>
            <div class="track-courier-card__info">
                <span class="track-courier-card__name">Bapak Andi Santoso</span>
                <span class="track-courier-card__vehicle">Honda Beat · B 4321 ZZQ</span>
            </div>
            <a href="tel:+6281234000000" class="track-courier-card__call" aria-label="Hubungi kurir">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 13 19.79 19.79 0 0 1 1.61 4.45 2 2 0 0 1 3.59 2.27h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L7.91 9.91a16 16 0 0 0 6.18 6.18l.91-.91a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
            </a>
        </div>

        <div class="modal-box__footer">
            <button class="btn btn-outline" id="close-track-btn">Tutup</button>
        </div>
    </div>
</div>

@endsection
