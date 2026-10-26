@extends('layouts.app')

@section('content')
<div style="padding:30px;max-width:1000px;margin:auto">
    <h1 style="font-size:30px;font-weight:700;margin-bottom:8px">Edit Anggota</h1>
    <p style="color:#64748b;margin-bottom:24px">Perbarui informasi anggota KoperasiKu.</p>

    @if ($errors->any())
        <div style="background:#fee2e2;color:#991b1b;padding:14px;border-radius:8px;margin-bottom:18px">
            <ul style="margin:0;padding-left:20px">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('anggota.update', ['anggota' => $anggota->id]) }}" method="POST"
          style="background:white;padding:24px;border-radius:10px;box-shadow:0 2px 8px #0001">
        @csrf
        @method('PUT')

        <div style="display:grid;grid-template-columns:1fr 1fr;gap:20px">
            <div>
                <label>Nomor Anggota</label>
                <input name="nomor_anggota" value="{{ old('nomor_anggota', $anggota->nomor_anggota) }}" required
                       style="display:block;width:100%;padding:12px;margin:8px 0 16px;border:1px solid #cbd5e1;border-radius:7px">
            </div>
            <div>
                <label>NIK (16 digit)</label>
                <input name="nik" value="{{ old('nik', $anggota->nik) }}" required maxlength="16"
                       style="display:block;width:100%;padding:12px;margin:8px 0 16px;border:1px solid #cbd5e1;border-radius:7px">
            </div>
            <div>
                <label>Nama Lengkap</label>
                <input name="nama" value="{{ old('nama', $anggota->nama) }}" required
                       style="display:block;width:100%;padding:12px;margin:8px 0 16px;border:1px solid #cbd5e1;border-radius:7px">
            </div>
            <div>
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" required
                        style="display:block;width:100%;padding:12px;margin:8px 0 16px;border:1px solid #cbd5e1;border-radius:7px">
                    <option value="L" @selected(old('jenis_kelamin', $anggota->jenis_kelamin) == 'L')>Laki-laki</option>
                    <option value="P" @selected(old('jenis_kelamin', $anggota->jenis_kelamin) == 'P')>Perempuan</option>
                </select>
            </div>
            <div>
                <label>Nomor Telepon</label>
                <input name="no_telepon" value="{{ old('no_telepon', $anggota->no_telepon) }}" required
                       style="display:block;width:100%;padding:12px;margin:8px 0 16px;border:1px solid #cbd5e1;border-radius:7px">
            </div>
            <div>
                <label>Tanggal Daftar</label>
                <input type="date" name="tanggal_daftar"
                       value="{{ old('tanggal_daftar', $anggota->tanggal_daftar) }}" required
                       style="display:block;width:100%;padding:12px;margin:8px 0 16px;border:1px solid #cbd5e1;border-radius:7px">
            </div>
            <div style="grid-column:1/-1">
                <label>Alamat</label>
                <textarea name="alamat" required rows="3"
                          style="display:block;width:100%;padding:12px;margin:8px 0 16px;border:1px solid #cbd5e1;border-radius:7px">{{ old('alamat', $anggota->alamat) }}</textarea>
            </div>
            <div>
                <label>Status</label>
                <select name="status" required
                        style="display:block;width:100%;padding:12px;margin:8px 0 16px;border:1px solid #cbd5e1;border-radius:7px">
                    <option value="aktif" @selected(old('status', $anggota->status) == 'aktif')>Aktif</option>
                    <option value="nonaktif" @selected(old('status', $anggota->status) == 'nonaktif')>Nonaktif</option>
                </select>
            </div>
        </div>

        <button type="submit" style="background:#087fce;color:white;padding:12px 20px;border:0;border-radius:7px;cursor:pointer">
            Simpan Perubahan
        </button>
        <a href="{{ route('anggota.index') }}" style="margin-left:12px;color:#475569">Batal</a>
    </form>
</div>
@endsection
