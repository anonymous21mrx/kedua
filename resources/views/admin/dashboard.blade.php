@extends('layouts.admin')

@section('title', 'Dashboard Utama')

@section('content')
<div class="mb-4">
    <h2 class="fw-bold text-dark mb-1">Dashboard</h2>
    <p class="text-muted">Berikut adalah ringkasan pengelolaan data website company profile saat ini.</p>
</div>

<div class="row g-4">
    <div class="col-12 col-sm-6 col-xl-4">
        <div class="card border-0 shadow-sm p-3" style="border-radius: 15px;">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <h6 class="text-muted small text-uppercase fw-bold mb-1">Total Layanan / Pilar</h6>
                    <h3 class="fw-bold text-dark mb-0">{{ $jumlahLayanan }}</h3>
                </div>
                <div class="p-3 bg-primary bg-opacity-10 text-primary rounded-3 fs-3">
                    🛍️
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl-4">
        <div class="card border-0 shadow-sm p-3" style="border-radius: 15px;">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <h6 class="text-muted small text-uppercase fw-bold mb-1">Artikel / Kabar Toko</h6>
                    <h3 class="fw-bold text-dark mb-0">{{ $jumlahBerita }}</h3>
                </div>
                <div class="p-3 bg-success bg-opacity-10 text-success rounded-3 fs-3">
                    📰
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl-4">
        <div class="card border-0 shadow-sm p-3" style="border-radius: 15px;">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <h6 class="text-muted small text-uppercase fw-bold mb-1">Akun Admin Active</h6>
                    <h3 class="fw-bold text-dark mb-0">{{ $jumlahAdmin }}</h3>
                </div>
                <div class="p-3 bg-danger bg-opacity-10 text-danger rounded-3 fs-3">
                    👤
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm p-4 mt-5" style="border-radius: 15px; background: white;">
    <h5 class="fw-bold text-dark mb-3">Sistem Informasi Manajemen</h5>
    <p class="text-secondary mb-0" style="line-height: 1.6;">
        Gunakan menu di sebelah kiri untuk menambah, mengubah, atau menghapus informasi publik pada halaman utama company profile. Seluruh perubahan data akan langsung ter-update secara real-time pada sisi aplikasi client/frontend.
    </p>
</div>
@endsection