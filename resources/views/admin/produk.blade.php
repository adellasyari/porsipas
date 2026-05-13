@extends('layouts.admin')

@section('content')
<div class="admin-header">
    <div class="admin-header__info">
        <h1 class="admin-header__title">Kelola Produk Meal-Kit</h1>
        <p class="admin-header__sub">Manajemen katalog menu, harga, dan ketersediaan stok.</p>
    </div>
    <div class="admin-header__actions">
        <button class="btn btn-primary btn-sm" id="btn-add-product">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 0.4rem;"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
            Tambah Produk
        </button>
    </div>
</div>

<div class="admin-toolbar">
    <div class="admin-filters">
        <div class="search-bar">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="search-icon"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
            <input type="text" class="form-input form-input--search" id="search-product" placeholder="Cari nama menu...">
        </div>
        <div class="filter-bar">
            <select class="form-input form-select" id="filter-product-category">
                <option value="semua">Semua Kategori</option>
                <option value="Ayam">Ayam</option>
                <option value="Daging">Daging</option>
                <option value="Sayur/Vegan">Sayur/Vegan</option>
                <option value="Pedas">Pedas</option>
            </select>
        </div>
    </div>
</div>

<div class="admin-card">
    <div class="table-responsive">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Info Menu</th>
                    <th>Kategori</th>
                    <th>Harga (Rp)</th>
                    <th>Status</th>
                    <th style="text-align: right;">Aksi</th>
                </tr>
            </thead>
            <tbody id="product-table-body">
                <!-- Di-render oleh Javascript -->
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Form Produk -->
<div class="modal-overlay" id="modal-product">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title" id="modal-product-title">Tambah Produk Baru</h2>
            <button type="button" class="btn-close-modal" id="btn-close-product-x">&times;</button>
        </div>
        <div class="modal-body">
            <form id="form-product">
                <input type="hidden" id="prod-id">
                
                <div class="form-group">
                    <label class="form-label" for="prod-name">Nama Menu</label>
                    <input type="text" id="prod-name" class="form-input" placeholder="Misal: Ayam Teriyaki" required>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label" for="prod-category">Kategori</label>
                        <select id="prod-category" class="form-input form-select" required>
                            <option value="">Pilih Kategori</option>
                            <option value="Ayam">Ayam</option>
                            <option value="Daging">Daging</option>
                            <option value="Sayur/Vegan">Sayur/Vegan</option>
                            <option value="Pedas">Pedas</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="prod-price">Harga (Rp)</label>
                        <input type="number" id="prod-price" class="form-input" placeholder="Misal: 15000" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label" for="prod-status">Status</label>
                        <select id="prod-status" class="form-input form-select" required>
                            <option value="Tersedia">Tersedia</option>
                            <option value="Habis">Habis</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="prod-thumb">URL Foto (Dummy)</label>
                        <input type="text" id="prod-thumb" class="form-input" placeholder="https://images.unsplash.com/..." required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label" for="prod-desc">Deskripsi Singkat</label>
                    <textarea id="prod-desc" class="form-input" rows="3" placeholder="Jelaskan menu ini..." required></textarea>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline" id="btn-cancel-product">Batal</button>
            <button type="submit" class="btn btn-primary btn-save" form="form-product" id="btn-save-product">Simpan Produk</button>
        </div>
    </div>
</div>
@endsection
