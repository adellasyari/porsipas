@extends('layouts.admin')

@section('content')
<div class="admin-header">
    <div class="admin-header__info">
        <h1 class="admin-header__title">Kelola Pengguna</h1>
        <p class="admin-header__sub">Manajemen data customer, admin, dan hak akses sistem.</p>
    </div>
    <div class="admin-header__actions">
        <button class="btn btn-primary btn-sm" id="btn-add-user">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 0.4rem;"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="8.5" cy="7" r="4"/><line x1="20" y1="8" x2="20" y2="14"/><line x1="23" y1="11" x2="17" y2="11"/></svg>
            Tambah User
        </button>
    </div>
</div>

<div class="admin-toolbar">
    <div class="admin-filters">
        <div class="search-bar">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="search-icon"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
            <input type="text" class="form-input form-input--search" id="search-user" placeholder="Cari nama atau email...">
        </div>
        <div class="filter-bar">
            <select class="form-input form-select" id="filter-user-role">
                <option value="semua">Semua Role</option>
                <option value="Student">Student</option>
                <option value="Admin">Admin</option>
            </select>
        </div>
    </div>
</div>

<div class="admin-card">
    <div class="table-responsive">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Info Pengguna</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th style="text-align: right;">Aksi</th>
                </tr>
            </thead>
            <tbody id="user-table-body">
                <!-- Dirender Javascript -->
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Form Pengguna -->
<div class="modal-overlay" id="modal-user">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title" id="modal-user-title">Tambah User Baru</h2>
            <button type="button" class="btn-close-modal" id="btn-close-user-x">&times;</button>
        </div>
        <div class="modal-body">
            <form id="form-user">
                <input type="hidden" id="user-id">
                
                <div class="form-group">
                    <label class="form-label" for="user-name">Nama Lengkap</label>
                    <input type="text" id="user-name" class="form-input" placeholder="Masukkan nama lengkap..." required>
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="user-email">Email</label>
                    <input type="email" id="user-email" class="form-input" placeholder="contoh@email.com" required>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label" for="user-role">Role</label>
                        <select id="user-role" class="form-input form-select" required>
                            <option value="Student">Student</option>
                            <option value="Admin">Admin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="user-status">Status</label>
                        <select id="user-status" class="form-input form-select" required>
                            <option value="Aktif">Aktif</option>
                            <option value="Banned">Banned</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline" id="btn-cancel-user">Batal</button>
            <button type="submit" class="btn btn-primary btn-save" form="form-user" id="btn-save-user">Simpan User</button>
        </div>
    </div>
</div>
@endsection
