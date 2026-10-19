@extends('layouts.app')

@section('title', 'Beranda | PT Solusi Koneksi Anda')

@section('content')

<!-- HERO SECTION -->
<section class="hero-section" id="beranda">
    <div class="hero-overlay"></div>

    <div class="container hero-content">
        <div class="row align-items-center min-vh-75">
            <div class="col-lg-8">
                <span class="hero-label">SOLUSI DIGITAL TERPERCAYA</span>

                <h1 class="hero-title mt-3">
                    Menghubungkan Ide,
                    <span>Mewujudkan Solusi.</span>
                </h1>

                <p class="hero-description mt-3">
                    {{ $profil?->nama_perusahaan ?? 'PT Solusi Koneksi Anda' }}
                    hadir untuk membantu kebutuhan teknologi dan digital
                    melalui layanan yang inovatif, efektif, dan sesuai
                    dengan kebutuhan Anda.
                </p>

                <div class="d-flex flex-wrap gap-3 mt-4">
                    <a href="#layanan" class="btn btn-primary-custom">
                        Jelajahi Layanan →
                    </a>

                    <a href="#kontak" class="btn btn-outline-custom">
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- PROFIL PERUSAHAAN -->
<section id="profil" class="profile-section">
    <div class="container">
        <div class="row align-items-center g-5">

            <!-- FOTO PERUSAHAAN -->
            <div class="col-lg-6">
                <div class="profile-image">
                    <img
                        src="{{ $profil?->logo
                            ? asset('storage/' . $profil->logo)
                            : asset('images/profil-perusahaan.png') }}"
                        alt="Profil {{ $profil?->nama_perusahaan ?? 'PT Solusi Koneksi Anda' }}"
                    >

                    <div class="profile-image-label">
                        <span>SKA</span>
                        <p>Solusi Koneksi Anda</p>
                    </div>
                </div>
            </div>

            <!-- DESKRIPSI PERUSAHAAN -->
            <div class="col-lg-6">
                <span class="section-label">TENTANG PERUSAHAAN</span>

                <h2 class="section-title mt-3">
                    Mengenal {{ $profil?->nama_perusahaan ?? 'PT Solusi Koneksi Anda' }}
                </h2>

                <p class="section-description mt-3">
                    {{ $profil?->deskripsi ?: 'PT Solusi Koneksi Anda merupakan perusahaan yang berfokus pada penyediaan solusi teknologi dan layanan digital untuk membantu kebutuhan bisnis.' }}
                </p>

                <a href="#layanan" class="btn-primary-custom d-inline-block mt-3">
                    Lihat Layanan Kami →
                </a>
            </div>
        </div>
    </div>
</section>

<!-- VISI & MISI -->
<section id="visi-misi" class="py-5">
    <div class="container">
        <div class="row g-4">

            <div class="col-md-6">
                <div class="profile-info-card">
                    <div class="profile-info-icon">
                        <i class="bi bi-eye"></i>
                    </div>

                    <h4>Visi</h4>
                    <p>
                        {{ $profil?->visi ?? 'Visi perusahaan belum diisi.' }}
                    </p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="profile-info-card">
                    <div class="profile-info-icon">
                        <i class="bi bi-bullseye"></i>
                    </div>

                    <h4>Misi</h4>
                    <p>{!! nl2br(e($profil?->misi ?: 'Misi perusahaan belum diisi.')) !!}</p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- PRODUK & LAYANAN DARI CRUD ADMIN -->
