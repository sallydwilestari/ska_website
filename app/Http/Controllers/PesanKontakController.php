<?php

namespace App\Http\Controllers;

use App\Models\PesanKontak;
use Illuminate\Http\Request;

class PesanKontakController extends Controller
{
    // Menyimpan pesan dari pengunjung
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subjek' => 'nullable|string|max:255',
            'pesan' => 'required|string',
        ]);

        PesanKontak::create($validated);

        return back()->with(
            'kontak_success',
            'Pesan berhasil dikirim. Terima kasih telah menghubungi kami!'
        );
    }

    // Menampilkan daftar pesan di admin
    public function index()
    {
        $pesanKontaks = PesanKontak::latest()->paginate(10);

        return view('admin.kontak.index', compact('pesanKontaks'));
    }

    // Menampilkan detail pesan dan menandainya sudah dibaca
    public function show(PesanKontak $pesanKontak)
    {
        if ($pesanKontak->status === 'belum_dibaca') {
            $pesanKontak->update([
                'status' => 'sudah_dibaca',
            ]);
        }

        return view('admin.kontak.show', compact('pesanKontak'));
    }

    // Menghapus pesan
    public function destroy(PesanKontak $pesanKontak)
    {
        $pesanKontak->delete();

        return redirect()
            ->route('admin.kontak.index')
            ->with('success', 'Pesan kontak berhasil dihapus!');
    }
}
