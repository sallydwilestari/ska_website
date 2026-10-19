@extends('layouts.app')

@section('title', $artikel->judul . ' | PT Solusi Koneksi Anda')

@section('content')
<section class="py-5">
    <div class="container" style="max-width:900px">

        <a href="{{ url('/#artikel') }}" class="btn btn-outline-primary mb-4">
            <i class="bi bi-arrow-left"></i> Kembali ke Artikel
        </a>

        <article class="card border-0 shadow-sm rounded-4 overflow-hidden">

            @if ($artikel->gambar)
                <img
                    src="{{ asset('storage/' . $artikel->gambar) }}"
                    alt="{{ $artikel->judul }}"
                    class="w-100"
                    style="max-height:450px; object-fit:cover;"
                >
            @endif

            <div class="card-body p-4 p-lg-5">

                <span class="badge text-bg-primary mb-3">Artikel</span>

                <h1 class="fw-bold mb-4">
                    {{ $artikel->judul }}
                </h1>

                <div class="text-secondary"
                     style="white-space:pre-line; line-height:1.9">
                    {{ $artikel->deskripsi_artikel }}
                </div>

            </div>
        </article>
    </div>
</section>
@endsection
