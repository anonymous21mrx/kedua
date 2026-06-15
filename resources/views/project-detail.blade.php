@extends('layouts.app')

@section('title', 'Detail Pilar Bisnis')
@section('content')
    <style>
        .img-detail {
            width: 100%;
            max-height: 400px;
            object-fit: contain;
        }
    </style>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm border-0" style="border-radius: 20px;">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <img class="img-detail mb-4" src="{{ asset('img/' . $project->gambar) }}" alt="{{ $project->nama_item }}">
                            <h2 class="fw-bold text-danger">{{ $project->nama_item }}</h2>
                            <span class="badge bg-secondary px-3 py-2">{{ $project->kategori }}</span>
                        </div>
                        
                        <hr>
                        
                        <div class="mt-4">
                            <h5 class="fw-bold">Deskripsi Program</h5>
                            <p class="text-muted" style="text-align: justify;">{{ $project->deskripsi }}</p>
                        </div>

                        <div class="row mt-4 bg-light p-3 rounded">
                            <div class="col-md-6">
                                <h6 class="fw-bold mb-1">Status Operasional</h6>
                                <p class="text-success small mb-0">● Aktif Nasional</p>
                            </div>
                            <div class="col-md-6">
                                <h6 class="fw-bold mb-1">Update Terakhir</h6>
                                <p class="small mb-0 text-muted">{{ date('Y') }}</p>
                            </div>
                        </div>

                        <div class="mt-5">
                            <a href="{{ route('projects') }}" class="btn btn-danger w-100 py-2">Kembali ke Daftar Project</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection