@extends('layouts.koperasi')

@section('title', 'Data Simpanan - KoperasiKu')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="mb-1">Data Simpanan</h3>
            <p class="text-muted mb-0">Kelola simpanan pokok, wajib, dan sukarela anggota.</p>
        </div>
        <a href="{{ route('simpanan.create') }}" class="btn btn-primary">+ Setor Simpanan</a>
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
                            <th>Jenis Simpanan</th>
                            <th>Nominal</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($simpanans as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->anggota->nama ?? '-' }}</td>
                            <td><span class="badge text-bg-info text-capitalize">{{ $item->jenis }}</span></td>
                            <td>Rp {{ number_format($item->nominal, 0, ',', '.') }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                            <td><span class="badge text-bg-success">{{ ucfirst($item->status) }}</span></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">Belum ada data simpanan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
