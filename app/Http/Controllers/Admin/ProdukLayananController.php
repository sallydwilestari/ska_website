<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProdukLayanan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProdukLayananController extends Controller
{
    public function index()
    {
        $produkLayanans = ProdukLayanan::latest()->paginate(10);

        return view('admin.produk-layanan.index', compact('produkLayanans'));
    }

    public function create()
    {
        return view('admin.produk-layanan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required|boolean',
        ]);

        $validated['slug'] = Str::slug($validated['nama'])
            . '-' . Str::lower(Str::random(6));

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')
                ->store('produk-layanan', 'public');
        }

        ProdukLayanan::create($validated);

        return redirect()
            ->route('admin.produk-layanan.index')
            ->with('success', 'Produk atau layanan berhasil ditambahkan!');
    }

    public function edit(ProdukLayanan $produkLayanan)
    {
        return view('admin.produk-layanan.edit', compact('produkLayanan'));
    }

    public function update(Request $request, ProdukLayanan $produkLayanan)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required|boolean',
        ]);

        if ($produkLayanan->nama !== $validated['nama']) {
            $validated['slug'] = Str::slug($validated['nama'])
                . '-' . Str::lower(Str::random(6));
        }

        if ($request->hasFile('gambar')) {
            if ($produkLayanan->gambar) {
                Storage::disk('public')->delete($produkLayanan->gambar);
            }

            $validated['gambar'] = $request->file('gambar')
                ->store('produk-layanan', 'public');
        }

        $produkLayanan->update($validated);

        return redirect()
            ->route('admin.produk-layanan.index')
            ->with('success', 'Produk atau layanan berhasil diperbarui!');
    }

    public function destroy(ProdukLayanan $produkLayanan)
    {
        if ($produkLayanan->gambar) {
            Storage::disk('public')->delete($produkLayanan->gambar);
        }

        $produkLayanan->delete();

        return redirect()
            ->route('admin.produk-layanan.index')
            ->with('success', 'Produk atau layanan berhasil dihapus!');
    }
}
