<?php

namespace App\Http\Controllers;

use App\Models\Angsuran;
use App\Models\Pinjaman;
use Illuminate\Http\Request;

class AngsuranController extends Controller
{
    public function index()
    {
        $angsurans = Angsuran::with('pinjaman.anggota')->latest()->get();
        return view('angsuran.index', compact('angsurans'));
    }

    public function create()
    {
        $pinjamans = Pinjaman::whereIn('status', ['disetujui'])->with('anggota')->get();
        return view('angsuran.create', compact('pinjamans'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'pinjaman_id'    => 'required|exists:pinjamans,id',
            'angsuran_ke'    => 'required|integer|min:1',
            'jatuh_tempo'    => 'required|date',
            'jumlah_tagihan' => 'required|numeric|min:1000',
            'jumlah_bayar'   => 'required|numeric|min:1000',
        ]);

        $validated['status'] = 'lunas';
        Angsuran::create($validated);

        return redirect()->route('angsuran.index')->with('success', 'Pembayaran angsuran berhasil dicatat!');
    }
}
