@extends('layouts.app')

@section('title', 'Edit Produk & Layanan')

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

        <div class="sidebar-caption brand-caption">
            PANEL ADMINISTRATOR
        </div>

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

            <a href="{{ route('admin.produk-layanan.index') }}"
               class="sidebar-link active">
                <i class="bi bi-box-seam"></i>
                <span>Produk &amp; Layanan</span>
            </a>

            <a href="{{ route('admin.artikel.index') }}" class="sidebar-link">
                <i class="bi bi-newspaper"></i>
                <span>Artikel</span>
            </a>

            <a href="{{ route('home') }}#galeri" class="sidebar-link">
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

    {{-- KONTEN UTAMA --}}
    <main class="admin-content">

        <header class="admin-topbar">
            <div>
                <p class="admin-greeting">PENGELOLAAN WEBSITE</p>

                <h1>Edit Produk &amp; Layanan</h1>

                <p class="topbar-description">
                    Perbarui informasi produk atau layanan perusahaan.
                </p>
            </div>

            <a href="{{ route('admin.produk-layanan.index') }}"
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

        {{-- FORM EDIT PRODUK --}}
        <section class="admin-panel mb-4">

            <div class="panel-heading">
                <div>
                    <h3>Informasi Produk &amp; Layanan</h3>
                    <p>
                        Periksa dan perbarui informasi produk di bawah ini.
                    </p>
                </div>

                <span class="panel-heading-icon">
                    <i class="bi bi-pencil-square"></i>
                </span>
            </div>

            <div class="p-4">
                <form action="{{ route('admin.produk-layanan.update', $produkLayanan) }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="nama" class="form-label fw-semibold">
                            Nama Produk atau Layanan
                        </label>

                        <input type="text"
                               name="nama"
                               id="nama"
                               class="form-control"
                               value="{{ old('nama', $produkLayanan->nama) }}"
                               required>
                    </div>

                    <div class="mb-4">
                        <label for="deskripsi" class="form-label fw-semibold">
                            Deskripsi
                        </label>

                        <textarea name="deskripsi"
                                  id="deskripsi"
                                  class="form-control"
                                  rows="5"
                                  required>{{ old('deskripsi', $produkLayanan->deskripsi) }}</textarea>
                    </div>
                    
                    <div class="mb-4">
                        <label class="form-label fw-semibold">
                            Gambar Saat Ini
                        </label>

                        @if ($produkLayanan->gambar)
                            <div class="mb-3">
                                <img src="{{ asset('storage/' . $produkLayanan->gambar) }}"
                                     alt="{{ $produkLayanan->nama }}"
                                     class="img-thumbnail"
                                     style="max-width:220px;max-height:170px;object-fit:cover;border-radius:10px;">
                            </div>
                        @else
                            <p class="text-muted">Belum ada gambar.</p>
                        @endif

                        <label for="gambar" class="form-label fw-semibold">
                            Ganti Gambar (Opsional)
                        </label>

                        <input type="file"
                               name="gambar"
                               id="gambar"
                               class="form-control"
                               accept=".jpg,.jpeg,.png,.webp">

                        <small class="text-muted">
                            Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                            Kosongkan jika tidak ingin mengganti gambar.
                        </small>
                    </div>

                    <div class="mb-4">
                        <label for="status" class="form-label fw-semibold">
                            Status
                        </label>

                        <select name="status"
                                id="status"
                                class="form-select"
                                required>

                            <option value="1"
                                {{ (string) old('status', (int) $produkLayanan->status) === '1' ? 'selected' : '' }}>
                                Aktif
                            </option>

                            <option value="0"
                                {{ (string) old('status', (int) $produkLayanan->status) === '0' ? 'selected' : '' }}>
                                Tidak Aktif
                            </option>

                        </select>
                    </div>

                    <div class="d-flex flex-wrap gap-2">
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-save me-1"></i>
                            Simpan Perubahan
                        </button>

                        <a href="{{ route('admin.produk-layanan.index') }}"
                           class="btn btn-light border">
                            Batal
                        </a>
                    </div>

                </form>
            </div>

        </section>

        {{-- FOOTER --}}
        <footer class="admin-footer">
            <span>© {{ date('Y') }} PT Solusi Koneksi Anda</span>
            <span>Dashboard Administrator</span>
        </footer>

    </main>
</div>
@endsection
