<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk — PorsiPas</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="login-body">

<div class="login-split">

    {{-- KIRI: HERO FOTO --}}
    <div class="login-hero">
        <div class="login-hero__overlay"></div>
        <div class="login-hero__content">
            <div class="login-hero__logo">🍱 PorsiPas</div>
            <blockquote class="login-hero__quote">"Masak Enak, Tanpa Sisa."</blockquote>
            <p class="login-hero__sub">Solusi tepat untuk perut lapar dan waktu sempit.<br>Bahan segar, porsi pas, langsung ke pintu kosanmu.</p>
            <div class="login-hero__badges">
                <div class="login-hero__badge"><span>🌿</span> Bahan Segar</div>
                <div class="login-hero__badge"><span>⚡</span> Kirim Cepat</div>
                <div class="login-hero__badge"><span>💰</span> Harga Kos</div>
            </div>
        </div>
        <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=900&q=85&fit=crop" alt="" class="login-hero__bg" aria-hidden="true">
    </div>

    {{-- KANAN: FORM LOGIN --}}
    <div class="login-form-col">
        <div class="login-form-wrap">

            <div class="login-brand">
                <span class="login-brand__icon">🍱</span>
                <span class="login-brand__text">Porsi<strong>Pas</strong></span>
            </div>

            <h1 class="login-form__title">Selamat Datang Kembali! 👋</h1>
            <p class="login-form__sub">Masuk untuk lanjut memesan meal-kit favoritmu.</p>

            <div class="login-alert login-alert--error" id="login-error" role="alert" style="display:none;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                <span id="login-error-msg">Email atau password salah.</span>
            </div>

            <form class="login-form" id="login-form" novalidate>

                <div class="form-group">
                    <label class="form-label" for="login-email">Alamat Email</label>
                    <div class="form-input-wrap">
                        <span class="form-input-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                        </span>
                        <input type="email" id="login-email" name="email" class="form-input form-input--icon" placeholder="contoh@email.com" autocomplete="email" required>
                    </div>
                </div>

                <div class="form-group">
                    <div style="display:flex;justify-content:space-between;align-items:center;">
                        <label class="form-label" for="login-password">Password</label>
                        <a href="#" class="login-form__forgot">Lupa Password?</a>
                    </div>
                    <div class="form-input-wrap">
                        <span class="form-input-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                        </span>
                        <input type="password" id="login-password" name="password" class="form-input form-input--icon" placeholder="••••••••" autocomplete="current-password" required>
                        <button type="button" class="form-input-toggle" id="toggle-password" aria-label="Tampilkan password">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                        </button>
                    </div>
                </div>

                <div class="form-group" style="flex-direction:row;align-items:center;gap:0.6rem;">
                    <input type="checkbox" id="remember-me" class="form-checkbox">
                    <label for="remember-me" class="form-label" style="margin:0;font-weight:500;cursor:pointer;">Ingat saya di perangkat ini</label>
                </div>

                <button type="submit" class="btn btn-primary btn-block btn-lg login-submit-btn" id="btn-login">
                    <span id="btn-login-text">Masuk</span>
                    <span id="btn-login-spinner" class="login-spinner" style="display:none;"></span>
                </button>

            </form>

            <div class="login-divider"><span>atau</span></div>

            <p class="login-form__register">
                Belum punya akun? <a href="{{ url('/register') }}" class="login-form__register-link">Daftar Sekarang</a>
            </p>

            <div class="login-demo-hint">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                Demo: <code>admin@porsipas.com</code> → masuk sebagai Admin
            </div>

        </div>
    </div>

</div>

<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
