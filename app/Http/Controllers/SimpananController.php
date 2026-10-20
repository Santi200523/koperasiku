<?php

namespace App\Http\Controllers;

use App\Models\Simpanan;
use App\Models\Anggota;
use Illuminate\Http\Request;

class SimpananController extends Controller
{
    public function index()
    {
        $simpanans = Simpanan::with('anggota')->latest()->get();
        return view('simpanan.index', compact('simpanans'));
    }

    public function create()
    {
        $anggotas = Anggota::where('status', 'aktif')->get();
        return view('simpanan.create', compact('anggotas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'anggota_id' => 'required|exists:anggotas,id',
            'jenis'      => 'required|in:pokok,wajib,sukarela',
            'nominal'    => 'required|numeric|min:1000',
            'tanggal'    => 'required|date',
        ]);

        $validated['status'] = 'disetujui';
        Simpanan::create($validated);

        return redirect()->route('simpanan.index')->with('success', 'Data simpanan berhasil ditambahkan!');
    }
}