<section class="section-padding services-section" id="layanan">
    <div class="container">

        <div class="text-center mb-5">
            <span class="section-label">APA YANG KAMI TAWARKAN</span>
            <h2 class="section-title mt-2">Produk & Layanan Kami</h2>
            <p class="section-description">
                Temukan produk dan layanan yang tersedia dari perusahaan kami.
            </p>
        </div>

        <div class="row g-4">
            @forelse ($produkLayanans as $produk)
                <div class="col-md-6 col-lg-4">
                    <div class="service-card h-100">

                        @if ($produk->gambar)
                            <img
                                src="{{ asset('storage/' . $produk->gambar) }}"
                                alt="{{ $produk->nama }}"
                                class="img-fluid rounded mb-3"
                                style="width: 100%; height: 220px; object-fit: cover;"
                            >
                        @else
                            <div class="service-icon mb-3">
                                <i class="bi bi-box-seam"></i>
                            </div>
                        @endif

                        <h4>{{ $produk->nama }}</h4>

                        <p>
                            {{ \Illuminate\Support\Str::limit(strip_tags($produk->deskripsi), 120) }}
                        </p>

                        <a href="{{ route('detail.produk', $produk->id) }}"
                           class="btn btn-primary-custom mt-3">
                            Baca Selengkapnya
                            <i class="bi bi-arrow-right"></i>
                        </a>

                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="text-center py-5">
                        <i class="bi bi-box-seam fs-1 text-secondary"></i>
                        <h4 class="mt-3">Belum Ada Produk atau Layanan</h4>
                        <p class="text-muted">
                            Produk dan layanan akan ditampilkan di sini
                            setelah ditambahkan oleh admin.
                        </p>
                    </div>
                </div>
            @endforelse
        </div>

    </div>
</section>

<!-- ARTIKEL -->
<section class="section-padding" id="artikel">
    <div class="container">

        <div class="text-center mb-5">
            <span class="section-label">INFORMASI TERKINI</span>
            <h2 class="section-title mt-2">Artikel Terbaru</h2>

            <p class="section-description">
                Temukan informasi dan berita terbaru dari perusahaan kami.
            </p>
        </div>

        <div class="row g-4">

            @forelse ($artikels as $artikel)
                <div class="col-md-6 col-lg-4">
                    <article class="content-card h-100">

                        @if ($artikel->gambar)
                            <img
                                src="{{ asset('storage/' . $artikel->gambar) }}"
                                alt="{{ $artikel->judul }}"
                                class="img-fluid"
                                style="width: 100%; height: 220px; object-fit: cover;"
                            >
                        @else
                            <div class="article-placeholder">Artikel</div>
                        @endif

                        <div class="content-card-body">
                            <span class="content-category">Artikel</span>

                            
<h4>{{ $artikel->judul }}</h4>

<p>
    {{ \Illuminate\Support\Str::limit(strip_tags($artikel->deskripsi_artikel ?? ''), 120) }}
</p>


                            <a href="{{ route('detail.artikel', $artikel->id) }}"
   class="btn btn-primary-custom mt-2">
    Baca Selengkapnya
    <i class="bi bi-arrow-right"></i>
</a>

                        </div>
                    </article>
                </div>
            @empty
                <div class="col-12">
                    <div class="text-center py-5">
                        <i class="bi bi-newspaper fs-1 text-secondary"></i>

                        <h4 class="mt-3">Belum Ada Artikel</h4>

                        <p class="text-muted">
                            Artikel terbaru akan ditampilkan di sini.
                        </p>
                    </div>
                </div>
            @endforelse

        </div>
    </div>
</section>


<!-- GALERI DARI CRUD ADMIN -->
<section class="section-padding services-section" id="galeri">
    <div class="container">

        <div class="text-center mb-5">
            <span class="section-label">DOKUMENTASI</span>
            <h2 class="section-title mt-2">Galeri Kegiatan</h2>

            <p class="section-description">
                Dokumentasi aktivitas dan kegiatan perusahaan.
            </p>
        </div>

        <div class="row g-4">

            @forelse ($galeris as $galeri)
                <div class="col-md-6 col-lg-4">
                    <div class="gallery-card h-100">

                        @if ($galeri->gambar)
                            <img
                                src="{{ asset('storage/' . $galeri->gambar) }}"
                                alt="{{ $galeri->judul ?? 'Foto Galeri' }}"
                                class="img-fluid"
                                style="width: 100%; height: 260px; object-fit: cover;"
                            >
                        @else
                            <div class="gallery-placeholder">
                                <i class="bi bi-images"></i>
                            </div>
                        @endif

                        <div class="content-card-body">
                            <h4>
                                {{ $galeri->judul ?? 'Dokumentasi Kegiatan' }}
                            </h4>

                            @if (!empty($galeri->deskripsi))
                                <p>
                                    {{ \Illuminate\Support\Str::limit($galeri->deskripsi, 100) }}
                                </p>
                            @endif

                            <a href="{{ route('detail.galeri', $galeri->id) }}"
   class="btn btn-primary-custom mt-2">
    Lihat Selengkapnya
    <i class="bi bi-arrow-right"></i>
