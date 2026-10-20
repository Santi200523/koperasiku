@extends('layouts.koperasi')

@section('title', 'Angsuran dan Laporan - KoperasiKu')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="mb-1">Angsuran dan Laporan</h3>
            <p class="text-muted mb-0">Kelola pembayaran cicilan, tunggakan, dan rekapitulasi transaksi.</p>
        </div>
        <a href="{{ route('angsuran.create') }}" class="btn btn-primary">+ Bayar Angsuran</a>
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
                            <th>Angsuran Ke</th>
                            <th>Jatuh Tempo</th>
                            <th>Tagihan</th>
                            <th>Jumlah Bayar</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($angsurans as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->pinjaman->anggota->nama ?? '-' }}</td>
                            <td>Ke-{{ $item->angsuran_ke }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->jatuh_tempo)->format('d-m-Y') }}</td>
                            <td>Rp {{ number_format($item->jumlah_tagihan, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($item->jumlah_bayar, 0, ',', '.') }}</td>
                            <td><span class="badge text-bg-success">{{ ucfirst(str_replace('_', ' ', $item->status)) }}</span></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">Belum ada data pembayaran angsuran.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
