@extends('layouts.koperasi')

@section('title', 'Tambah Simpanan - KoperasiKu')

@section('content')
<div class="container py-4">
    <h3 class="mb-1">Tambah Simpanan</h3>
    <p class="text-muted">Catat transaksi simpanan anggota.</p>

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <form action="{{ route('simpanan.store') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Pilih Anggota</label>
                        <select name="anggota_id" class="form-select" required>
                            <option value="">-- Pilih Anggota --</option>
                            @foreach($anggotas as $anggota)
                                <option value="{{ $anggota->id }}">{{ $anggota->no_anggota }} - {{ $anggota->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jenis Simpanan</label>
                        <select name="jenis" class="form-select" required>
                            <option value="pokok">Pokok</option>
                            <option value="wajib">Wajib</option>
                            <option value="sukarela">Sukarela</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Nominal (Rp)</label>
                        <input type="number" name="nominal" class="form-control" placeholder="Contoh: 500000" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Tanggal Transaksi</label>
                        <input type="date" name="tanggal" class="form-control" value="{{ date('Y-m-d') }}" required>
                    </div>
                </div>
                <div class="mt-4 d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Simpan Transaksi</button>
                    <a href="{{ route('simpanan.index') }}" class="btn btn-outline-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
