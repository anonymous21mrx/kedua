@extends('layouts.app')

@section('title', 'Detail Berita')
@section('content')
    <style>
        .card-img-top {
            width: 100%;
            max-height: 500px;
            object-fit: contain;
            background-color: #f8f9fa;
        }
    </style>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-sm border-0" style="border-radius: 20px; overflow: hidden;">
                    <!-- Gambar Berita -->
                    <img class="card-img-top p-3" src="{{ asset('img/' . $berita->gambar) }}" alt="{{ $berita->headline }}">
                    
                    <div class="card-body p-5">
                        <div class="mb-3">
                            <span class="badge bg-danger px-3 py-2">Berita Terbaru</span>
                            <small class="text-muted ms-2">{{ $berita->created_at->format('d F Y') }}</small>
                        </div>
                        
                        <h1 class="fw-bold mb-4">{{ $berita->headline }}</h1>
                        <p class="text-muted">Penulis: <strong>{{ $berita->penulis }}</strong></p>
                        <hr>

                        <div class="mt-4" style="line-height: 1.8; font-size: 1.1rem;">
                            <p class="card-text">{{ $berita->isi_kabar }}</p>
                        </div>

                        <div class="mt-5">
                            <a href="{{ url('/') }}" class="btn btn-outline-danger px-5">Kembali ke Beranda</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection