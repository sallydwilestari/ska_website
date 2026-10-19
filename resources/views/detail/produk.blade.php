@extends('layouts.app')

@section('title', $produk->nama . ' | PT Solusi Koneksi Anda')

@section('content')
<section class="py-5">
    <div class="container">
        <a href="{{ url('/#layanan') }}" class="btn btn-outline-primary mb-4">
            <i class="bi bi-arrow-left"></i> Kembali ke Produk & Layanan
        </a>

        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="row g-0">
                @if ($produk->gambar)
                    <div class="col-lg-6">
                        <img
                            src="{{ asset('storage/' . $produk->gambar) }}"
                            alt="{{ $produk->nama }}"
                            class="w-100 h-100"
                            style="min-height:300px; max-height:500px; object-fit:cover;"
                        >
                    </div>
                @endif

                <div class="{{ $produk->gambar ? 'col-lg-6' : 'col-12' }}">
                    <div class="card-body p-4 p-lg-5">
                        <span class="badge text-bg-primary mb-3">
                            Produk & Layanan
                        </span>

                        <h1 class="fw-bold mb-3">{{ $produk->nama }}</h1>

                        <p class="text-secondary" style="white-space:pre-line">{{ $produk->deskripsi }}</p>

                        @if ($produk->harga !== null)
                            <h4 class="fw-bold text-primary mt-4">
                                Rp {{ number_format((float) $produk->harga, 0, ',', '.') }}
                            </h4>
                        @endif

                        <a href="{{ url('/#kontak') }}" class="btn btn-primary mt-3">
                            Hubungi Kami
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
