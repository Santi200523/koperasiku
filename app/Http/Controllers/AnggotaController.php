<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggotas = Anggota::latest()->get();
        return view('anggota.index', compact('anggotas'));
    }

    public function create()
    {
        return view('anggota.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_anggota'        => 'required|unique:anggotas,no_anggota',
            'nik'               => 'required|digits:16|unique:anggotas,nik',
            'nama'              => 'required|string|max:255',
            'jenis_kelamin'     => 'required|in:L,P',
            'no_hp'             => 'required|string|max:20',
            'alamat'            => 'required|string',
            'tanggal_bergabung' => 'required|date',
            'status'            => 'required|in:aktif,nonaktif',
        ]);

        Anggota::create($validated);

        return redirect()->route('anggota.index')->with('success', 'Data anggota berhasil ditambahkan!');
    }

    public function show(Anggota $anggota)
    {
        return view('anggota.show', compact('anggota'));
    }

    public function edit(Anggota $anggota)
    {
        return view('anggota.edit', compact('anggota'));
    }

    public function update(Request $request, Anggota $anggota)
    {
        $validated = $request->validate([
            'no_anggota'        => 'required|unique:anggotas,no_anggota,' . $anggota->id,
            'nik'               => 'required|digits:16|unique:anggotas,nik,' . $anggota->id,
            'nama'              => 'required|string|max:255',
            'jenis_kelamin'     => 'required|in:L,P',
            'no_hp'             => 'required|string|max:20',
            'alamat'            => 'required|string',
            'tanggal_bergabung' => 'required|date',
            'status'            => 'required|in:aktif,nonaktif',
        ]);

        $anggota->update($validated);

        return redirect()->route('anggota.index')->with('success', 'Data anggota berhasil diperbarui!');
    }

    public function destroy(Anggota $anggota)
    {
        $anggota->delete();
        return redirect()->route('anggota.index')->with('success', 'Data anggota berhasil dihapus!');
    }
}
