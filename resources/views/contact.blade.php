@extends('layouts.app')

@section('title', 'Kontak Perusahaan')

@section('content')
<div class="container mt-5">
    <h2 class="text-center fw-bold mb-5">Kontak Resmi Alfamart</h2>
    <div class="row">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm p-4">
                <h5 class="fw-bold text-danger">Kantor Pusat</h5>
                <p>Alfa Tower, Lt. 10-12<br>Jl. Jalur Sutera Barat Kav. 7-9, Alam Sutera, Tangerang, Banten</p>
                
                <h5 class="fw-bold text-danger mt-4">Layanan Konsumen</h5>
                <p><strong>Alfacare:</strong> 1500 959<br>
                <strong>Email:</strong> alfacare@sat.co.id<br>
                <strong>WhatsApp:</strong> 0811 1500 959</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-0 shadow-sm p-4 bg-light text-center">
                <h5 class="fw-bold">Media Sosial</h5>
                <p>Ikuti kabar terbaru seputar promo dan kegiatan perusahaan melalui kanal resmi kami.</p>
                <div class="d-grid gap-2">
                    <a href="#" class="btn btn-primary">Facebook Alfamart</a>
                    <a href="#" class="btn btn-info text-white">Twitter @alfamart</a>
                    <a href="#" class="btn btn-danger">Instagram @alfamart</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection