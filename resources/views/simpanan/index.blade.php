@extends('layouts.app')
@section('title', 'Data Simpanan')
@section('page-title', 'Data Simpanan')

@section('content')
<div class="row">
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info"><div class="inner"><h4>Rp {{ number_format($totalPokok, 0, ',', '.') }}</h4><p>Simpanan Pokok</p></div><div class="icon"><i class="fas fa-coins"></i></div></div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-success"><div class="inner"><h4>Rp {{ number_format($totalWajib, 0, ',', '.') }}</h4><p>Simpanan Wajib</p></div><div class="icon"><i class="fas fa-wallet"></i></div></div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning"><div class="inner"><h4>Rp {{ number_format($totalSukarela, 0, ',', '.') }}</h4><p>Simpanan Sukarela</p></div><div class="icon"><i class="fas fa-piggy-bank"></i></div></div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-primary"><div class="inner"><h4>Rp {{ number_format($totalSemua, 0, ',', '.') }}</h4><p>Total Terverifikasi</p></div><div class="icon"><i class="fas fa-chart-line"></i></div></div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <a href="{{ route('simpanan.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Setor Simpanan</a>
    </div>
    <div class="card-body">
        <form method="GET" class="row mb-3">
            <div class="col-md-4 mb-2">
                <input name="q" value="{{ request('q') }}" class="form-control" placeholder="Cari nama anggota">
            </div>
            <div class="col-md-3 mb-2">
                <select name="jenis" class="form-control">
                    <option value="">Semua Jenis</option>
                    @foreach(['Pokok','Wajib','Sukarela'] as $jenis)
                        <option value="{{ $jenis }}" @selected(request('jenis') === $jenis)>{{ $jenis }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 mb-2">
                <select name="status" class="form-control">
                    <option value="">Semua Status</option>
                    @foreach(['Menunggu','Disetujui','Ditolak'] as $status)
                        <option value="{{ $status }}" @selected(request('status') === $status)>{{ $status }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2 mb-2"><button class="btn btn-secondary btn-block">Filter</button></div>
        </form>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead><tr><th>No</th><th>Anggota</th><th>Jenis Simpanan</th><th>Nominal</th><th>Tanggal</th><th>Status</th><th>Aksi</th></tr></thead>
                <tbody>
                @forelse($simpanan as $item)
                    <tr>
                        <td>{{ $simpanan->firstItem() + $loop->index }}</td>
                        <td>{{ $item->anggota->nama ?? 'Anggota dihapus' }}</td>
                        <td>{{ $item->jenis }}</td>
                        <td>Rp {{ number_format($item->nominal, 0, ',', '.') }}</td>
                        <td>{{ $item->tanggal->format('d-m-Y') }}</td>
                        <td>
                            <span class="badge badge-{{ $item->status === 'Disetujui' ? 'success' : ($item->status === 'Ditolak' ? 'danger' : 'warning') }}">{{ $item->status }}</span>
                        </td>
                        <td>
                            <a href="{{ route('simpanan.edit', $item) }}" class="btn btn-warning btn-sm">Edit/Verifikasi</a>
                            <form method="POST" action="{{ route('simpanan.destroy', $item) }}" class="d-inline" onsubmit="return confirm('Hapus transaksi ini?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="7" class="text-center">Belum ada transaksi simpanan.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
        {{ $simpanan->links() }}
    </div>
</div>
@endsection
