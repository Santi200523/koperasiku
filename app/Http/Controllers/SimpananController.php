<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Simpanan;
use Illuminate\Http\Request;

class SimpananController extends Controller
{
    public function index(Request $request)
    {
        $query = Simpanan::with('anggota');

        if ($request->filled('q')) {
            $q = $request->q;
            $query->whereHas('anggota', function ($sub) use ($q) {
                $sub->where('nama', 'like', "%{$q}%")
                    ->orWhere('no_anggota', 'like', "%{$q}%");
            });
        }

        if ($request->filled('jenis')) {
            $query->where('jenis', $request->jenis);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $simpanan = $query->latest()->paginate(10)->withQueryString();

        $totalPokok = Simpanan::where('jenis', 'Pokok')->where('status', 'Disetujui')->sum('nominal');
        $totalWajib = Simpanan::where('jenis', 'Wajib')->where('status', 'Disetujui')->sum('nominal');
        $totalSukarela = Simpanan::where('jenis', 'Sukarela')->where('status', 'Disetujui')->sum('nominal');
        $totalSemua = $totalPokok + $totalWajib + $totalSukarela;

        return view('simpanan.index', compact(
            'simpanan', 'totalPokok', 'totalWajib', 'totalSukarela', 'totalSemua'
        ));
    }

    public function create()
    {
        $anggota = Anggota::orderBy('nama')->get();
        return view('simpanan.form', compact('anggota'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'anggota_id' => 'required|exists:anggotas,id',
            'jenis' => 'required|in:Pokok,Wajib,Sukarela',
            'nominal' => 'required|integer|min:1',
            'tanggal' => 'required|date',
        ]);

        $data['status'] = 'Menunggu';
        Simpanan::create($data);

        return redirect()->route('simpanan.index')->with('success', 'Transaksi simpanan berhasil ditambahkan.');
    }

    public function edit(Simpanan $simpanan)
    {
        $anggota = Anggota::orderBy('nama')->get();
        return view('simpanan.form', compact('simpanan', 'anggota'));
    }

    public function update(Request $request, Simpanan $simpanan)
    {
        $data = $request->validate([
            'anggota_id' => 'required|exists:anggotas,id',
            'jenis' => 'required|in:Pokok,Wajib,Sukarela',
            'nominal' => 'required|integer|min:1',
            'tanggal' => 'required|date',
            'status' => 'required|in:Menunggu,Disetujui,Ditolak',
        ]);

        $simpanan->update($data);

        return redirect()->route('simpanan.index')->with('success', 'Transaksi simpanan berhasil diperbarui.');
    }

    public function destroy(Simpanan $simpanan)
    {
        $simpanan->delete();

        return redirect()->route('simpanan.index')->with('success', 'Transaksi simpanan berhasil dihapus.');
    }
}
