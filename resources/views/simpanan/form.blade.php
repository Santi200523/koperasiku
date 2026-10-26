@extends('layouts.app')
@section('title', 'Form Simpanan')
@section('page-title', isset($simpanan) ? 'Edit / Verifikasi Simpanan' : 'Setor Simpanan')

@section('content')
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ isset($simpanan) ? route('simpanan.update', $simpanan) : route('simpanan.store') }}">
            @csrf
            @if(isset($simpanan)) @method('PUT') @endif

            <div class="form-group">
                <label>Anggota *</label>
                <select name="anggota_id" class="form-control" required>
                    <option value="">-- Pilih Anggota --</option>
                    @foreach($anggota as $a)
                        <option value="{{ $a->id }}" @selected(old('anggota_id', $simpanan->anggota_id ?? '') == $a->id)>
                            {{ $a->no_anggota }} - {{ $a->nama }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Jenis Simpanan *</label>
                <select name="jenis" class="form-control" required>
                    @foreach(['Pokok','Wajib','Sukarela'] as $jenis)
                        <option value="{{ $jenis }}" @selected(old('jenis', $simpanan->jenis ?? '') === $jenis)>{{ $jenis }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Nominal (Rp) *</label>
                <input type="number" min="1" name="nominal" class="form-control" value="{{ old('nominal', $simpanan->nominal ?? '') }}" required>
            </div>
            <div class="form-group">
                <label>Tanggal *</label>
                <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', isset($simpanan) ? $simpanan->tanggal->format('Y-m-d') : date('Y-m-d')) }}" required>
            </div>
            @if(isset($simpanan))
                <div class="form-group">
                    <label>Status / Verifikasi</label>
                    <select name="status" class="form-control" required>
                        @foreach(['Menunggu','Disetujui','Ditolak'] as $status)
                            <option value="{{ $status }}" @selected(old('status', $simpanan->status) === $status)>{{ $status }}</option>
                        @endforeach
                    </select>
                </div>
            @endif
            <button class="btn btn-primary">Simpan</button>
            <a href="{{ route('simpanan.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
