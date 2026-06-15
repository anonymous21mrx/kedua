@extends('layouts.admin')

@section('title', 'Tambah Layanan Baru')

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
    .input-custom.is-invalid-custom {
        border-color: #dc3545;
        background-color: #fff8f8;
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
        background-color: #198754; /* Hijau Simpan */
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: 0.2s;
    }
    .btn-submit-custom:hover {
        background-color: #157347;
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
    <h2 class="form-title">Tambah Produk & Layanan</h2>
    <p class="form-subtitle">Silakan isi formulir di bawah ini untuk menambahkan pilar bisnis atau promo baru.</p>
</div>

<div class="card-custom">
    <form action="{{ route('admin.layanan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group-custom">
            <label for="nama_item" class="label-custom">Nama Layanan / Produk</label>
            <input type="text" name="nama_item" id="nama_item" class="input-custom @error('nama_item') is-invalid-custom @enderror" value="{{ old('nama_item') }}" placeholder="Contoh: Promo Gantung Alfamart">
            @error('nama_item')
                <span class="error-custom">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group-custom">
            <label for="kategori" class="label-custom">Kategori Data</label>
            <select name="kategori" id="kategori" class="input-custom @error('kategori') is-invalid-custom @enderror" style="height: 48px;">
                <option value="">-- Pilih Kategori --</option>
                <option value="Pilar Utama" {{ old('kategori') == 'Pilar Utama' ? 'selected' : '' }}>Pilar Utama</option>
                <option value="Program" {{ old('kategori') == 'Program' ? 'selected' : '' }}>Program</option>
                <option value="Promo" {{ old('kategori') == 'Promo' ? 'selected' : '' }}>Promo / Katalog</option>
            </select>
            @error('kategori')
                <span class="error-custom">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group-custom">
            <label for="gambar" class="label-custom">Unggah Gambar / Poster (Format: JPG, JPEG, PNG | Maks: 2MB)</label>
            <input type="file" name="gambar" id="gambar" class="input-custom @error('gambar') is-invalid-custom @enderror">
            @error('gambar')
                <span class="error-custom">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group-custom">
            <label for="deskripsi" class="label-custom">Deskripsi Singkat</label>
            <textarea name="deskripsi" id="deskripsi" rows="5" class="input-custom @error('deskripsi') is-invalid-custom @enderror" placeholder="Tuliskan penjelasan detail mengenai layanan atau promo ini di sini...">{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
                <span class="error-custom">{{ $message }}</span>
            @enderror
        </div>

        <hr class="divider-custom">

        <div class="btn-group-custom">
            <button type="submit" class="btn-submit-custom">💾 Simpan Data</button>
            <a href="{{ route('admin.layanan.index') }}" class="btn-cancel-custom">Batal</a>
        </div>

    </form>
</div>
@endsection