<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Admin Alfamart</title>
    <link rel="stylesheet" href="{{ asset('Bootstrap/css/bootstrap.min.css') }}">
    <style>
        body { background-color: #f4f6f9; font-family: 'Segoe UI', sans-serif; }
        .sidebar { height: 100vh; background: #212529; color: white; position: fixed; width: 260px; padding-top: 20px; }
        .sidebar .nav-link { color: rgba(255,255,255,0.75); display: block; padding: 12px 20px; text-decoration: none; font-weight: 500; }
        .sidebar .nav-link:hover, .sidebar .nav-link.active { color: white; background: #dc3545; border-radius: 0 25px 25px 0; }
        .main-content { margin-left: 260px; padding: 40px; }
        .navbar-custom { background: white; box-shadow: 0 2px 10px rgba(0,0,0,0.05); padding: 15px 40px; margin-left: 260px; }
    </style>
</head>
<body>

<div class="sidebar">
    <div class="px-4 mb-4">
        <h4 class="fw-bold text-white mb-0">Alfamart Admin</h4>
        <small class="text-muted">Panel Administrator</small>
    </div>
    <hr class="border-secondary">
    <nav class="mt-3">
        <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}">📊 Dashboard</a>
        
        <a href="#" class="nav-link">📰 Kelola Berita / Artikel</a>
        
        <a href="{{ route('admin.layanan.index') }}" class="nav-link {{ Request::is('admin/layanan*') ? 'active' : '' }}">🛍️ Kelola Produk / Layanan</a>
        
        <a href="{{ route('home') }}" target="_blank" class="nav-link">🌐 Lihat Website Utama</a>
    </nav>
</div>

<div class="navbar-custom d-flex justify-content-between align-items-center">
    <div class="fw-semibold text-secondary">
        Selamat Datang, <span class="text-dark fw-bold">{{ session('admin_name', 'Admin') }}</span>
    </div>
    <div>
        <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Apakah anda yakin ingin keluar sistem?')">
            @csrf
            <button type="submit" class="btn btn-outline-danger btn-sm px-3 fw-bold" style="border-radius: 8px;">
                🚪 Keluar / Logout
            </button>
        </form>
    </div>
</div>

<div class="main-content">
    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm mb-4" style="border-radius: 10px;">
            {{ session('success') }}
        </div>
    @endif

    @yield('content')
</div>

<script src="{{ asset('Bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>