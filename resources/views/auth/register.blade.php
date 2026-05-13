<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Daftar akun PorsiPas dan mulai perjalanan makan hemat dan enak hari ini.">
    <title>Daftar Akun — PorsiPas</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="login-body">

<div class="login-split">

    {{-- ==================== SISI KIRI: HERO ==================== --}}
    <div class="login-hero register-hero" role="img" aria-label="Foto hidangan enak">
        {{-- Konten di atas foto --}}
        <div class="login-hero__content">
            {{-- Logo kecil --}}
            <div class="login-hero__logo">🍱 PorsiPas</div>

            <blockquote class="login-hero__quote">
                "Mulai Perjalanan Makan Hemat & Enak Hari Ini!"
            </blockquote>
            <p class="login-hero__sub">
                Bergabunglah dengan ribuan anak kos lainnya.<br>
                Belanja mudah, masak cepat, perut kenyang.
            </p>

            {{-- Trust badge --}}
            <div class="login-hero__badges">
                <div class="login-hero__badge">
                    <span>👩‍🍳</span> Resep Mudah
                </div>
                <div class="login-hero__badge">
                    <span>🛵</span> Gratis Ongkir
                </div>
                <div class="login-hero__badge">
                    <span>💳</span> Bebas Pilih Bayar
                </div>
            </div>
        </div>
    </div>

    {{-- ==================== SISI KANAN: FORM ==================== --}}
    <div class="login-form-col">
        <div class="login-form-wrap">

            {{-- Logo --}}
            <div class="login-brand">
                <span class="login-brand__icon">🍱</span>
                <span class="login-brand__text">Porsi<strong>Pas</strong></span>
            </div>

            {{-- Headline --}}
            <h1 class="login-form__title">Buat Akun Baru 🚀</h1>
            <p class="login-form__sub">Daftar sekarang untuk mulai memesan meal-kit andalanmu.</p>

            {{-- Alert Success (tersembunyi default) --}}
            <div class="login-alert login-alert--success" id="register-success" role="alert" style="display:none;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                <span id="register-success-msg">Pendaftaran Berhasil!</span>
            </div>

            {{-- Form --}}
            <form class="login-form" id="register-form" novalidate>

                {{-- Nama Lengkap --}}
                <div class="form-group">
                    <label class="form-label" for="reg-name">Nama Lengkap</label>
                    <div class="form-input-wrap">
                        <span class="form-input-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                        </span>
                        <input
                            type="text"
                            id="reg-name"
                            name="name"
                            class="form-input form-input--icon"
                            placeholder="Masukkan nama lengkap"
                            autocomplete="name"
                            required
                        >
                    </div>
                </div>

                {{-- Email --}}
                <div class="form-group">
                    <label class="form-label" for="reg-email">Alamat Email</label>
                    <div class="form-input-wrap">
                        <span class="form-input-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                        </span>
                        <input
                            type="email"
                            id="reg-email"
                            name="email"
                            class="form-input form-input--icon"
                            placeholder="contoh@email.com"
                            autocomplete="email"
                            required
                        >
                    </div>
                </div>

                {{-- Password --}}
                <div class="form-group">
                    <label class="form-label" for="reg-password">Password</label>
                    <div class="form-input-wrap">
                        <span class="form-input-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                        </span>
                        <input
                            type="password"
                            id="reg-password"
                            name="password"
                            class="form-input form-input--icon"
                            placeholder="Min. 8 karakter"
                            required
                        >
                        <button type="button" class="form-input-toggle" id="toggle-reg-password" aria-label="Tampilkan password">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                        </button>
                    </div>
                </div>

                {{-- Konfirmasi Password --}}
                <div class="form-group">
                    <label class="form-label" for="reg-password-confirm">Konfirmasi Password</label>
                    <div class="form-input-wrap">
                        <span class="form-input-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                        </span>
                        <input
                            type="password"
                            id="reg-password-confirm"
                            name="password_confirmation"
                            class="form-input form-input--icon"
                            placeholder="Ulangi password"
                            required
                        >
                    </div>
                </div>

                {{-- T&C Checkbox --}}
                <div class="form-group" style="flex-direction:row; align-items:flex-start; gap:0.6rem; margin-top:0.5rem;">
                    <input type="checkbox" id="reg-terms" class="form-checkbox" required>
                    <label for="reg-terms" class="form-label" style="margin:0; font-weight:500; cursor:pointer; line-height:1.4;">
                        Saya setuju dengan <a href="#" style="color:var(--accent-orange); text-decoration:none; font-weight:700;">Syarat & Ketentuan</a> PorsiPas
                    </label>
                </div>

                {{-- Tombol Daftar --}}
                <button type="submit" class="btn btn-primary btn-block btn-lg login-submit-btn" id="btn-register">
                    <span id="btn-register-text">Daftar Akun</span>
                    <span id="btn-register-spinner" class="login-spinner" style="display:none;"></span>
                </button>

            </form>

            {{-- Divider --}}
            <div class="login-divider">
                <span>sudah terdaftar?</span>
            </div>

            {{-- Login link --}}
            <p class="login-form__register">
                Sudah punya akun?
                <a href="{{ url('/login') }}" class="login-form__register-link">Masuk di sini</a>
            </p>

        </div>
    </div>{{-- End .login-form-col --}}

</div>{{-- End .login-split --}}

<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
