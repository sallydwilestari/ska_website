@extends('layouts.app')

@section('title', 'Artikel | Admin')

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

        <a href="{{ route('admin.artikel.index') }}"
           class="sidebar-link active">
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

    {{-- KONTEN ARTIKEL --}}
    <main class="admin-content">

        <header class="admin-topbar">
            <div>
                <p class="admin-greeting">PENGELOLAAN WEBSITE</p>
                <h1>Artikel</h1>
                <p class="topbar-description">
                    Kelola artikel dan berita perusahaan melalui halaman ini.
                </p>
            </div>

            <a href="{{ route('admin.artikel.create') }}"
               class="admin-profile-preview">
                <i class="bi bi-plus-lg"></i>
                Tambah Artikel
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
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        {{-- DAFTAR ARTIKEL --}}
        <section class="admin-panel">
            <div class="panel-heading">
                <div>
                    <h3>Daftar Artikel</h3>
                    <p>
                        Total {{ $artikels->total() }} data artikel.
                    </p>
                </div>

                <span class="panel-heading-icon">
                    <i class="bi bi-newspaper"></i>
                </span>
            </div>

            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Gambar</th>
                            <th>Judul Artikel</th>
                            <th>Deskripsi Artikel</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($artikels as $artikel)
                            <tr>
                                <td>
                                    {{ $artikels->firstItem() + $loop->index }}
                                </td>

                                <td>
                                    @if($artikel->gambar)
                                        <img
                                            src="{{ asset('storage/' . $artikel->gambar) }}"
                                            alt="{{ $artikel->judul }}"
                                            style="width:65px;height:55px;object-fit:cover;border-radius:8px;"
                                        >
                                    @else
                                        <div style="width:65px;height:55px;border-radius:8px;background:#edf1f7;display:flex;align-items:center;justify-content:center;">
                                            <i class="bi bi-image text-secondary fs-4"></i>
                                        </div>
                                    @endif
                                </td>

                                <td>
                                    <strong>{{ $artikel->judul }}</strong>
                                    <div class="text-muted small">
                                        {{ $artikel->created_at?->format('d M Y') }}
                                    </div>
                                </td>

                                <td>
                                   
{{ \Illuminate\Support\Str::limit(strip_tags($artikel->deskripsi_artikel), 80) }}

                                </td>

                                <td>
                                    @if($artikel->status)
                                        <span class="badge bg-success">Aktif</span>
                                    @else
                                        <span class="badge bg-secondary">Nonaktif</span>
                                    @endif
                                </td>

                                <td>
                                    <div class="d-flex gap-2">

                                        {{-- EDIT --}}
                                        <a
                                            href="{{ route('admin.artikel.edit', $artikel) }}"
                                            class="btn btn-sm btn-warning"
                                            title="Edit"
                                        >
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        {{-- HAPUS --}}
                                        <form
                                            action="{{ route('admin.artikel.destroy', $artikel) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus artikel ini?')"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn btn-sm btn-danger"
                                                title="Hapus"
                                            >
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5">
                                    <i class="bi bi-inbox fs-1 d-block text-secondary mb-2"></i>
                                    <strong>Belum ada artikel.</strong>
                                    <p class="text-muted mb-3">
                                        Tambahkan artikel pertama perusahaan kamu.
                                    </p>

                                    <a href="{{ route('admin.artikel.create') }}"
                                       class="btn btn-primary">
                                        <i class="bi bi-plus-lg me-1"></i>
                                        Tambah Artikel
                                    </a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="p-3">
                {{ $artikels->links() }}
            </div>
        </section>

        <footer class="admin-footer">
            <span>&copy; {{ date('Y') }} PT Solusi Koneksi Anda</span>
            <span>Dashboard Administrator</span>
        </footer>

    </main>
</div>
@endsection
