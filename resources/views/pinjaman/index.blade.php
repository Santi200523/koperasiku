@extends('layouts.koperasi')

@section('title', 'Data Pinjaman - KoperasiKu')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="mb-1">Data Pinjaman</h3>
            <p class="text-muted mb-0">Kelola pengajuan dan status pinjaman anggota.</p>
        </div>
        <a href="{{ route('pinjaman.create') }}" class="btn btn-primary">+ Ajukan Pinjaman</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th>No.</th>
                            <th>Anggota</th>
                            <th>Jumlah Pinjaman</th>
                            <th>Bunga (%)</th>
                            <th>Tenor (Bulan)</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pinjamans as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->anggota->nama ?? '-' }}</td>
                            <td>Rp {{ number_format($item->jumlah, 0, ',', '.') }}</td>
                            <td>{{ $item->bunga }}%</td>
                            <td>{{ $item->tenor }} Bulan</td>
                            <td>
                                @if($item->status == 'pengajuan')
                                    <span class="badge text-bg-warning">Pengajuan</span>
                                @elseif($item->status == 'disetujui')
                                    <span class="badge text-bg-success">Disetujui</span>
                                @elseif($item->status == 'lunas')
                                    <span class="badge text-bg-primary">Lunas</span>
                                @else
                                    <span class="badge text-bg-danger">Ditolak</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">Belum ada data pinjaman.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
