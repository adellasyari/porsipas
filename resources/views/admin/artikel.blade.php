@extends('layouts.admin')

@section('content')
<div class="admin-header">
    <div class="admin-header__info">
        <h1 class="admin-header__title">Kelola Artikel</h1>
        <p class="admin-header__sub">Manajemen tips, resep, dan konten blog PorsiPas.</p>
    </div>
    <div class="admin-header__actions">
        <button class="btn btn-primary btn-sm" id="btn-add-article">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 0.4rem;"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
            Tambah Artikel
        </button>
    </div>
</div>

<div class="admin-toolbar">
    <div class="admin-filters">
        <div class="search-bar">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="search-icon"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
            <input type="text" class="form-input form-input--search" id="search-article" placeholder="Cari judul artikel...">
        </div>
        <div class="filter-bar">
            <select class="form-input form-select" id="filter-category">
                <option value="semua">Semua Kategori</option>
                <option value="Resep Kilat">Resep Kilat</option>
                <option value="Lifehack">Lifehack</option>
                <option value="Tips Hemat">Tips Hemat</option>
            </select>
        </div>
    </div>
</div>

<div class="admin-card">
    <div class="table-responsive">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Info Artikel</th>
                    <th>Kategori</th>
                    <th>Tanggal Publish</th>
                    <th>Status</th>
                    <th style="text-align: right;">Aksi</th>
                </tr>
            </thead>
            <tbody id="article-table-body">
                <!-- Data akan dirender secara dinamis oleh JavaScript -->
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Form Artikel -->
<div class="modal-overlay" id="modal-article">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title" id="modal-article-title">Tambah Artikel Baru</h2>
            <button type="button" class="btn-close-modal" id="btn-close-modal-x">&times;</button>
        </div>
        <div class="modal-body">
            <form id="form-article">
                <input type="hidden" id="art-id">
                
                <div class="form-group">
                    <label class="form-label" for="art-title">Judul Artikel</label>
                    <input type="text" id="art-title" class="form-input" placeholder="Masukkan judul..." required>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label" for="art-category">Kategori</label>
                        <select id="art-category" class="form-input form-select" required>
                            <option value="">Pilih Kategori</option>
                            <option value="Resep Kilat">Resep Kilat</option>
                            <option value="Lifehack">Lifehack</option>
                            <option value="Tips Hemat">Tips Hemat</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="art-status">Status</label>
                        <select id="art-status" class="form-input form-select">
                            <option value="Published">Published</option>
                            <option value="Draft">Draft</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label" for="art-thumb">URL Thumbnail (Opsional untuk Dummy)</label>
                    <input type="text" id="art-thumb" class="form-input" placeholder="https://images.unsplash.com/...">
                </div>

                <div class="form-group">
                    <label class="form-label" for="art-content">Isi Artikel</label>
                    <textarea id="art-content" class="form-input" rows="6" placeholder="Ketik isi artikel di sini..." required></textarea>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline" id="btn-cancel-article">Batal</button>
            <button type="submit" class="btn btn-primary btn-save" form="form-article" id="btn-save-article">Simpan Artikel</button>
        </div>
    </div>
</div>
@endsection
