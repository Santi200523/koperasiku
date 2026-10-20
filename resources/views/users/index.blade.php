@extends('layouts.koperasi')

@section('title', 'Manajemen User - KoperasiKu')

@section('content')
<div class="container-fluid px-4 py-3">
    <!-- Header Page Kontras Gelap -->
    <div class="d-flex justify-content-between align-items-center mb-4 p-4 rounded-4 shadow-sm" style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); border-left: 5px solid #0ea5e9;">
        <div>
            <h2 class="fw-bold mb-1 text-white"><i class="bi bi-person-gear me-2 text-info"></i> Manajemen User</h2>
            <p class="mb-0 text-slate-300" style="color: #cbd5e1;">Kelola hak akses dan akun pengguna aplikasi KoperasiKu.</p>
        </div>
        <div>
            <span class="badge bg-info text-dark px-3 py-2 rounded-pill fw-semibold shadow-sm">
                <i class="bi bi-shield-check me-1"></i> RBAC Active
            </span>
        </div>
    </div>

    <!-- Tabel Card -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="card-header bg-white py-3 px-4 border-0 d-flex justify-content-between align-items-center">
            <h5 class="fw-bold text-dark m-0"><i class="bi bi-table me-2 text-primary"></i> Daftar Pengguna Sistem</h5>
            <span class="text-muted small">Total: {{ $users->count() ?? 1 }} User Terdaftar</span>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="text-uppercase fs-7 text-white" style="background-color: #0f172a; letter-spacing: 0.5px;">
                    <tr>
                        <th class="py-3 px-4 text-center" style="width: 70px;">No.</th>
                        <th class="py-3 px-4">Nama Pengguna</th>
                        <th class="py-3 px-4">Email</th>
                        <th class="py-3 px-4 text-center">Divisi / Role</th>
                        <th class="py-3 px-4 text-center" style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users ?? [] as $index => $user)
                    <tr>
                        <td class="text-center fw-bold text-muted px-4">{{ $index + 1 }}</td>
                        <td class="px-4">
                            <div class="d-flex align-items-center">
                                <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center me-3 fw-bold" style="width: 40px; height: 40px;">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>
                                <div>
                                    <span class="fw-bold text-dark d-block">{{ $user->name }}</span>
                                    <small class="text-muted">Pengguna Sistem</small>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 text-secondary">{{ $user->email }}</td>
                        <td class="text-center px-4">
                            <span class="badge bg-primary bg-gradient px-3 py-2 rounded-pill shadow-xs text-uppercase fw-semibold" style="font-size: 0.75rem;">
                                <i class="bi bi-star-fill me-1 text-warning"></i> {{ $user->divisi ?? $user->role ?? 'Admin' }}
                            </span>
                        </td>
                        <td class="text-center px-4">
                            <button class="btn btn-sm btn-light text-primary border me-1" title="Edit">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                            <button class="btn btn-sm btn-light text-danger border" title="Hapus">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="text-center fw-bold text-muted px-4">1</td>
                        <td class="px-4">
                            <div class="d-flex align-items-center">
                                <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center me-3 fw-bold" style="width: 40px; height: 40px;">
                                    S
                                </div>
                                <div>
                                    <span class="fw-bold text-dark d-block">Santi Admin</span>
                                    <small class="text-muted">Administrator Utama</small>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 text-secondary">sanjayasanti99@gmail.com</td>
                        <td class="text-center px-4">
                            <span class="badge bg-primary bg-gradient px-3 py-2 rounded-pill shadow-xs text-uppercase fw-semibold" style="font-size: 0.75rem;">
                                <i class="bi bi-star-fill me-1 text-warning"></i> Admin
                            </span>
                        </td>
                        <td class="text-center px-4">
                            <button class="btn btn-sm btn-light text-primary border me-1" title="Edit">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                            <button class="btn btn-sm btn-light text-danger border" title="Hapus">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
