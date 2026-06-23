@extends('layouts.admin')

@section('title', 'Kelola Layanan')

@section('content')
<div class="d-flex gap-2">
    <a href="{{ route('admin.layanan.pdf') }}" class="btn btn-danger fw-bold px-4" style="border-radius: 8px; background-color: #f9f9f9;">
        📄 Cetak Report PDF
    </a>
    
    <a href="{{ route('admin.layanan.create') }}" class="btn btn-primary fw-bold px-4" style="border-radius: 8px;">
        ➕ Tambah Layanan Baru
    </a>
</div>

<div class="card border-0 shadow-sm" style="border-radius: 15px; overflow: hidden;">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th class="px-4 py-3 text-center" style="width: 70px;">No</th>
                        <th class="py-3" style="width: 120px;">Gambar</th>
                        <th class="py-3">Nama Layanan / Item</th>
                        <th class="py-3" style="width: 150px;">Kategori</th>
                        <th class="py-3">Deskripsi</th>
                        <th class="px-4 py-3 text-center" style="width: 200px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($layanas as $key => $layanan)
                    <tr>
                        <td class="text-center fw-bold text-secondary">{{ $key + 1 }}</td>
                        <td>
                            @if($layanan->gambar)
                                <img src="{{ asset('img/' . $layanan->gambar) }}" alt="Gambar" class="img-thumbnail" style="width: 80px; height: 60px; object-fit: cover; border-radius: 8px;">
                            @else
                                <span class="badge bg-secondary">No Image</span>
                            @endif
                        </td>
                        <td class="fw-bold text-dark">{{ $layanan->nama_item }}</td>
                        <td>
                            <span class="badge {{ $layanan->kategori == 'Promo' ? 'bg-danger' : 'bg-primary' }} px-3 py-2" style="border-radius: 6px;">
                                {{ $layanan->kategori }}
                            </span>
                        </td>
                        <td class="text-secondary small">{{ Str::limit($layanan->deskripsi, 80) }}</td>
                        <td class="px-4 text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('admin.layanan.edit', $layanan->id) }}" class="btn btn-warning btn-sm fw-bold px-3 text-white" style="border-radius: 6px;">
                                    ✏️ Edit
                                </a>

                                <form action="{{ route('admin.layanan.destroy', $layanan->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus layanan ini?')">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm fw-bold px-3" style="border-radius: 6px;">
                                        🗑️ Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-5 text-muted">
                            <div class="fs-2 mb-2">📦</div>
                            Belum ada data layanan di database. Silakan tambah data baru!
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection