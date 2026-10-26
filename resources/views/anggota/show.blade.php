<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Anggota</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f3f4f6; padding: 30px; }
        .card { max-width: 700px; margin: auto; background: white; padding: 25px; border-radius: 12px; }
        h2 { color: #1e3a8a; }
        .item { padding: 10px 0; border-bottom: 1px solid #eee; }
        a, button { display: inline-block; padding: 10px 15px; border: 0; border-radius: 6px; text-decoration: none; cursor: pointer; }
        .back { background: #e5e7eb; color: #111827; }
        .edit { background: #2563eb; color: white; }
    </style>
</head>
<body>
<div class="card">
    <h2>Detail Anggota</h2>
    <div class="item"><b>Nomor Anggota:</b> {{ $anggota->nomor_anggota }}</div>
    <div class="item"><b>NIK:</b> {{ $anggota->nik }}</div>
    <div class="item"><b>Nama:</b> {{ $anggota->nama }}</div>
    <div class="item"><b>Jenis Kelamin:</b> {{ $anggota->jenis_kelamin }}</div>
    <div class="item"><b>No. Telepon:</b> {{ $anggota->no_telepon }}</div>
    <div class="item"><b>Alamat:</b> {{ $anggota->alamat }}</div>
    <div class="item"><b>Tanggal Daftar:</b> {{ $anggota->tanggal_daftar }}</div>
    <div class="item"><b>Status:</b> {{ $anggota->status }}</div>
    <br>
    <a class="back" href="{{ route('anggota.index') }}">Kembali</a>
    <a class="edit" href="{{ route('anggota.edit', $anggota->id) }}">Edit Anggota</a>
</div>
</body>
</html>
