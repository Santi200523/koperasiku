<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'KoperasiKu')</title>
    <!-- Bootstrap 5 CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background-color: #f4f6f9; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .sidebar { min-height: 100vh; background: #131d2e; color: #fff; position: fixed; top: 0; left: 0; width: 260px; z-index: 100; transition: all 0.3s; }
        .sidebar .brand { font-size: 1.35rem; font-weight: 700; padding: 1.5rem 1.25rem; background: #0c1322; color: #0ea5e9; display: flex; align-items: center; gap: 10px; }
        .sidebar .nav-link { color: #94a3b8; padding: 0.85rem 1.25rem; margin: 0.25rem 0.75rem; border-radius: 0.5rem; font-weight: 500; font-size: 0.95rem; transition: all 0.2s; display: flex; align-items: center; gap: 12px; }
        .sidebar .nav-link:hover, .sidebar .nav-link.active { color: #fff; background-color: #0284c7; }
        .sidebar .nav-link i { font-size: 1.15rem; }
        .main-content { margin-left: 260px; padding: 2rem; }
        .divisi-badge { font-size: 0.75rem; padding: 0.25rem 0.6rem; border-radius: 20px; text-transform: uppercase; letter-spacing: 0.5px; }
        @media (max-width: 768px) {
            .sidebar { width: 100%; position: relative; min-height: auto; }
            .main-content { margin-left: 0; padding: 1rem; }
        }
    </style>
</head>
<body>

    <!-- Sidebar Menu per Divisi -->
    <div class="sidebar d-flex flex-column justify-content-between">
        <div>
            <div class="brand">
                <i class="bi bi-bank2"></i> KoperasiKu
            </div>
            
            <ul class="nav flex-column mt-3">
                @php $divisi = Auth::user()->divisi ?? 'admin'; @endphp

                {{-- Menu khusus Admin --}}
                @if(in_array($divisi, ['admin']))
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('anggota.*') ? 'active' : '' }}" href="{{ route('anggota.index') }}">
                        <i class="bi bi-people-fill"></i> Data Anggota
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}" href="{{ route('users.index') }}">
                        <i class="bi bi-person-gear"></i> Manajemen User
                    </a>
                </li>
                @endif

                {{-- Menu untuk Admin, Bendahara, Kasir --}}
                @if(in_array($divisi, ['admin', 'bendahara', 'kasir']))
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('simpanan.*') ? 'active' : '' }}" href="{{ route('simpanan.index') }}">
                        <i class="bi bi-piggy-bank-fill"></i> Simpanan
                    </a>
                </li>
                @endif

                {{-- Menu untuk Admin dan Bendahara --}}
                @if(in_array($divisi, ['admin', 'bendahara']))
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('pinjaman.*') ? 'active' : '' }}" href="{{ route('pinjaman.index') }}">
                        <i class="bi bi-cash-coin"></i> Pinjaman
                    </a>
                </li>
                @endif

                {{-- Menu untuk Semua Divisi --}}
                @if(in_array($divisi, ['admin', 'bendahara', 'kasir']))
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('angsuran.*') ? 'active' : '' }}" href="{{ route('angsuran.index') }}">
                        <i class="bi bi-receipt-cutoff"></i> Angsuran & Laporan
                    </a>
                </li>
                @endif
            </ul>
        </div>

        <div class="p-3 border-top border-secondary">
            <div class="d-flex align-items-center justify-content-between text-white mb-2">
                <div class="text-truncate">
                    <div class="fw-bold text-white small"><i class="bi bi-person-circle me-1"></i> {{ Auth::user()->name ?? 'User' }}</div>
                    <span class="badge bg-info text-dark divisi-badge mt-1">{{ ucfirst(Auth::user()->divisi ?? 'Admin') }}</span>
                </div>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-danger btn-sm w-100 fw-semibold mt-2">
                    <i class="bi bi-box-arrow-right"></i> Keluar
                </button>
            </form>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
