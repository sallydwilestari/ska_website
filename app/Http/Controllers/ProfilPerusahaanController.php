<?php

namespace App\Http\Controllers;

use App\Models\ProfilPerusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilPerusahaanController extends Controller
{
    public function edit()
    {
        $profil = ProfilPerusahaan::first();

        if (!$profil) {
            $profil = ProfilPerusahaan::create([
                'nama_perusahaan' => 'PT Solusi Koneksi Anda',
                'deskripsi' => '',
                'visi' => '',
                'misi' => '',
            ]);
        }

        return view('admin.profil', compact('profil'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $profil = ProfilPerusahaan::first();

        if (!$profil) {
            $profil = new ProfilPerusahaan();
        }

        $data = collect($validated)
            ->except('logo')
            ->all();

        if ($request->hasFile('logo')) {
            if ($profil->logo) {
                Storage::disk('public')->delete($profil->logo);
            }

            $data['logo'] = $request->file('logo')
                ->store('profil-perusahaan', 'public');
        }

        $profil->fill($data);
        $profil->save();

        return redirect()
            ->route('admin.profil.edit')
            ->with('success', 'Profil perusahaan berhasil diperbarui!');
    }
}
