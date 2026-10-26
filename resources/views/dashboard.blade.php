@extends('layouts.app')

@section('title', 'Dashboard - KoperasiKu')
@section('page-title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-lg-4 col-12">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $totalAnggota }}</h3>
                <p>Total Anggota</p>
            </div>
            <div class="icon"><i class="fas fa-users"></i></div>
            <a href="{{ route('anggota.index') }}" class="small-box-footer">Lihat Anggota <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-4 col-12">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ number_format($totalSimpanan, 0, ',', '.') }}</h3>
                <p>Total Transaksi Simpanan</p>
            </div>
            <div class="icon"><i class="fas fa-wallet"></i></div>
            <a href="{{ route('simpanan.index') }}" class="small-box-footer">Lihat Simpanan <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-4 col-12">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $totalPengguna }}</h3>
                <p>Total Pengguna</p>
            </div>
            <div class="icon"><i class="fas fa-user"></i></div>
            <a href="#" class="small-box-footer">Pengguna Sistem</a>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <h4>Selamat Datang di KoperasiKu</h4>
        <p>Sistem informasi untuk mengelola data anggota dan transaksi simpanan koperasi.</p>
        <a href="{{ route('anggota.index') }}" class="btn btn-primary">Kelola Anggota</a>
        <a href="{{ route('simpanan.index') }}" class="btn btn-success">Kelola Simpanan</a>
    </div>
</div>
@endsection