</a>

                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="text-center py-5">
                        <i class="bi bi-images fs-1 text-secondary"></i>

                        <h4 class="mt-3">Belum Ada Galeri</h4>

                        <p class="text-muted">
                            Foto kegiatan akan ditampilkan di sini
                            setelah ditambahkan oleh admin.
                        </p>
                    </div>
                </div>
            @endforelse

        </div>
    </div>
</section>


<!-- KONTAK -->
<section class="section-padding" id="kontak">
    <div class="container">
        <div class="contact-wrapper">

            <div class="row g-5">

                <div class="col-lg-5">
                    <span class="hero-label">HUBUNGI KAMI</span>

                    <h2 class="contact-title mt-3">
                        Mari Terhubung dengan Kami
                    </h2>

                    <p class="contact-description mt-3">
                        Punya pertanyaan atau ingin mengetahui layanan kami?
                        Silakan hubungi
                        {{ $profil?->nama_perusahaan ?? 'PT Solusi Koneksi Anda' }}
                        melalui informasi kontak berikut.
                    </p>
                </div>

                <div class="col-lg-7">

                    <div class="contact-item">
                        <span>Email</span>
                        <p>
                            {{ $profil?->email ?: 'PTSolusiKoneksiAnda@gmail.com' }}
                        </p>
                    </div>

                    <div class="contact-item">
                        <span>Telepon</span>
                        <p>
                            {{ $profil?->telepon ?: '085712345678' }}
                        </p>
                    </div>

                    <div class="contact-item">
                        <span>Alamat</span>
                        <p>
                            {{ $profil?->alamat ?: 'Jl. Raya Pajajaran No. 88 F Kota Bogor 16153' }}
                        </p>
                    </div>

                </div>
            </div>


            <!-- FORM PESAN PENGUNJUNG -->
            <div class="row mt-5">
                <div class="col-lg-10 mx-auto">
                    <div class="p-4 rounded-3 bg-white">

                        <h3 class="contact-title mb-2">
                            Kirim Pesan kepada Kami
                        </h3>

                        <p class="text-muted mb-4">
                            Silakan isi formulir berikut jika kamu memiliki
                            pertanyaan atau ingin berkonsultasi dengan kami.
                        </p>

                        @if (session('kontak_success'))
                            <div class="alert alert-success">
                                {{ session('kontak_success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('kontak.store') }}" method="POST">
                            @csrf

                            <div class="row g-3">

                                <div class="col-md-6">
                                    <label for="nama" class="form-label">
                                        Nama Lengkap
                                    </label>

                                    <input
                                        type="text"
                                        name="nama"
                                        id="nama"
                                        class="form-control"
                                        placeholder="Masukkan nama lengkap"
                                        value="{{ old('nama') }}"
                                        required
                                    >
                                </div>

                                <div class="col-md-6">
                                    <label for="email" class="form-label">
                                        Email
                                    </label>

                                    <input
                                        type="email"
                                        name="email"
                                        id="email"
                                        class="form-control"
                                        placeholder="Masukkan email"
                                        value="{{ old('email') }}"
                                        required
                                    >
                                </div>

                                <div class="col-12">
                                    <label for="subjek" class="form-label">
                                        Subjek
                                    </label>

                                    <input
                                        type="text"
                                        name="subjek"
                                        id="subjek"
                                        class="form-control"
                                        placeholder="Masukkan subjek pesan"
                                        value="{{ old('subjek') }}"
                                    >
                                </div>

                                <div class="col-12">
                                    <label for="pesan" class="form-label">
                                        Pesan
                                    </label>

                                    <textarea
                                        name="pesan"
                                        id="pesan"
                                        class="form-control"
                                        rows="5"
                                        placeholder="Tuliskan pesan kamu di sini"
                                        required
                                    >{{ old('pesan') }}</textarea>
                                </div>

                                <div class="col-12">
                                    <button
                                        type="submit"
                                        class="btn btn-primary-custom"
                                    >
                                        <i class="bi bi-send me-2"></i>
                                        Kirim Pesan
                                    </button>
                                </div>

                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
