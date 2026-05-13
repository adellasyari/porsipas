@extends('layouts.app')

@section('content')

<div class="checkout-page">
    <div class="container">

        {{-- ===== PAGE HEADER ===== --}}
        <div class="cart-page__header">
            <a href="{{ url('/keranjang') }}" class="back-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>
                Kembali ke Keranjang
            </a>
            <div class="cart-page__title-wrap">
                <h1 class="cart-page__title">💳 Detail Pembayaran</h1>
            </div>

            {{-- Progress Steps --}}
            <div class="checkout-steps">
                <div class="checkout-step checkout-step--done">
                    <div class="checkout-step__circle">✓</div>
                    <span>Keranjang</span>
                </div>
                <div class="checkout-step__line checkout-step__line--done"></div>
                <div class="checkout-step checkout-step--active">
                    <div class="checkout-step__circle">2</div>
                    <span>Pembayaran</span>
                </div>
                <div class="checkout-step__line"></div>
                <div class="checkout-step">
                    <div class="checkout-step__circle">3</div>
                    <span>Selesai</span>
                </div>
            </div>
        </div>

        {{-- ===== SPLIT LAYOUT ===== --}}
        <div class="checkout-layout">

            {{-- ============================================ --}}
            {{-- KIRI: FORM PENGIRIMAN & METODE PEMBAYARAN   --}}
            {{-- ============================================ --}}
            <div class="checkout-form-col">

                {{-- SECTION 1: ALAMAT PENGIRIMAN --}}
                <div class="checkout-section">
                    <div class="checkout-section__header">
                        <div class="checkout-section__icon">📍</div>
                        <div>
                            <h2 class="checkout-section__title">Alamat Pengiriman</h2>
                            <p class="checkout-section__sub">Pastikan alamat kosanmu sudah benar ya!</p>
                        </div>
                    </div>

                    <form id="form-pengiriman" novalidate>
                        <div class="form-row form-row--2col">
                            <div class="form-group">
                                <label class="form-label" for="nama-penerima">Nama Lengkap</label>
                                <input
                                    type="text"
                                    id="nama-penerima"
                                    name="nama"
                                    class="form-input"
                                    placeholder="Nama penerima paket"
                                    value="Rizky Aditya Putra"
                                    autocomplete="name"
                                >
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="nomor-hp">Nomor HP / WhatsApp</label>
                                <input
                                    type="tel"
                                    id="nomor-hp"
                                    name="hp"
                                    class="form-input"
                                    placeholder="08xx-xxxx-xxxx"
                                    value="0812-3456-7890"
                                    autocomplete="tel"
                                >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="detail-alamat">Detail Alamat Kos</label>
                            <textarea
                                id="detail-alamat"
                                name="alamat"
                                class="form-input form-textarea"
                                placeholder="Nama kos, nomor kamar, patokan terdekat..."
                                rows="3"
                            >Kos Mawar Putri, Kamar 12B, Gang Manggis No.7, dekat minimarket Alfamart Jl. Veteran Dalam, Malang.</textarea>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="catatan-kurir">
                                Catatan untuk Kurir
                                <span class="form-label__optional">(Opsional)</span>
                            </label>
                            <input
                                type="text"
                                id="catatan-kurir"
                                name="catatan"
                                class="form-input"
                                placeholder="Contoh: Tolong hubungi dulu sebelum datang"
                                value="Tolong hubungi WA dulu sebelum kirim, pagar sering terkunci."
                            >
                        </div>
                    </form>
                </div>

                {{-- SECTION 2: METODE PEMBAYARAN --}}
                <div class="checkout-section">
                    <div class="checkout-section__header">
                        <div class="checkout-section__icon">💰</div>
                        <div>
                            <h2 class="checkout-section__title">Metode Pembayaran</h2>
                            <p class="checkout-section__sub">Pilih cara pembayaran yang paling nyaman</p>
                        </div>
                    </div>

                    <div class="payment-methods" id="payment-methods" role="radiogroup" aria-label="Pilih Metode Pembayaran">

                        {{-- QRIS (default terpilih) --}}
                        <label class="payment-method-card payment-method-card--selected" for="pay-qris" id="label-qris">
                            <input type="radio" id="pay-qris" name="payment_method" value="qris" class="payment-method-card__radio" checked>
                            <div class="payment-method-card__icon payment-method-card__icon--qris">⚡</div>
                            <div class="payment-method-card__info">
                                <strong class="payment-method-card__name">QRIS</strong>
                                <span class="payment-method-card__desc">Scan barcode, bayar instan dari app apapun</span>
                            </div>
                            <span class="payment-method-card__badge">⭐ Rekomendasi</span>
                            <div class="payment-method-card__check">✓</div>
                        </label>

                        {{-- Transfer Bank / Virtual Account --}}
                        <label class="payment-method-card payment-method-card--bank-wrap" for="pay-bank" id="label-bank">
                            <div class="payment-method-card__row">
                                <input type="radio" id="pay-bank" name="payment_method" value="bank" class="payment-method-card__radio">
                                <div class="payment-method-card__icon payment-method-card__icon--bank">🏦</div>
                                <div class="payment-method-card__info">
                                    <strong class="payment-method-card__name">Transfer Bank (Virtual Account)</strong>
                                    <span class="payment-method-card__desc">Pilih bank, kode VA dibuat otomatis</span>
                                </div>
                                <div class="payment-method-card__check">✓</div>
                            </div>
                            <select id="bank-selector" name="bank_choice" class="bank-selector" onclick="event.stopPropagation()">
                                <option value="">— Pilih Bank —</option>
                                <option value="bsi">BSI (Bank Syariah Indonesia)</option>
                                <option value="bca">BCA</option>
                                <option value="mandiri">Mandiri</option>
                                <option value="bni">BNI</option>
                            </select>
                        </label>

                        {{-- GoPay --}}
                        <label class="payment-method-card" for="pay-gopay" id="label-gopay">
                            <input type="radio" id="pay-gopay" name="payment_method" value="gopay" class="payment-method-card__radio">
                            <div class="payment-method-card__icon payment-method-card__icon--gopay">🟢</div>
                            <div class="payment-method-card__info">
                                <strong class="payment-method-card__name">GoPay</strong>
                                <span class="payment-method-card__desc">Dompet digital Gojek</span>
                            </div>
                            <div class="payment-method-card__check">✓</div>
                        </label>

                        {{-- COD --}}
                        <label class="payment-method-card" for="pay-cod" id="label-cod">
                            <input type="radio" id="pay-cod" name="payment_method" value="cod" class="payment-method-card__radio">
                            <div class="payment-method-card__icon payment-method-card__icon--cod">🚪</div>
                            <div class="payment-method-card__info">
                                <strong class="payment-method-card__name">Cash on Delivery (COD)</strong>
                                <span class="payment-method-card__desc">Bayar tunai saat paket tiba di depan pintu</span>
                            </div>
                            <div class="payment-method-card__check">✓</div>
                        </label>

                    </div>
                </div>

            </div>{{-- End .checkout-form-col --}}

            {{-- ============================================ --}}
            {{-- KANAN: RINGKASAN PESANAN                    --}}
            {{-- ============================================ --}}
            <div class="cart-summary-col">
                <div class="summary-card summary-card--sticky">
                    <h2 class="summary-card__title">Ringkasan Pesanan</h2>

                    {{-- Daftar Item --}}
                    <div class="checkout-item-list">
                        <div class="checkout-mini-item">
                            <div class="checkout-mini-item__img-wrap">
                                <img
                                    src="https://images.unsplash.com/photo-1604908176997-125f25cc6f3d?w=80&q=75&fit=crop"
                                    alt="Ayam Geprek Sambal Matah"
                                    class="checkout-mini-item__img"
                                >
                                <span class="checkout-mini-item__qty">1</span>
                            </div>
                            <div class="checkout-mini-item__info">
                                <p class="checkout-mini-item__name">Ayam Geprek Sambal Matah</p>
                                <p class="checkout-mini-item__price">Rp 28.000</p>
                            </div>
                        </div>

                        <div class="checkout-mini-item">
                            <div class="checkout-mini-item__img-wrap">
                                <img
                                    src="https://images.unsplash.com/photo-1574894709920-11b28e7367e3?w=80&q=75&fit=crop"
                                    alt="Tempe Orek Kacang Manis"
                                    class="checkout-mini-item__img"
                                >
                                <span class="checkout-mini-item__qty">2</span>
                            </div>
                            <div class="checkout-mini-item__info">
                                <p class="checkout-mini-item__name">Tempe Orek Kacang Manis</p>
                                <p class="checkout-mini-item__price">Rp 36.000</p>
                            </div>
                        </div>
                    </div>

                    {{-- Rincian Biaya --}}
                    <div class="summary-card__rows" style="margin-top: 1.25rem;">
                        <div class="summary-row">
                            <span class="summary-row__label">Subtotal (3 item)</span>
                            <span class="summary-row__val">Rp 64.000</span>
                        </div>
                        <div class="summary-row">
                            <span class="summary-row__label">Ongkos Kirim</span>
                            <span class="summary-row__val summary-row__val--green">
                                Gratis ✓<br>
                                <small>Promo Anak Kos</small>
                            </span>
                        </div>
                        <div class="summary-divider"></div>
                        <div class="summary-row summary-row--total">
                            <span class="summary-row__label">Total Akhir</span>
                            <span class="summary-row__val summary-row__val--total">Rp 64.000</span>
                        </div>
                    </div>

                    {{-- Tombol Bayar --}}
                    <button class="btn btn-primary btn-block btn-lg summary-card__cta" id="btn-pay" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="margin-right:0.5rem;"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
                        Bayar Sekarang
                    </button>

                    {{-- Trust Badges --}}
                    <div class="summary-card__trust">
                        <div class="trust-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                            Pembayaran 100% Aman &amp; Terenkripsi
                        </div>
                        <div class="trust-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                            Estimasi Pengiriman &lt; 60 Menit
                        </div>
                        <div class="trust-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                            Bahan Fresh Disiapkan Tiap Hari
                        </div>
                    </div>

                </div>
            </div>{{-- End .cart-summary-col --}}

        </div>{{-- End .checkout-layout --}}

    </div>{{-- End .container --}}
