@extends('layouts.app')

@section('title', 'Tambah Galeri')

@section('content')
<div class="admin-page">
    <aside class="admin-sidebar">
        <div class="admin-brand">
            <div class="brand-icon"><i class="bi bi-buildings"></i></div>
            <div class="brand-text">
                <h3><span class="brand-ska">SKA</span> <span class="brand-admin">Admin</span></h3>
            </div>
        </div>
        <div class="sidebar-caption brand-caption">PANEL ADMINISTRATOR</div>
        <div class="sidebar-caption">MENU UTAMA</div>
        <nav class="sidebar-menu">
            <a href="{{ route('admin.dashboard') }}" class="sidebar-link"><i class="bi bi-grid-fill"></i><span>Dashboard</span></a>
            <a href="{{ route('home') }}" target="_blank" class="sidebar-link"><i class="bi bi-globe"></i><span>Lihat Website</span><i class="bi bi-arrow-up-right ms-auto"></i></a>
        </nav>
        <div class="sidebar-caption mt-4">INFORMASI WEBSITE</div>
        <nav class="sidebar-menu">
            <a href="{{ route('admin.profil.edit') }}" class="sidebar-link"><i class="bi bi-building"></i><span>Profil Perusahaan</span></a>
            <a href="{{ route('admin.produk-layanan.index') }}" class="sidebar-link"><i class="bi bi-box-seam"></i><span>Produk &amp; Layanan</span></a>
            <a href="{{ route('admin.artikel.index') }}" class="sidebar-link"><i class="bi bi-newspaper"></i><span>Artikel</span></a>
            <a href="{{ route('admin.galeri.index') }}" class="sidebar-link active"><i class="bi bi-images"></i><span>Galeri</span></a>
            <a href="{{ route('home') }}#kontak" class="sidebar-link"><i class="bi bi-envelope"></i><span>Kontak</span></a>
        </nav>
        <div class="sidebar-bottom">
            <div class="sidebar-user">
                <div class="user-avatar"><i class="bi bi-person-fill"></i></div>
                <div><strong>Administrator</strong><small>Pengelola Website</small></div>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="sidebar-logout"><i class="bi bi-box-arrow-left"></i> Logout</button>
            </form>
        </div>
    </aside>

    <main class="admin-content">
        <header class="admin-topbar">
            <div>
                <p class="admin-greeting">PENGELOLAAN WEBSITE</p>
                <h1>Tambah Galeri</h1>
                <p class="topbar-description">Tambahkan foto dokumentasi perusahaan.</p>
            </div>
            <a href="{{ route('admin.galeri.index') }}" class="admin-profile-preview">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </header>

        @if($errors->any())
            <div class="alert alert-danger">
                <strong>Periksa kembali data berikut:</strong>
                <ul class="mb-0 mt-2">
                    @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                </ul>
            </div>
        @endif

        <section class="admin-panel mb-4">
            <div class="panel-heading">
                <div><h3>Informasi Galeri</h3><p>Lengkapi judul, deskripsi, dan gambar.</p></div>
                <span class="panel-heading-icon"><i class="bi bi-images"></i></span>
            </div>
            <div class="p-4">
                <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="judul" class="form-label fw-semibold">Judul</label>
                        <input type="text" name="judul" id="judul" class="form-control"
                               value="{{ old('judul') }}" placeholder="Masukkan judul galeri" required>
                    </div>
                    <div class="mb-4">
                        <label for="deskripsi" class="form-label fw-semibold">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4"
                                  placeholder="Tuliskan deskripsi singkat">{{ old('deskripsi') }}</textarea>
                    </div>
                    <div class="mb-4">
                        <label for="gambar" class="form-label fw-semibold">Gambar</label>
                        <input type="file" name="gambar" id="gambar" class="form-control"
                               accept=".jpg,.jpeg,.png,.webp" required>
                        <small class="text-muted">Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.</small>
                    </div>
                    <div class="d-flex flex-wrap gap-2">
                        <button type="submit" class="btn btn-primary px-4"><i class="bi bi-save me-1"></i> Simpan Galeri</button>
                        <a href="{{ route('admin.galeri.index') }}" class="btn btn-light border">Batal</a>
                    </div>
                </form>
            </div>
        </section>

        <footer class="admin-footer">
            <span>© {{ date('Y') }} PT Solusi Koneksi Anda</span>
            <span>Dashboard Administrator</span>
        </footer>
    </main>
</div>
@endsection
