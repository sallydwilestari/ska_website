@extends('layouts.app')

@section('title', 'Edit Profil Perusahaan')

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
            <a href="{{ route('admin.profil.edit') }}" class="sidebar-link active">
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

        {{-- HEADER --}}
        <header class="admin-topbar">
            <div>
                <p class="admin-greeting">PENGELOLAAN WEBSITE</p>
                <h1>Edit Profil Perusahaan</h1>
                <p class="topbar-description">
                    Perbarui informasi dan identitas perusahaan NEXORA.
                </p>
            </div>

            <a href="{{ route('admin.dashboard') }}"
               class="admin-profile-preview"
               style="text-decoration: none;">
                <i class="bi bi-arrow-left"></i>
                Kembali
            </a>
        </header>

        {{-- NOTIFIKASI --}}
        @if(session('success'))
            <div class="alert alert-success">
                <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <strong>Periksa kembali data berikut:</strong>
                <ul class="mb-0 mt-2">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- FORM PROFIL --}}
        <form action="{{ route('admin.profil.update') }}"
              method="POST"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- INFORMASI PERUSAHAAN --}}
            <section class="admin-panel mb-4">
                <div class="panel-heading">
                    <div>
                        <h3>Informasi Perusahaan</h3>
                        <p>Periksa dan perbarui informasi perusahaan di bawah ini.</p>
                    </div>
                    <span class="panel-heading-icon">
                        <i class="bi bi-pencil-square"></i>
                    </span>
                </div>

                <div class="p-4">
                    <div class="mb-4">
                        <label for="nama_perusahaan" class="form-label">
                            Nama Perusahaan
                        </label>
                        <input type="text"
                               class="form-control"
                               id="nama_perusahaan"
                               name="nama_perusahaan"
                               value="{{ old('nama_perusahaan', $profil->nama_perusahaan) }}"
                               required>
                    </div>

                    <div class="mb-4">
                        <label for="deskripsi" class="form-label">
                            Deskripsi Perusahaan
                        </label>
                        <textarea class="form-control"
                                  id="deskripsi"
                                  name="deskripsi"
                                  rows="4">{{ old('deskripsi', $profil->deskripsi) }}</textarea>
                    </div>

                    {{-- VISI PERUSAHAAN --}}
                    <div class="mb-4">
                        <label for="visi" class="form-label">
                            Visi Perusahaan
                        </label>
                        <textarea class="form-control"
                                  id="visi"
                                  name="visi"
                                  rows="3"
                                  placeholder="Masukkan visi perusahaan">{{ old('visi', $profil->visi) }}</textarea>
                    </div>

                    {{-- MISI PERUSAHAAN --}}
                    <div class="mb-4">
                        <label for="misi" class="form-label">
                            Misi Perusahaan
                        </label>
                        <textarea class="form-control"
                                  id="misi"
                                  name="misi"
                                  rows="4"
                                  placeholder="Masukkan misi perusahaan">{{ old('misi', $profil->misi) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="logo" class="form-label">
                            Foto Profil / Logo Perusahaan
                        </label>

                        <div class="mb-3">
                            @if($profil->logo)
                                <img src="{{ asset('storage/' . $profil->logo) }}"
                                     alt="Logo perusahaan"
                                     style="width:120px;height:120px;object-fit:contain;border:1px solid #edf0f5;border-radius:12px;padding:8px;">
                            @else
                                <img src="{{ asset('images/profil-perusahaan.png') }}"
                                     alt="Foto perusahaan"
                                     style="width:120px;height:120px;object-fit:contain;border:1px solid #edf0f5;border-radius:12px;padding:8px;">
                            @endif
                        </div>

                        <input type="file"
                               class="form-control"
                               id="logo"
                               name="logo"
                               accept=".jpg,.jpeg,.png,.webp">

                        <small class="text-muted">
                            Format JPG, PNG, atau WEBP. Maksimal 2 MB.
                        </small>
                    </div>
                </div>
            </section>

            {{-- TOMBOL AKSI --}}
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
                <a href="{{ route('admin.dashboard') }}"
                   class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left me-1"></i>
                    Kembali
                </a>

                <button type="submit" class="btn btn-primary px-4">
                    <i class="bi bi-save me-2"></i>
                    Simpan Perubahan
                </button>
            </div>
        </form>

    </main>
</div>
@endsection
