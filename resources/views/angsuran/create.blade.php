@extends('layouts.koperasi')

@section('title', 'Catat Angsuran - KoperasiKu')

@section('content')
<div class="container py-4">
    <h3 class="mb-1">Form Pembayaran Angsuran</h3>
    <p class="text-muted">Catat cicilan pinjaman anggota.</p>

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <form action="{{ route('angsuran.store') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-12">
                        <label class="form-label">Pilih Pinjaman Anggota</label>
                        <select name="pinjaman_id" class="form-select" required>
                            <option value="">-- Pilih Pinjaman Aktif --</option>
                            @foreach($pinjamans as $pinjaman)
                                <option value="{{ $pinjaman->id }}">
                                    {{ $pinjaman->anggota->nama ?? '-' }} - Plafon: Rp {{ number_format($pinjaman->jumlah, 0, ',', '.') }} (Tenor: {{ $pinjaman->tenor }} Bln)
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Angsuran Ke-</label>
                        <input type="number" name="angsuran_ke" class="form-control" placeholder="Contoh: 1" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Tanggal Jatuh Tempo</label>
                        <input type="date" name="jatuh_tempo" class="form-control" value="{{ date('Y-m-d') }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jumlah Tagihan (Rp)</label>
                        <input type="number" name="jumlah_tagihan" class="form-control" placeholder="Contoh: 100000" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jumlah Bayar (Rp)</label>
                        <input type="number" name="jumlah_bayar" class="form-control" placeholder="Contoh: 100000" required>
                    </div>
                </div>
                <div class="mt-4 d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Simpan Pembayaran</button>
                    <a href="{{ route('angsuran.index') }}" class="btn btn-outline-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
