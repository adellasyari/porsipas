<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Admin Panel PorsiPas — Kelola produk, transaksi, dan pengguna.">
    <title>Admin Panel — PorsiPas</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="admin-body">

<div class="admin-wrapper">

    {{-- ==================== SIDEBAR ==================== --}}
    <aside class="admin-sidebar" id="admin-sidebar">

        {{-- Logo --}}
        <div class="sidebar-logo">
            <span class="sidebar-logo__icon">🍱</span>
            <span class="sidebar-logo__text">Porsi<span class="sidebar-logo__accent">Pas</span></span>
        </div>

        {{-- Divider --}}
        <div class="sidebar-divider"></div>

        {{-- Navigation --}}
        <nav class="sidebar-nav" aria-label="Menu Admin">
            <p class="sidebar-nav__group-label">Menu Utama</p>

            <a href="{{ url('/admin/dashboard') }}"
               class="sidebar-nav__item {{ request()->is('admin/dashboard') ? 'sidebar-nav__item--active' : '' }}"
               aria-current="{{ request()->is('admin/dashboard') ? 'page' : 'false' }}">
                <span class="sidebar-nav__icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
                </span>
                Dashboard
            </a>

            <a href="{{ url('/admin/produk') }}"
               class="sidebar-nav__item {{ request()->is('admin/produk*') ? 'sidebar-nav__item--active' : '' }}">
                <span class="sidebar-nav__icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
                </span>
                Kelola Produk
            </a>

            <a href="{{ url('/admin/transaksi') }}"
               class="sidebar-nav__item {{ request()->is('admin/transaksi*') ? 'sidebar-nav__item--active' : '' }}">
                <span class="sidebar-nav__icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg>
                </span>
                Kelola Transaksi
                <span class="sidebar-nav__badge">5</span>
            </a>

            <a href="{{ url('/admin/artikel') }}"
               class="sidebar-nav__item {{ request()->is('admin/artikel*') ? 'sidebar-nav__item--active' : '' }}">
                <span class="sidebar-nav__icon">
                    <!-- Ikon dokumen/artikel dari Feather Icons -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                </span>
                Kelola Artikel
            </a>

            <a href="{{ url('/admin/pengguna') }}"
               class="sidebar-nav__item {{ request()->is('admin/pengguna*') ? 'sidebar-nav__item--active' : '' }}">
                <span class="sidebar-nav__icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                </span>
                Kelola Pengguna
            </a>

            <p class="sidebar-nav__group-label" style="margin-top:1.5rem;">Sistem</p>

            <a href="{{ url('/admin/pengaturan') }}"
               class="sidebar-nav__item {{ request()->is('admin/pengaturan*') ? 'sidebar-nav__item--active' : '' }}">
                <span class="sidebar-nav__icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
                </span>
                Pengaturan
            </a>

            <a href="{{ url('/login') }}" class="sidebar-nav__item sidebar-nav__item--logout">
                <span class="sidebar-nav__icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                </span>
                Keluar
            </a>
        </nav>

        {{-- Version Footer --}}
        <div class="sidebar-footer">
            <span>PorsiPas Admin</span>
            <span>v1.0.0</span>
        </div>

    </aside>{{-- End .admin-sidebar --}}

    {{-- ==================== MAIN AREA ==================== --}}
    <div class="admin-main">

        {{-- Topbar --}}
        <header class="admin-topbar">
            <div class="admin-topbar__left">
                {{-- Hamburger (mobile) --}}
                <button class="topbar-hamburger" id="sidebar-toggle" aria-label="Toggle sidebar">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
                </button>
                <div class="topbar-breadcrumb">
                    <span class="topbar-breadcrumb__root">Admin</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
                    <span class="topbar-breadcrumb__current">@yield('page-title', 'Dashboard')</span>
                </div>
            </div>
            <div class="admin-topbar__right">
                {{-- Notifikasi --}}
                <button class="topbar-icon-btn" aria-label="Notifikasi" id="notif-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
                    <span class="topbar-icon-btn__dot"></span>
                </button>
                {{-- Profil --}}
                <div class="topbar-profile">
                    <div class="topbar-profile__avatar">A</div>
                    <div class="topbar-profile__info">
                        <span class="topbar-profile__greeting">Halo,</span>
                        <span class="topbar-profile__name">Admin</span>
                    </div>
                </div>
            </div>
        </header>{{-- End .admin-topbar --}}

        {{-- Page Content --}}
        <main class="admin-content" id="admin-content">
            @yield('content')
        </main>

    </div>{{-- End .admin-main --}}

</div>{{-- End .admin-wrapper --}}

<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
