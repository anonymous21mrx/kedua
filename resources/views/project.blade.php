@extends('layouts.app')

@section('title', 'Projects')
@section('content')
    <style>
        .card-img-top {
            width: 100%;
            height: 200px;
            object-fit: cover;
            object-position: center;
        }
    </style>
    <div class="container">
        <h2 class="text-center mt-5 mb-4">Pilar Bisnis & Program Alfamart</h2>
        <div class="row text-center">
            @forelse($projects as $project)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm border-0" style="border-radius: 15px;">
                        <!-- Memanggil gambar dari folder public/img -->
                        <img class="card-img-top p-3" src="{{ asset('img/' . $project->gambar) }}"
                            alt="{{ $project->nama_item }}" style="border-radius: 25px;">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">{{ $project->nama_item }}</h5>
                            <p class="card-text text-muted small">{{ Str::limit($project->deskripsi, 100) }}</p>
                            <a href="{{ route('projects.show', $project->id) }}" class="btn btn-danger px-4">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">Data pilar bisnis belum tersedia.</p>
            @endforelse
            
            <!-- Bagian Navigasi Halaman (Pagination) -->
            <div class="d-flex justify-content-center mt-4">
                {{ $projects->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection