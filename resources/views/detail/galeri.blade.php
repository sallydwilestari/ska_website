@extends('layouts.app')

@section('title', ($galeri->judul ?? 'Dokumentasi Kegiatan') . ' | PT Solusi Koneksi Anda')

@section('content')
<section class="py-5">
    <div class="container" style="max-width:1000px">
        <a href="{{ url('/#galeri') }}" class="btn btn-outline-primary mb-4">
            <i class="bi bi-arrow-left"></i> Kembali ke Galeri
        </a>

        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            @if ($galeri->gambar)
                <img
                    src="{{ asset('storage/' . $galeri->gambar) }}"
                    alt="{{ $galeri->judul ?? 'Foto Galeri' }}"
                    class="w-100"
                    style="max-height:600px; object-fit:contain; background:#f5f7fa;"
                >
            @endif

            <div class="card-body p-4 p-lg-5">
                <span class="badge text-bg-primary mb-3">Galeri Kegiatan</span>

                <h1 class="fw-bold mb-3">
                    {{ $galeri->judul ?? 'Dokumentasi Kegiatan' }}
                </h1>

                @if ($galeri->deskripsi)
                    <p class="text-secondary" style="white-space:pre-line">
                        {{ $galeri->deskripsi }}
                    </p>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
