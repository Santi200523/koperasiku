@extends('layouts.app')
@section('title', 'Data Anggota')
@section('page-title', 'Data Anggota')

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ route('anggota.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Anggota</a>
        <form method="GET" class="float-right">
            <div class="input-group">
                <input name="q" value="{{ request('q') }}" class="form-control" placeholder="Cari nama atau nomor anggota">
                <div class="input-group-append"><button class="btn btn-secondary"><i class="fas fa-search"></i></button></div>
            </div>
        </form>
    </div>
    <div class="card-body table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr><th>No</th><th>No. Anggota</th><th>Nama</th><th>No. HP</th><th>Status</th><th>Aksi</th></tr>
            </thead>
            <tbody>
            @forelse($anggota as $item)
                <tr>
                    <td>{{ $anggota->firstItem() + $loop->index }}</td>
                    <td>{{ $item->nomor_anggota }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->no_telepon ?? '-' }}</td>
                    <td><span class="badge badge-{{ $item->status === 'Aktif' ? 'success' : 'secondary' }}">{{ $item->status }}</span></td>
                    <td>
                        <a href="{{ route('anggota.edit', $item) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form method="POST" action="{{ route('anggota.destroy', $item) }}" class="d-inline" onsubmit="return confirm('Hapus anggota ini?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" class="text-center">Belum ada data anggota.</td></tr>
            @endforelse
            </tbody>
        </table>
        {{ $anggota->links() }}
    </div>
</div>
@endsection
