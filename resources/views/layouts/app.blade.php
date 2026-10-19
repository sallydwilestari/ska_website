<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'PT Solusi Koneksi Anda')</title>

    <link rel="icon" type="image/svg+xml"
          href="https://laravel.com/img/logomark.min.svg">

    <!-- Bootstrap 5 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        rel="stylesheet">

    <!-- CSS Website dan Admin -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body class="{{ request()->is('admin/*') ? 'admin-page' : '' }}">

    @unless(request()->is('admin/*'))
        <!-- NAVBAR WEBSITE PENGUNJUNG -->
        <nav class="navbar navbar-expand-lg navbar-dark navbar-custom sticky-top">
            <div class="container">

                <a class="navbar-brand fw-bold" href="{{ url('/') }}">
                    <span class="brand-highlight">SKA</span>
                    SOLUSI KONEKSI ANDA
                </a>

                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarMenu"
                    aria-controls="navbarMenu"
                    aria-expanded="false"
                    aria-label="Buka navigasi">

                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarMenu">
                    <ul class="navbar-nav ms-auto">

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}#beranda">
                                Beranda
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}#profil">
                                Profil Perusahaan
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}#layanan">
                                Produk/Layanan
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}#artikel">
                                Artikel
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}#galeri">
                                Galeri
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}#kontak">
                                Kontak
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                Login Admin
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    @endunless


    <!-- KONTEN HALAMAN -->
    <main>
        @yield('content')
    </main>


    @unless(request()->is('admin/*'))
        <!-- FOOTER WEBSITE PENGUNJUNG -->
        <footer class="footer-custom">
            <div class="container text-center">

                <h5 class="fw-bold">PT Solusi Koneksi Anda</h5>

                <p class="mb-2">
                    Solusi Digital untuk Kebutuhan Bisnis Anda.
                </p>

                <p class="mb-0 small">
                    &copy; {{ date('Y') }} PT Solusi Koneksi Anda.
                    Semua hak dilindungi.
                </p>

            </div>
        </footer>
    @endunless


    <!-- Bootstrap JavaScript -->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>

</body>
</html>
