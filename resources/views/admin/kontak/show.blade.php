@extends('layouts.app')

@section('title', 'Detail Pesan | Admin')

@section('content')
<div class="admin-page">

    {{-- SIDEBAR --}}
    <aside class="admin-sidebar">
        <a href="{{ route('admin.dashboard') }}" class="admin-brand">
            <span class="brand-icon">
                <i class="bi bi-buildings"></i>
            </span>
            <span>SKA <b>Admin</b></span>
        </a>

        <p class="sidebar-caption">PANEL ADMINISTRATOR</p>

        <div class="sidebar-menu-label">MENU UTAMA</div>

        <a href="{{ route('admin.dashboard') }}" class="sidebar-link">
            <i class="bi bi-grid-1x2-fill"></i>
            <span>Dashboard</span>
        </a>

        <a href="{{ route('home') }}" class="sidebar-link">
            <i class="bi bi-globe2"></i>
            <span>Lihat Website</span>
            <i class="bi bi-arrow-up-right ms-auto"></i>
        </a>

        <div class="sidebar-divider"></div>

        <div class="sidebar-menu-label">INFORMASI WEBSITE</div>

        <a href="{{ route('admin.profil.edit') }}" class="sidebar-link">
            <i class="bi bi-building"></i>
            <span>Profil Perusahaan</span>
        </a>

        <a href="{{ route('admin.produk-layanan.index') }}" class="sidebar-link">
            <i class="bi bi-box-seam"></i>
            <span>Produk &amp; Layanan</span>
        </a>

        <a href="{{ route('admin.artikel.index') }}" class="sidebar-link">
            <i class="bi bi-newspaper"></i>
            <span>Artikel</span>
        </a>

        <a href="{{ route('admin.galeri.index') }}" class="sidebar-link">
            <i class="bi bi-images"></i>
            <span>Galeri</span>
        </a>

        <a href="{{ route('admin.kontak.index') }}"
           class="sidebar-link active">
            <i class="bi bi-envelope"></i>
            <span>Kontak</span>
        </a>

        {{-- Tambahkan bagian informasi akun dan logout
             dari sidebar halaman admin kamu yang sekarang --}}
    </aside>

    {{-- KONTEN DETAIL PESAN --}}
    <main class="admin-content">

        <header class="admin-topbar">
            <div>
                <h5 class="mb-1">Detail Pesan</h5>
                <small class="text-muted">
                    Informasi lengkap pesan dari pengunjung website
                </small>
            </div>
        </header>

        <section class="admin-panel">

            <div class="panel-heading d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-1">Informasi Pesan</h5>
                    <p class="text-muted mb-0">
                        Detail pesan yang dikirim melalui formulir kontak.
                    </p>
                </div>

                <a href="{{ route('admin.kontak.index') }}"
                   class="btn btn-outline-primary btn-sm">
                    <i class="bi bi-arrow-left"></i>
                    Kembali
                </a>
            </div>

            <div class="p-4">
                <div class="mb-4">
                    <label class="form-label fw-semibold">Nama Pengirim</label>
                    <div class="form-control bg-light">
                        {{ $pesanKontak->nama }}
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Email</label>
                    <div class="form-control bg-light">
                        {{ $pesanKontak->email }}
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Subjek</label>
                    <div class="form-control bg-light">
                        {{ $pesanKontak->subjek ?? '-' }}
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Isi Pesan</label>
                    <div class="form-control bg-light"
                         style="min-height: 150px; height: auto; white-space: pre-wrap;">{{ $pesanKontak->pesan }}</div>
                </div>

                <a href="{{ route('admin.kontak.index') }}"
                   class="btn btn-primary">
                    <i class="bi bi-arrow-left"></i>
                    Kembali ke Daftar Pesan
                </a>
            </div>

        </section>

        <footer class="admin-footer">
            &copy; {{ date('Y') }} SKA Admin Panel
        </footer>

    </main>
</div>
@endsection
