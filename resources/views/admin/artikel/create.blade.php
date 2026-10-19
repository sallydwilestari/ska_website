@extends('layouts.app')

@section('title', 'Tambah Artikel')

@section('content')
<div class="admin-page">

    {{-- SIDEBAR --}}
    <aside class="admin-sidebar">
        <div class="admin-brand">
            <div class="brand-icon">
                <i class="bi bi-buildings"></i>
            </div>
            <div class="brand-text">
                <h3>
                    <span class="brand-ska">SKA</span>
                    <span class="brand-admin">Admin</span>
                </h3>
            </div>
        </div>

        <div class="sidebar-caption brand-caption">PANEL ADMINISTRATOR</div>
        <div class="sidebar-caption">MENU UTAMA</div>

        <nav class="sidebar-menu">
            <a href="{{ route('admin.dashboard') }}" class="sidebar-link">
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('home') }}" target="_blank" class="sidebar-link">
                <i class="bi bi-globe"></i>
                <span>Lihat Website</span>
                <i class="bi bi-arrow-up-right ms-auto"></i>
            </a>
        </nav>

        <div class="sidebar-caption mt-4">INFORMASI WEBSITE</div>

        <nav class="sidebar-menu">
            <a href="{{ route('admin.profil.edit') }}" class="sidebar-link">
                <i class="bi bi-building"></i>
                <span>Profil Perusahaan</span>
            </a>

            <a href="{{ route('admin.produk-layanan.index') }}" class="sidebar-link">
                <i class="bi bi-box-seam"></i>
                <span>Produk &amp; Layanan</span>
            </a>

            <a href="{{ route('admin.artikel.index') }}" class="sidebar-link active">
                <i class="bi bi-newspaper"></i>
                <span>Artikel</span>
            </a>

            <a href="{{ route('admin.galeri.index') }}" class="sidebar-link">
                <i class="bi bi-images"></i>
                <span>Galeri</span>
            </a>

            <a href="{{ route('home') }}#kontak" class="sidebar-link">
                <i class="bi bi-envelope"></i>
                <span>Kontak</span>
            </a>
        </nav>

        <div class="sidebar-bottom">
            <div class="sidebar-user">
                <div class="user-avatar">
                    <i class="bi bi-person-fill"></i>
                </div>
                <div>
                    <strong>Administrator</strong>
                    <small>Pengelola Website</small>
                </div>
            </div>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="sidebar-logout">
                    <i class="bi bi-box-arrow-left"></i>
                    Logout
                </button>
            </form>
        </div>
    </aside>

    {{-- KONTEN --}}
    <main class="admin-content">
        <header class="admin-topbar">
            <div>
                <p class="admin-greeting">PENGELOLAAN WEBSITE</p>
                <h1>Tambah Artikel</h1>
                <p class="topbar-description">
                    Tambahkan artikel atau berita baru untuk website.
                </p>
            </div>

            <a href="{{ route('admin.artikel.index') }}"
               class="admin-profile-preview">
                <i class="bi bi-arrow-left"></i>
                Kembali
            </a>
        </header>

        {{-- PESAN VALIDASI --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Periksa kembali data berikut:</strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <section class="admin-panel mb-4">
            <div class="panel-heading">
                <div>
                    <h3>Informasi Artikel</h3>
                    <p>Lengkapi informasi artikel yang akan diterbitkan.</p>
                </div>

                <span class="panel-heading-icon">
                    <i class="bi bi-newspaper"></i>
                </span>
            </div>

            <div class="p-4">
                <form action="{{ route('admin.artikel.store') }}"
                      method="POST"
                      enctype="multipart/form-data">
                    @csrf

                    {{-- JUDUL --}}
                    <div class="mb-4">
                        <label for="judul" class="form-label fw-semibold">
                            Judul Artikel
                        </label>

                        <input type="text"
                               name="judul"
                               id="judul"
                               class="form-control"
                               value="{{ old('judul') }}"
                               placeholder="Masukkan judul artikel"
                               required>
                    </div>

                    {{-- ISI ARTIKEL --}}
                    <div class="mb-4">
                        <label for="isi" class="form-label fw-semibold">
                            Deskripsi Artikel
                        </label>

                        <textarea name="isi"
                                  id="isi"
                                  class="form-control"
                                  rows="8"
                                  placeholder="Tuliskan isi lengkap artikel"
                                  required>{{ old('isi') }}</textarea>
                    </div>

                    {{-- GAMBAR --}}
                    <div class="mb-4">
                        <label for="gambar" class="form-label fw-semibold">
                            Gambar Artikel
                        </label>

                        <input type="file"
                               name="gambar"
                               id="gambar"
                               class="form-control"
                               accept=".jpg,.jpeg,.png,.webp">

                        <small class="text-muted">
                            Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                        </small>
                    </div>

                    {{-- STATUS --}}
                    <div class="mb-4">
                        <label for="status" class="form-label fw-semibold">
                            Status
                        </label>

                        <select name="status" id="status" class="form-select" required>
                            <option value="1"
                                {{ old('status', '1') == '1' ? 'selected' : '' }}>
                                Aktif
                            </option>

                            <option value="0"
                                {{ old('status') === '0' ? 'selected' : '' }}>
                                Tidak Aktif
                            </option>
                        </select>
                    </div>

                    {{-- TOMBOL --}}
                    <div class="d-flex flex-wrap gap-2">
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-save me-1"></i>
                            Simpan Artikel
                        </button>

                        <a href="{{ route('admin.artikel.index') }}"
                           class="btn btn-light border">
                            Batal
                        </a>
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