</div>{{-- End .checkout-page --}}

{{-- ===== MODAL 1: QRIS ===== --}}
<div class="modal-overlay" id="modal-qris" role="dialog" aria-modal="true" aria-labelledby="qris-title" style="display:none;">
    <div class="modal-content">
        <button class="modal-close" id="close-qris" aria-label="Tutup modal">✕</button>
        <div class="modal-icon">⚡</div>
        <h2 class="modal-title" id="qris-title">Scan QR Code Berikut</h2>
        <p class="modal-sub">Gunakan aplikasi e-wallet atau mobile banking apapun</p>

        <div class="qris-img-wrap">
            <img
                src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=PorsiPas-Payment-64000"
                alt="QR Code Pembayaran PorsiPas"
                class="qris-img"
                width="200"
                height="200"
            >
            <div class="qris-img-overlay">
                <span>🍱</span>
            </div>
        </div>

        <div class="modal-amount-box">
            <span class="modal-amount-label">Total Pembayaran</span>
            <span class="modal-amount-val">Rp 64.000</span>
        </div>

        <p class="modal-timer" id="qris-timer">QR Code kedaluwarsa dalam <strong>05:00</strong></p>

        <button class="btn btn-primary btn-block btn-lg modal-confirm-btn" id="btn-qris-paid">
            ✅ Saya Sudah Bayar
        </button>
        <button class="modal-cancel-btn" id="cancel-qris">Batalkan & Pilih Metode Lain</button>
    </div>
