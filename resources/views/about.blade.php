@extends('layouts.app')

@section('title', 'Tentang Kami')

@section('content')
<div class="container mt-5">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h2 class="fw-bold text-danger">Tentang Alfamart</h2>
            <p class="mt-3">
                Alfamart adalah jaringan minimarket terkemuka di Indonesia yang menyediakan kebutuhan pokok sehari-hari dengan harga terjangkau. Kami berkomitmen untuk memberikan pelayanan terbaik bagi masyarakat.
            </p>
            <h5 class="fw-bold mt-4">Visi Kami</h5>
            <p>Menjadi jaringan distribusi retail terkemuka yang dimiliki oleh masyarakat luas dan berorientasi kepada pemberdayaan pengusaha kecil.</p>
        </div>
        <div class="col-md-6">
    <!-- Menggunakan gambar lokal yang sudah ada di folder public/img -->
    <img src="{{ asset('img/kantor.jpg') }}" class="img-fluid rounded shadow" alt="Tentang Alfamart">
</div>
    </div>
</div>
@endsection