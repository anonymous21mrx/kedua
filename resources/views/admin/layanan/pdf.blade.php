<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Data Produk & Layanan Alfamart</title>
    <style>
        body { font-family: sans-serif; color: #333; line-height: 1.4; }
        .header { text-align: center; margin-bottom: 30px; border-bottom: 3px solid #dc3545; padding-bottom: 10px; }
        .header h2 { margin: 0; color: #dc3545; font-size: 24px; }
        .header p { margin: 5px 0 0 0; color: #6c757d; font-size: 12px; }
        .meta-info { margin-bottom: 20px; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; font-size: 12px; }
        th { background-color: #212529; color: white; padding: 10px; text-align: left; fw-bold; }
        td { padding: 10px; border-bottom: 1px solid #dee2e6; }
        .badge-promo { color: #dc3545; font-weight: bold; }
        .badge-pilar { color: #0d6efd; font-weight: bold; }
        .footer { position: fixed; bottom: 0; width: 100%; text-align: center; font-size: 10px; color: #aaa; border-top: 1px solid #eee; padding-top: 5px; }
    </style>
</head>
<body>

    <div class="header">
        <h2>PT SUMBER ALFARIA TRIJAYA TBK (ALFAMART)</h2>
        <p>Halaman Administrator - Laporan Informasi Publik Data Produk & Layanan</p>
    </div>

    <div class="meta-info">
        <strong>Dicetak Oleh:</strong> {{ session('admin_name', 'Agun Saiful Fajar') }} <br>
        <strong>Tanggal Cetak:</strong> {{ date('d F Y / H:i') }} WIB
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 40px; text-align: center;">No</th>
                <th style="width: 150px;">Nama Layanan / Produk</th>
                <th style="width: 100px;">Kategori</th>
                <th>Deskripsi Singkat</th>
            </tr>
        </thead>
        <tbody>
            @foreach($layanas as $key => $layanan)
            <tr>
                <td style="text-align: center;">{{ $key + 1 }}</td>
                <td><strong>{{ $layanan->nama_item }}</strong></td>
                <td>
                    <span class="{{ $layanan->kategori == 'Promo' ? 'badge-promo' : 'badge-pilar' }}">
                        {{ $layanan->kategori }}
                    </span>
                </td>
                <td>{{ $layanan->deskripsi }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    

</body>
</html>