@extends('layouts.app')

@section('title', 'Profil Bisnis')

@section('content')
<div class="container mt-5">
    <div class="card border-0 shadow-sm p-5 bg-white text-center" style="border-radius: 20px;">
        <h2 class="fw-bold text-danger">Pilar Bisnis Alfamart</h2>
        <hr class="w-25 mx-auto">
        <div class="row mt-4">
            <div class="col-md-4">
                <h5 class="fw-bold">Distribusi Retail</h5>
                <p class="small">Menyediakan barang kebutuhan pokok melalui jaringan minimarket.</p>
            </div>
            <div class="col-md-4">
                <h5 class="fw-bold">Layanan Digital</h5>
                <p class="small">Top up e-money, pembayaran tagihan, dan pemesanan tiket.</p>
            </div>
            <div class="col-md-4">
                <h5 class="fw-bold">Keanggotaan</h5>
                <p class="small">Program loyalitas Ponta untuk keuntungan maksimal pelanggan.</p>
            </div>
        </div>
    </div>
</div>
@endsection