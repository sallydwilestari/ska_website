@extends('layouts.app')

@section('title', 'Dashboard Admin | SKA')

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

        <a href="{{ route('admin.dashboard') }}"
           class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
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

        <a href="{{ route('admin.profil.edit') }}"
           class="sidebar-link {{ request()->routeIs('admin.profil.*') ? 'active' : '' }}">
            <i class="bi bi-building"></i>
            <span>Profil Perusahaan</span>
        </a>

       <a href="{{ route('admin.produk-layanan.index') }}"
   class="sidebar-link">
    <i class="bi bi-box-seam"></i>
    <span>Produk &amp; Layanan</span>
</a>

        
<a href="{{ route('admin.artikel.index') }}"
   class="sidebar-link {{ request()->routeIs('admin.artikel.*') ? 'active' : '' }}">
    <i class="bi bi-newspaper"></i>
    <span>Artikel</span>
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
    <button type="submit" class="nav-link">
        <i class="bi bi-box-arrow-right"></i>
        <span>Logout</span>
    </button>
</form>
        </div>
    </aside>

    {{-- KONTEN DASHBOARD --}}
    <main class="admin-content">

        <header class="admin-topbar">
            <div>
                <p class="admin-greeting">PANEL ADMINISTRATOR</p>
                <h1>Dashboard</h1>
               <p class="topbar-description">
    Selamat datang di panel pengelolaan website.
</p>
            </div>

            <a href="{{ route('home') }}" target="_blank"
               class="admin-profile-preview">
                Lihat Website
                <i class="bi bi-arrow-up-right"></i>
            </a>
        </header>

        {{-- BANNER --}}
        <section class="dashboard-banner">
            <div>
                <span class="banner-label">DASHBOARD ADMIN</span>
                <h2>Selamat Datang, Administrator!</h2>
                <p>
                    Kelola informasi perusahaan dan konten website
                    dengan mudah melalui panel ini.
                </p>
    
            </div>
            <div class="banner-icon">
                <i class="bi bi-buildings"></i>
            </div>
        </section>

        {{-- RINGKASAN --}}
        <section class="overview-section">
            <div class="section-heading">
                <div>
                    <h2>Ringkasan Website</h2>
                    <p>Informasi umum pengelolaan website perusahaan.</p>
                </div>
            </div>

            <div class="overview-grid">
                <div class="overview-card">
                    <div class="overview-card-icon">
                        <i class="bi bi-building"></i>
                    </div>
                    <div>
                        <p>Profil Perusahaan</p>
                        <h3>{{ $profil ? 'Tersedia' : 'Belum tersedia' }}</h3>
                        <small>Informasi perusahaan</small>
                    </div>
                </div>

                <div class="overview-card">
                    <div class="overview-card-icon">
                        <i class="bi bi-box-seam"></i>
                    </div>
                    <div>
                        <p>Produk &amp; Layanan</p>
                        <h3>Kelola</h3>
                        <small>Informasi layanan website</small>
                    </div>
                </div>

                <div class="overview-card">
                    <div class="overview-card-icon">
                        <i class="bi bi-newspaper"></i>
                    </div>
                    <div>
                        <p>Artikel</p>
                        <h3>Konten</h3>
                        <small>Informasi dan berita perusahaan</small>
                    </div>
                </div>

                <div class="overview-card">
                    <div class="overview-card-icon">
                        <i class="bi bi-images"></i>
                    </div>
                    <div>
                        <p>Galeri</p>
                        <h3>Media</h3>
                        <small>Foto dan dokumentasi perusahaan</small>
                    </div>
                </div>
            </div>
        </section>

        {{-- PANEL INFORMASI --}}
        <section class="bottom-panels">
            <div class="admin-panel">
                <div class="panel-heading">
                    <div>
                        <h3>Informasi Perusahaan</h3>
                        <p>Ringkasan profil yang tersimpan.</p>
                    </div>
                    <span class="panel-heading-icon">
                        <i class="bi bi-building"></i>
                    </span>
                </div>

                <div class="dashboard-company-info">
                    <div>
                        <span>Nama Perusahaan</span>
                        <strong>
                            {{ $profil?->nama_perusahaan ?? 'PT Solusi Koneksi Anda' }}
                        </strong>
                    </div>
                    <div>
                        <span>Email</span>
                        <strong>{{ $profil?->email ?: 'PTSolusiKoneksiAnda@gmail.com' }}</strong>
                    </div>
                    <div>
                        <span>Nomor Telepon</span>
                        <strong>{{ $profil?->telepon ?: '085712345678' }}</strong>
                    </div>
                </div>

            </div>

            <div class="admin-panel">
                <div class="panel-heading">
                    <div>
                        <h3>Akses Cepat</h3>
                        <p>Pilih menu yang ingin dikelola.</p>
                    </div>
                    <span class="panel-heading-icon">
                        <i class="bi bi-lightning-charge"></i>
                    </span>
                </div>

                <div class="dashboard-quick-links">
                    <a href="{{ route('admin.profil.edit') }}">
                        <i class="bi bi-building"></i>
                        <span>
                            <strong>Edit Profil</strong>
                            <small>Ubah data perusahaan</small>
                        </span>
                        <i class="bi bi-chevron-right"></i>
                    </a>

                    <a href="{{ route('home') }}" target="_blank">
                        <i class="bi bi-globe2"></i>
                        <span>
                            <strong>Lihat Website</strong>
                            <small>Buka halaman pengunjung</small>
                        </span>
                        <i class="bi bi-chevron-right"></i>
                    </a>
                </div>
            </div>
        </section>

        <footer class="admin-footer">
            <span>&copy; {{ date('Y') }} PT Solusi Koneksi Anda</span>
            <span>Dashboard Administrator</span>
        </footer>

    </main>
</div>
@endsection