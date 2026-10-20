@extends('layouts.koperasi')

@section('title', 'Data Anggota - KoperasiKu')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="mb-1">Data Anggota</h3>
            <p class="text-muted mb-0">Kelola informasi dan status keanggotaan KoperasiKu.</p>
        </div>
        <a href="{{ route('anggota.create') }}" class="btn btn-primary">
            + Tambah Anggota
        </a>
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
                            <th>No. Anggota</th>
                            <th>Nama</th>
                            <th>No. HP</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($anggotas ?? [] as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->no_anggota }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->no_hp }}</td>
                            <td>
                                @if($item->status === 'aktif')
                                    <span class="badge text-bg-success">Aktif</span>
                                @else
                                    <span class="badge text-bg-secondary">Nonaktif</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('anggota.show', $item) }}" class="btn btn-sm btn-info text-white">Detail</a>
                                <a href="{{ route('anggota.edit', $item) }}" class="btn btn-sm btn-warning">Edit</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">
                                Belum ada data anggota. Silakan tambahkan anggota baru.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
