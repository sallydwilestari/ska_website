@extends('layouts.app')

@section('title', 'Kontak | Admin')

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
   class="sidebar-link {{ request()->routeIs('admin.kontak.*') ? 'active' : '' }}">
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

    {{-- KONTEN --}}
    <main class="admin-content">

        <header class="admin-topbar">
            <div>
                <p class="admin-greeting">PENGELOLAAN WEBSITE</p>
                <h1>Kontak</h1>
                <p class="topbar-description">
                    Kelola pesan yang dikirim pengunjung melalui formulir kontak website.
                </p>
            </div>
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

        {{-- DAFTAR PESAN --}}
        
<section class="admin-panel">
    <div class="panel-heading">
        <div>
            <h3>Daftar Pesan Masuk</h3>
            <p>
                Total {{ $pesanKontaks->total() }} pesan dari pengunjung.
            </p>
        </div>

        <span class="panel-heading-icon">
            <i class="bi bi-envelope"></i>
        </span>
    </div>

    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Subjek</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($pesanKontaks as $pesan)
                    <tr>
                        <td>{{ $pesanKontaks->firstItem() + $loop->index }}</td>
                        <td><strong>{{ $pesan->nama }}</strong></td>
                        <td>{{ $pesan->email }}</td>
                        <td>{{ $pesan->subjek ?: 'Tanpa subjek' }}</td>
                        <td>
                            @if($pesan->status === 'sudah_dibaca')
                                <span class="badge bg-success">Sudah Dibaca</span>
                            @else
                                <span class="badge bg-warning text-dark">Belum Dibaca</span>
                            @endif
                        </td>
                        <td>{{ $pesan->created_at->format('d/m/Y') }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.kontak.show', $pesan) }}"
                                   class="btn btn-sm btn-warning"
                                   title="Detail">
                                    <i class="bi bi-eye"></i>
                                </a>

                                <form action="{{ route('admin.kontak.destroy', $pesan) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus pesan ini?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-sm btn-danger"
                                            title="Hapus">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-5">
                            <i class="bi bi-inbox fs-1 d-block text-secondary mb-2"></i>
                            <strong>Belum ada pesan masuk.</strong>
                            <p class="text-muted mb-0">
                                Pesan dari pengunjung akan muncul di sini.
                            </p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="p-3">
        {{ $pesanKontaks->links() }}
    </div>
</section>

        <footer class="admin-footer">
            <span>&copy; {{ date('Y') }} PT Solusi Koneksi Anda</span>
            <span>Dashboard Administrator</span>
        </footer>

    </main>
</div>
@endsection
