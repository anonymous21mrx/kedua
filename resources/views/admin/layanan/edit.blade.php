@extends('layouts.admin')

@section('title', 'Edit Data Layanan')

@section('content')
<style>
    .btn-back {
        display: inline-block;
        padding: 8px 16px;
        font-size: 14px;
        font-weight: 600;
        color: #6c757d;
        text-decoration: none;
        border: 1px solid #ced4da;
        border-radius: 8px;
        background: #ffffff;
        transition: 0.2s;
        margin-bottom: 20px;
    }
    .btn-back:hover {
        background: #f8f9fa;
        color: #212529;
    }
    .form-title {
        font-size: 26px;
        font-weight: 700;
        color: #212529;
        margin: 0 0 5px 0;
    }
    .form-subtitle {
        font-size: 14px;
        color: #6c757d;
        margin: 0 0 25px 0;
    }
    .card-custom {
        background: #ffffff;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        padding: 35px;
        box-sizing: border-box;
    }
    .form-group-custom {
        margin-bottom: 22px;
    }
    .label-custom {
        display: block;
        font-size: 13px;
        font-weight: 600;
        color: #495057;
        margin-bottom: 8px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .input-custom {
        display: block;
        width: 100%;
        padding: 12px 16px;
        font-size: 15px;
        color: #212529;
        background-color: #ffffff;
        border: 1px solid #ced4da;
        border-radius: 8px;
        box-sizing: border-box;
        transition: all 0.2s ease-in-out;
    }
    .input-custom:focus {
        border-color: #dc3545;
        outline: 0;
        box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.15);
    }
    .img-preview {
        display: block;
        width: 120px;
        height: 90px;
        object-fit: cover;
        border-radius: 8px;
        margin-top: 10px;
        border: 1px solid #dee2e6;
    }
    .error-custom {
        color: #dc3545;
        font-size: 13px;
        font-weight: 600;
        margin-top: 6px;
        display: block;
    }
    .divider-custom {
        border: 0;
        border-top: 1px solid #dee2e6;
        margin: 30px 0;
    }
    .btn-group-custom {
        display: flex;
        gap: 12px;
    }
    .btn-submit-custom {
        padding: 12px 28px;
        font-size: 15px;
        font-weight: 700;
        color: #ffffff;
        background-color: #ffc107; /* Warna Kuning Edit */
        color: #000000;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: 0.2s;
    }
    .btn-submit-custom:hover {
        background-color: #e0a800;
    }
    .btn-cancel-custom {
        padding: 12px 28px;
        font-size: 15px;
        font-weight: 700;
        color: #495057;
        background-color: #efefef;
        border: none;
        border-radius: 8px;
        text-decoration: none;
        transition: 0.2s;
        display: inline-block;
        text-align: center;
    }
    .btn-cancel-custom:hover {
        background-color: #e2e6ea;
    }
</style>

<div>
    <a href="{{ route('admin.layanan.index') }}" class="btn-back">
        ← Kembali ke Tabel
    </a>
    <h2 class="form-title">Ubah Data Produk & Layanan</h2>
    <p class="form-subtitle">Ubah informasi detail mengenai pilar bisnis atau katalog promo Alfamart.</p>
</div>

<div class="card-custom">
    <form action="{{ route('admin.layanan.update', $layanan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group-custom">
            <label for="nama_item" class="label-custom">Nama Layanan / Produk</label>
            <input type="text" name="nama_item" id="nama_item" class="input-custom @error('nama_item') is-invalid-custom @enderror" value="{{ old('nama_item', $layanan->nama_item) }}">
            @error('nama_item')
                <span class="error-custom">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group-custom">
            <label for="kategori" class="label-custom">Kategori Data</label>
            <select name="kategori" id="kategori" class="input-custom" style="height: 48px;">
                <option value="Pilar Utama" {{ old('kategori', $layanan->kategori) == 'Pilar Utama' ? 'selected' : '' }}>Pilar Utama</option>
                <option value="Program" {{ old('kategori', $layanan->kategori) == 'Program' ? 'selected' : '' }}>Program</option>
                <option value="Promo" {{ old('kategori', $layanan->kategori) == 'Promo' ? 'selected' : '' }}>Promo / Katalog</option>
            </select>
        </div>

        <div class="form-group-custom">
            <label for="gambar" class="label-custom">Ganti Gambar / Poster (Biarkan kosong jika tidak ingin diubah)</label>
            <input type="file" name="gambar" id="gambar" class="input-custom">
            
            @if($layanan->gambar)
                <div style="margin-top: 12px;">
                    <small class="text-muted d-block fw-bold mb-1">Gambar Saat Ini:</small>
                    <img src="{{ asset('assets/images/' . $layanan->gambar) }}" class="img-preview" alt="Preview">
                </div>
            @endif
            @error('gambar')
                <span class="error-custom">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group-custom">
            <label for="deskripsi" class="label-custom">Deskripsi Singkat</label>
            <textarea name="deskripsi" id="deskripsi" rows="5" class="input-custom">{{ old('deskripsi', $layanan->deskripsi) }}</textarea>
            @error('deskripsi')
                <span class="error-custom">{{ $message }}</span>
            @enderror
        </div>

        <hr class="divider-custom">

        <div class="btn-group-custom">
            <button type="submit" class="btn-submit-custom">💾 Simpan Perubahan</button>
            <a href="{{ route('admin.layanan.index') }}" class="btn-cancel-custom">Batal</a>
        </div>

    </form>
</div>
@endsection