<?php

namespace App\Http\Controllers;

use App\Models\ProfilPerusahaan;
use App\Models\Artikel;
use App\Models\Galeri;
use App\Models\ProdukLayanan;

class AdminController extends Controller
{
    public function dashboard()
    {
        $profil = ProfilPerusahaan::first();

        $artikel = Artikel::latest()->get();

        $galeri = Galeri::latest()->get();

        $produkLayanans = ProdukLayanan::latest()->get();

        return view('admin.dashboard', compact(
            'profil',
            'artikel',
            'galeri',
            'produkLayanans'
        ));
    }
}
