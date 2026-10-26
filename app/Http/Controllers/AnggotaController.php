<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index(Request $request)
    {
        $anggota = Anggota::query()
            ->when($request->q, function ($query, $q) {
                $query->where('nama', 'like', "%{$q}%")
                    ->orWhere('nomor_anggota', 'like', "%{$q}%");
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('anggota.index', compact('anggota'));
    }

    public function create()
    {
        return view('anggota.form', ['item' => new Anggota()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nomor_anggota' => 'required|string|max:50|unique:anggotas,nomor_anggota',
            'nama' => 'required|string|max:255',
            'nik' => 'nullable|string|max:30',
            'jenis_kelamin' => 'nullable|in:Laki-laki,Perempuan',
            'alamat' => 'nullable|string',
            'no_telepon' => 'nullable|string|max:30',
            'tanggal_daftar' => 'nullable|date',
            'status' => 'required|in:Aktif,Nonaktif',
        ]);

        Anggota::create($data);

        return redirect()->route('anggota.index')
            ->with('success', 'Anggota berhasil ditambahkan.');
    }

    public function edit(Anggota $anggota)
    {
        return view('anggota.form', ['item' => $anggota]);
    }

    public function update(Request $request, Anggota $anggota)
    {
        $data = $request->validate([
            'nomor_anggota' => 'required|string|max:50|unique:anggotas,nomor_anggota,' . $anggota->id,
            'nama' => 'required|string|max:255',
            'nik' => 'nullable|string|max:30',
            'jenis_kelamin' => 'nullable|in:Laki-laki,Perempuan',
            'alamat' => 'nullable|string',
            'no_telepon' => 'nullable|string|max:30',
            'tanggal_daftar' => 'nullable|date',
            'status' => 'required|in:Aktif,Nonaktif',
        ]);

        $anggota->update($data);

        return redirect()->route('anggota.index')
            ->with('success', 'Data anggota berhasil diperbarui.');
    }

    public function destroy(Anggota $anggota)
    {
        $anggota->delete();

        return redirect()->route('anggota.index')
            ->with('success', 'Anggota berhasil dihapus.');
    }
}
