@extends('layouts.app')

@section('title', 'Profile Perusahaan')

@section('content')
<header class="bg-danger text-white text-center py-5 shadow-sm">
    <div class="container">
        <h1 class="fw-bold">Profil PT Sumber Alfaria Trijaya Tbk</h1>
        <p class="lead">Menjadi jaringan distribusi retail terkemuka yang berorientasi kepada pemberdayaan pengusaha kecil.</p>
    </div>
</header>

<div class="container mt-5">
    <h2 class="text-center fw-bold mb-4">Pilar Bisnis & Program Utama</h2>
    <div class="row justify-content-center">
        @foreach($semuaPilar as $pilar)
        <div class="col-md-4 mb-4 text-center">
            <div class="card border-0 h-100 shadow-sm mx-1" style="border-radius: 15px;">
                <div class="p-4">
                    <img src="{{ asset('assets/images/' . $pilar->gambar) }}" class="img-fluid mb-3" style="max-height: 80px;" alt="{{ $pilar->nama_item }}">
                    <h5 class="fw-bold text-danger">{{ $pilar->nama_item }}</h5>
                    <p class="small text-muted">{{ Str::limit($pilar->deskripsi, 50) }}</p>
                    <a href="{{ route('projects.show', $pilar->id) }}" class="btn btn-outline-danger btn-sm mt-2">Lihat Detail</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center mt-3 mb-5">
        {{ $semuaPilar->appends([
            'beritaPage' => $semuaBerita->currentPage(),
            'promoPage' => $semuaPromo->currentPage()
        ])->links('pagination::bootstrap-5') }}
    </div>

    <hr class="my-5">

    <h2 class="text-center fw-bold mb-4">Berita Terbaru Alfamart</h2>
    <div class="row justify-content-center">
        @foreach($semuaBerita as $berita)
        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm h-100 overflow-hidden mx-1" style="border-radius: 15px;">
                <img src="{{ asset('img/' . $berita->gambar) }}" class="card-img-top" alt="{{ $berita->headline }}" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <small class="text-danger fw-bold">{{ $berita->created_at->format('d M Y') }}</small>
                    <h6 class="fw-bold mt-2">{{ $berita->headline }}</h6>
                    <p class="small text-muted mb-3">{{ Str::limit($berita->isi_kabar, 80) }}</p>
                    <div class="d-grid">
                        <a href="{{ route('berita.show', $berita->id) }}" class="btn btn-outline-danger btn-sm">Lihat Detail</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center mt-3 mb-5">
        {{ $semuaBerita->appends([
            'pilarPage' => $semuaPilar->currentPage(),
            'promoPage' => $semuaPromo->currentPage()
        ])->links('pagination::bootstrap-5') }}
    </div>

    <hr class="my-5">

    <h2 class="text-center fw-bold mb-4">Katalog Promo Alfamart</h2>
    <div class="row justify-content-center">
        @foreach($semuaPromo as $promo)
        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm h-100 overflow-hidden mx-1" style="border-radius: 15px; border: 2px solid #ffc107 !important;">
                <div class="position-absolute bg-warning text-dark fw-bold px-3 py-1" style="border-bottom-left-radius: 15px; right: 0; z-index: 1;">
                    {{ $promo->nama_item }}
                </div>
                
                <img src="{{ asset('assets/images/' . $promo->gambar) }}" class="card-img-top" alt="Promo" style="height: 250px; object-fit: contain; background: #fff;">
                
                <div class="card-body text-center">
                    <h5 class="fw-bold text-danger">{{ $promo->nama_item }}</h5>
                    <p class="small text-muted">{{ Str::limit($promo->deskripsi, 60) }}</p>
                    <div class="d-grid">
                        <a href="{{ route('projects.show', $promo->id) }}" class="btn btn-warning btn-sm fw-bold">Lihat Katalog Lengkap</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center mt-3 mb-5">
        {{ $semuaPromo->appends([
            'pilarPage' => $semuaPilar->currentPage(),
            'beritaPage' => $semuaBerita->currentPage()
        ])->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection