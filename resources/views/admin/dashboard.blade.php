@extends('layouts.admin')

@section('page-title', 'Dashboard')

@section('content')

<div class="admin-page-header">
    <div>
        <h1 class="admin-page-title">Dashboard</h1>
        <p class="admin-page-sub">Ringkasan performa PorsiPas hari ini.</p>
    </div>
    <div class="admin-page-header__meta">
        <span class="admin-date-chip">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
            Senin, 12 Mei 2026
        </span>
    </div>
</div>

{{-- ===== STATISTIK CARDS ===== --}}
<div class="stat-cards">

    {{-- Card 1: Total Pendapatan --}}
    <div class="stat-card">
        <div class="stat-card__icon-wrap stat-card__icon-wrap--orange">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
        </div>
        <div class="stat-card__info">
            <span class="stat-card__label">Total Pendapatan</span>
            <span class="stat-card__value">Rp 2.450.000</span>
            <span class="stat-card__trend stat-card__trend--up">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="18 15 12 9 6 15"/></svg>
                +12.5% dari kemarin
            </span>
        </div>
    </div>

    {{-- Card 2: Pesanan Aktif --}}
    <div class="stat-card">
        <div class="stat-card__icon-wrap stat-card__icon-wrap--blue">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
        </div>
        <div class="stat-card__info">
            <span class="stat-card__label">Pesanan Aktif</span>
            <span class="stat-card__value">12</span>
            <span class="stat-card__trend stat-card__trend--up">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="18 15 12 9 6 15"/></svg>
                +3 pesanan baru
            </span>
        </div>
    </div>

    {{-- Card 3: Total Pengguna --}}
    <div class="stat-card">
        <div class="stat-card__icon-wrap stat-card__icon-wrap--green">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
        </div>
        <div class="stat-card__info">
            <span class="stat-card__label">Total Pengguna</span>
            <span class="stat-card__value">140</span>
            <span class="stat-card__trend stat-card__trend--up">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="18 15 12 9 6 15"/></svg>
                +8 pengguna baru
            </span>
        </div>
    </div>

    {{-- Card 4: Menu Terlaris --}}
    <div class="stat-card">
        <div class="stat-card__icon-wrap stat-card__icon-wrap--purple">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
        </div>
        <div class="stat-card__info">
            <span class="stat-card__label">Menu Terlaris</span>
            <span class="stat-card__value" style="font-size:1.1rem;">Ayam Teriyaki</span>
            <span class="stat-card__trend stat-card__trend--neutral">48 porsi terjual</span>
        </div>
    </div>

</div>{{-- End .stat-cards --}}

{{-- ===== TABEL PESANAN TERBARU ===== --}}
<div class="admin-table-section">
    <div class="admin-table-header">
        <div>
            <h2 class="admin-table-title">Pesanan Terbaru</h2>
            <p class="admin-table-sub">5 pesanan terakhir yang masuk hari ini.</p>
        </div>
        <a href="{{ url('/admin/transaksi') }}" class="btn btn-outline admin-table-see-all">
            Lihat Semua
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
        </a>
    </div>

    <div class="admin-table-wrap">
        <table class="admin-table" id="orders-table">
            <thead>
                <tr>
                    <th>ID Pesanan</th>
                    <th>Pelanggan</th>
                    <th>Menu Utama</th>
                    <th>Total</th>
                    <th>Waktu</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><span class="admin-table-invoice">INV/20260512/001</span></td>
                    <td>
                        <div class="admin-table-user">
                            <div class="admin-table-user__avatar" style="background:#FFF7ED;color:#C2410C;">R</div>
                            Rizky Aditya
                        </div>
                    </td>
                    <td>Paket Ayam Teriyaki <span class="admin-table-qty">×2</span></td>
                    <td><strong>Rp 48.000</strong></td>
                    <td class="admin-table-time">08.42 WIB</td>
                    <td><span class="status-badge status-badge--success">✓ Selesai</span></td>
                    <td>
                        <button class="admin-action-btn" title="Detail">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td><span class="admin-table-invoice">INV/20260512/002</span></td>
                    <td>
                        <div class="admin-table-user">
                            <div class="admin-table-user__avatar" style="background:#EFF6FF;color:#1D4ED8;">S</div>
                            Siti Nurhaliza
                        </div>
                    </td>
                    <td>Rendang Daging Porsi Pas <span class="admin-table-qty">×1</span></td>
                    <td><strong>Rp 64.000</strong></td>
                    <td class="admin-table-time">10.15 WIB</td>
                    <td><span class="status-badge status-badge--info">→ Dikirim</span></td>
                    <td>
                        <button class="admin-action-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td><span class="admin-table-invoice">INV/20260512/003</span></td>
                    <td>
                        <div class="admin-table-user">
                            <div class="admin-table-user__avatar" style="background:#FFF7ED;color:#C2410C;">B</div>
                            Budi Santoso
                        </div>
                    </td>
                    <td>Ayam Geprek Sambal Matah <span class="admin-table-qty">×1</span></td>
                    <td><strong>Rp 46.000</strong></td>
                    <td class="admin-table-time">11.03 WIB</td>
                    <td><span class="status-badge status-badge--warning">⏱ Diproses</span></td>
                    <td>
                        <button class="admin-action-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td><span class="admin-table-invoice">INV/20260512/004</span></td>
                    <td>
                        <div class="admin-table-user">
                            <div class="admin-table-user__avatar" style="background:#DCFCE7;color:#16A34A;">D</div>
                            Dian Pratiwi
                        </div>
                    </td>
                    <td>Sop Iga Sapi Porsi Pas <span class="admin-table-qty">×2</span></td>
                    <td><strong>Rp 50.000</strong></td>
                    <td class="admin-table-time">11.28 WIB</td>
                    <td><span class="status-badge status-badge--warning">⏱ Diproses</span></td>
                    <td>
                        <button class="admin-action-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td><span class="admin-table-invoice">INV/20260512/005</span></td>
                    <td>
                        <div class="admin-table-user">
                            <div class="admin-table-user__avatar" style="background:#F3E8FF;color:#7C3AED;">A</div>
                            Aldi Firmansyah
                        </div>
                    </td>
                    <td>Nasi Goreng Gila Spesial <span class="admin-table-qty">×3</span></td>
                    <td><strong>Rp 45.000</strong></td>
                    <td class="admin-table-time">11.47 WIB</td>
                    <td><span class="status-badge status-badge--success">✓ Selesai</span></td>
                    <td>
                        <button class="admin-action-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
