@extends('layouts.koperasi')

@section('title', 'Ajukan Pinjaman - KoperasiKu')

@section('content')
<div class="container py-4">
    <h3 class="mb-1">Pengajuan Pinjaman</h3>
    <p class="text-muted">Isi formulir berikut untuk mengajukan pinjaman anggota.</p>

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <form action="{{ route('pinjaman.store') }}" method="POST">
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
                        <label class="form-label">Jumlah Pinjaman (Rp)</label>
                        <input type="number" name="jumlah" class="form-control" placeholder="Contoh: 1000000" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Bunga (%)</label>
                        <input type="number" step="0.01" name="bunga" class="form-control" value="1.5" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Tenor (Bulan)</label>
                        <input type="number" name="tenor" class="form-control" placeholder="Contoh: 12" required>
                    </div>
                </div>
                <div class="mt-4 d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Ajukan Pinjaman</button>
                    <a href="{{ route('pinjaman.index') }}" class="btn btn-outline-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
