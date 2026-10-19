<?php

namespace App\Http\Controllers;

use App\Models\ProdukLayanan;
use App\Models\Artikel;
use App\Models\Galeri;

class DetailPublikController extends Controller
{
    public function produk($id)
    {
        $produk = ProdukLayanan::where('status', true)
            ->findOrFail($id);

        return view('detail.produk', compact('produk'));
    }

    public function artikel($id)
    {
        $artikel = Artikel::where('status', true)
            ->findOrFail($id);

        return view('detail.artikel', compact('artikel'));
    }

    public function galeri($id)
    {
        $galeri = Galeri::findOrFail($id);

        return view('detail.galeri', compact('galeri'));
    }
}
