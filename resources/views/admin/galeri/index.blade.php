@extends('layouts.app')

@section('title', 'Galeri')

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
            <a href="{{ route('admin.dashboard') }}" class="sidebar-link">
                <i class="bi bi-grid-fill"></i><span>Dashboard</span>
            </a>
            <a href="{{ route('home') }}" target="_blank" class="sidebar-link">
                <i class="bi bi-globe"></i><span>Lihat Website</span>
                <i class="bi bi-arrow-up-right ms-auto"></i>
            </a>
        </nav>

        <div class="sidebar-caption mt-4">INFORMASI WEBSITE</div>

        <nav class="sidebar-menu">
            <a href="{{ route('admin.profil.edit') }}" class="sidebar-link">
                <i class="bi bi-building"></i><span>Profil Perusahaan</span>
            </a>
            <a href="{{ route('admin.produk-layanan.index') }}" class="sidebar-link">
                <i class="bi bi-box-seam"></i><span>Produk &amp; Layanan</span>
            </a>
            <a href="{{ route('admin.artikel.index') }}" class="sidebar-link">
                <i class="bi bi-newspaper"></i><span>Artikel</span>
            </a>

           <a href="{{ route('admin.galeri.index') }}"
   class="sidebar-link {{ request()->routeIs('admin.galeri.*') ? 'active' : '' }}">
    <i class="bi bi-images"></i>
    <span>Galeri</span>
</a>

<a href="{{ route('admin.kontak.index') }}" class="sidebar-link">
    <i class="bi bi-envelope"></i>
    <span>Kontak</span>
</a>
        </nav>

        <div class="sidebar-bottom">
            <div class="sidebar-user">
                <div class="user-avatar"><i class="bi bi-person-fill"></i></div>
                <div>
                    <strong>Administrator</strong>
                    <small>Pengelola Website</small>
                </div>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="sidebar-logout">
                    <i class="bi bi-box-arrow-left"></i> Logout
                </button>
            </form>
        </div>
    </aside>

    <main class="admin-content">
        <header class="admin-topbar">
            <div>
                <p class="admin-greeting">PENGELOLAAN WEBSITE</p>
                <h1>Galeri</h1>
                <p class="topbar-description">Kelola foto dan dokumentasi perusahaan.</p>
            </div>
            <a href="{{ route('admin.galeri.create') }}" class="admin-profile-preview">
                <i class="bi bi-plus-lg"></i> Tambah Galeri
            </a>
        </header>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <section class="admin-panel mb-4">
            <div class="panel-heading">
                <div>
                    <h3>Daftar Galeri</h3>
                    <p>Total {{ $galeris->count() }} data galeri.</p>
                </div>
                <span class="panel-heading-icon"><i class="bi bi-images"></i></span>
            </div>

            <div class="p-3">
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Gambar</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($galeris as $galeri)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if($galeri->gambar)
                                            <img src="{{ asset('storage/'.$galeri->gambar) }}"
                                                 alt="{{ $galeri->judul }}"
                                                 style="width:60px;height:50px;object-fit:cover;border-radius:8px;">
                                        @else
                                            <span class="text-muted">Tidak ada gambar</span>
                                        @endif
                                    </td>
                                    <td class="fw-semibold">{{ $galeri->judul }}</td>
                                    <td>{{ \Illuminate\Support\Str::limit($galeri->deskripsi, 60) }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('admin.galeri.edit', $galeri) }}"
                                               class="btn btn-warning btn-sm">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <form action="{{ route('admin.galeri.destroy', $galeri) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Yakin ingin menghapus galeri ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-4">
                                        Belum ada data galeri.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <footer class="admin-footer">
            <span>© {{ date('Y') }} PT Solusi Koneksi Anda</span>
            <span>Dashboard Administrator</span>
        </footer>
    </main>
</div>
@endsection
