@extends('layouts.admin')

@section('content')
<div class="admin-header">
    <div class="admin-header__info">
        <h1 class="admin-header__title">Kelola Transaksi</h1>
        <p class="admin-header__sub">Pantau dan update status pesanan masuk.</p>
    </div>
</div>

<div class="admin-toolbar">
    <div class="admin-filters">
        <div class="search-bar">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="search-icon"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
            <input type="text" class="form-input form-input--search" id="search-trx" placeholder="Cari No. Invoice atau Nama...">
        </div>
        <div class="filter-bar">
            <select class="form-input form-select" id="filter-trx-status">
                <option value="semua">Semua Status</option>
                <option value="Diproses">Diproses</option>
                <option value="Dikirim">Dikirim</option>
                <option value="Selesai">Selesai</option>
            </select>
        </div>
    </div>
</div>

<div class="admin-card">
    <div class="table-responsive">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>No. Invoice</th>
                    <th>Pelanggan</th>
                    <th>Waktu Pesan</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                    <th style="text-align: right;">Aksi</th>
                </tr>
            </thead>
            <tbody id="trx-table-body">
                <!-- Data akan dirender oleh Javascript -->
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Detail & Update Transaksi -->
<div class="modal-overlay" id="modal-trx">
    <div class="modal-content modal-content--wide">
        <div class="modal-header">
            <h2 class="modal-title" id="modal-trx-title">Detail Transaksi</h2>
            <button type="button" class="btn-close-modal" id="btn-close-trx-x">&times;</button>
        </div>
        <div class="modal-body modal-body--split">
            
            <!-- Sisi Kiri: Informasi Pesanan -->
            <div class="modal-split-left">
                <div class="trx-info-group">
                    <span class="trx-info-label">No. Invoice</span>
                    <strong class="trx-info-value" id="detail-inv"></strong>
                </div>
                <div class="trx-info-group">
                    <span class="trx-info-label">Nama Pelanggan</span>
                    <span class="trx-info-value" id="detail-name"></span>
                </div>
                <div class="trx-info-group">
                    <span class="trx-info-label">Alamat Pengiriman</span>
                    <span class="trx-info-value" id="detail-address"></span>
                </div>
                <div class="trx-info-group">
                    <span class="trx-info-label">Daftar Item Pesanan</span>
                    <ul class="trx-item-list" id="detail-items">
                        <!-- Render item dari JS -->
                    </ul>
                </div>
            </div>
            
            <!-- Sisi Kanan: Aksi Update Status -->
            <div class="modal-split-right">
                <form id="form-trx">
                    <input type="hidden" id="trx-id">
                    <div class="form-group">
                        <label class="form-label" style="font-weight: 600; color: var(--text-primary); margin-bottom: 0.8rem; display: block;">Update Status Pesanan</label>
                        <select id="trx-status-update" class="form-input form-select" required>
                            <option value="Diproses">Diproses</option>
                            <option value="Dikirim">Dikirim</option>
                            <option value="Selesai">Selesai</option>
                        </select>
                    </div>
                </form>
            </div>
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline" id="btn-cancel-trx">Tutup</button>
            <button type="submit" class="btn btn-primary btn-save" form="form-trx" id="btn-save-trx">Simpan Perubahan</button>
        </div>
    </div>
</div>
@endsection
