@extends('layouts.app')
@section('title', $item->exists ? 'Edit Anggota' : 'Tambah Anggota')
@section('page-title', $item->exists ? 'Edit Anggota' : 'Tambah Anggota')

@section('content')
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ $item->exists ? route('anggota.update', $item) : route('anggota.store') }}">
            @csrf
            @if($item->exists) @method('PUT') @endif

            <div class="form-group">
                <label>Nomor Anggota *</label>
                <input name="nomor_anggota" class="form-control" value="{{ old('nomor_anggota', $item->nomor_anggota) }}" required>
            </div>
            <div class="form-group">
                <label>Nama Lengkap *</label>
                <input name="nama" class="form-control" value="{{ old('nama', $item->nama) }}" required>
            </div>
            <div class="form-group">
                <label>NIK</label>
                <input name="nik" class="form-control" value="{{ old('nik', $item->nik) }}">
            </div>
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control">
                    <option value="">-- Pilih --</option>
                    <option value="Laki-laki" @selected(old('jenis_kelamin', $item->jenis_kelamin) === 'Laki-laki')>Laki-laki</option>
                    <option value="Perempuan" @selected(old('jenis_kelamin', $item->jenis_kelamin) === 'Perempuan')>Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control">{{ old('alamat', $item->alamat) }}</textarea>
            </div>
            <div class="form-group">
                <label>Nomor HP</label>
                <input name="no_telepon" class="form-control" value="{{ old('no_telepon', $item->no_telepon) }}">
            </div>
            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control" required>
                    <option value="Aktif" @selected(old('status', $item->status ?? 'Aktif') === 'Aktif')>Aktif</option>
                    <option value="Nonaktif" @selected(old('status', $item->status) === 'Nonaktif')>Nonaktif</option>
                </select>
            </div>
            <button class="btn btn-primary">Simpan</button>
            <a href="{{ route('anggota.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
