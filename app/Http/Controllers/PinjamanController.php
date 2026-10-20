<?php

namespace App\Http\Controllers;

use App\Models\Pinjaman;
use App\Models\Anggota;
use Illuminate\Http\Request;

class PinjamanController extends Controller
{
    public function index()
    {
        $pinjamans = Pinjaman::with('anggota')->latest()->get();
        return view('pinjaman.index', compact('pinjamans'));
    }

    public function create()
    {
        $anggotas = Anggota::where('status', 'aktif')->get();
        return view('pinjaman.create', compact('anggotas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'anggota_id' => 'required|exists:anggotas,id',
            'jumlah'     => 'required|numeric|min:100000',
            'bunga'      => 'required|numeric|min:0',
            'tenor'      => 'required|integer|min:1',
        ]);

        $validated['status'] = 'pengajuan';
        Pinjaman::create($validated);

        return redirect()->route('pinjaman.index')->with('success', 'Pengajuan pinjaman berhasil dibuat!');
    }
}