</div>

{{-- ===== MODAL 2: TRANSFER BANK / VA (Dinamis) ===== --}}
<div class="modal-overlay" id="modal-bank" role="dialog" aria-modal="true" aria-labelledby="bank-title" style="display:none;">
    <div class="modal-content">
        <button class="modal-close" id="close-bank" aria-label="Tutup modal">✕</button>
        <div class="modal-icon" id="bank-modal-icon">🏦</div>
        <h2 class="modal-title" id="bank-title">Transfer ke Virtual Account</h2>
        <p class="modal-sub" id="bank-modal-sub">Selesaikan pembayaran sebelum batas waktu habis</p>

        {{-- Single VA card — teksnya diisi dinamis oleh JS --}}
        <div class="va-card-list">
            <div class="va-card">
                <div class="va-card__bank">
                    <div class="va-card__bank-logo" id="modal-bank-logo">BSI</div>
                    <div class="va-card__bank-info">
                        <span class="va-card__bank-name" id="modal-bank-name">Bank Syariah Indonesia</span>
                        <span class="va-card__bank-type">Virtual Account</span>
                    </div>
                </div>
                <div class="va-card__number-row">
                    <span class="va-card__number" id="modal-va-number">900 1234 5678</span>
                    <button class="va-card__copy-btn" onclick="copyVA('modal-va-number', this)" aria-label="Salin nomor VA">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg>
                        Salin
                    </button>
                </div>
                <span class="va-card__an">a/n PorsiPas Indonesia</span>
            </div>
        </div>

        <div class="modal-amount-box">
            <span class="modal-amount-label">Nominal Transfer</span>
            <span class="modal-amount-val">Rp 64.000</span>
        </div>

        <p class="modal-note">⚠️ Transfer <strong>tepat sesuai nominal</strong>. Lebih atau kurang 1 rupiah pun akan gagal diverifikasi otomatis.</p>

        <button class="btn btn-primary btn-block btn-lg modal-confirm-btn" id="btn-bank-paid">
            ✅ Saya Sudah Transfer
        </button>
        <button class="modal-cancel-btn" id="cancel-bank">Batalkan &amp; Pilih Metode Lain</button>
    </div>
</div>

@endsection
