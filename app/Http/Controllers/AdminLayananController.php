<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Layanan;
use Illuminate\Support\Facades\File;

class AdminLayananController extends Controller
{
    // 1. Menampilkan Semua Data dalam Bentuk Tabel
    public function index()
    {
        $layanas = Layanan::all();
        return view('admin.layanan.index', compact('layanas'));
    }

    // 2. Menampilkan Form Tambah Data
    public function create()
    {
        return view('admin.layanan.create');
    }

    // 3. Memproses Penyimpanan Data Baru + Validasi + Upload Gambar
    public function store(Request $request)
    {
        // Fitur Wajib 5: Validasi Form Input
        $request->validate([
            'nama_item' => 'required|min:5',
            'deskripsi' => 'required',
            'kategori'  => 'required',
            'gambar'    => 'required|image|mimes:jpeg,png,jpg|max:2048', // Maksimal 2MB
        ], [
            'nama_item.required' => 'Nama layanan wajib diisi!',
            'nama_item.min'      => 'Nama layanan minimal harus 5 karakter!',
            'deskripsi.required' => 'Deskripsi wajib diisi!',
            'kategori.required'  => 'Silakan pilih kategori data!',
            'gambar.required'    => 'File gambar wajib diunggah!',
            'gambar.image'       => 'File yang diupload harus berupa gambar!',
            'gambar.mimes'       => 'Format gambar harus jpeg, png, atau jpg!',
        ]);

        // Fitur Wajib 6: Proses Upload Gambar ke public/img/
        $namaGambar = time() . '.' . $request->gambar->extension();
        try {
            $request->gambar->move(public_path('img'), $namaGambar);
        } catch (\Exception $e) {
            // Ignore if on Vercel (read-only)
        }

        // Simpan ke Database
        Layanan::create([
            'nama_item' => $request->nama_item,
            'deskripsi' => $request->deskripsi,
            'kategori'  => $request->kategori,
            'gambar'    => $namaGambar,
        ]);

        return redirect()->route('admin.layanan.index')->with('success', 'Data Layanan baru berhasil ditambahkan! (Catatan: Upload gambar di Vercel tidak tersimpan permanen)');
    }

    // 4. Menampilkan Form Edit Data Berdasarkan ID
    public function edit($id)
    {
        $layanan = Layanan::findOrFail($id);
        return view('admin.layanan.edit', compact('layanan'));
    }

    // 5. Memproses Perubahan Data (Update)
    public function update(Request $request, $id)
    {
        $layanan = Layanan::findOrFail($id);

        // Validasi Form Input Edit
        $request->validate([
            'nama_item' => 'required|min:5',
            'deskripsi' => 'required',
            'kategori'  => 'required',
            'gambar'    => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Boleh kosong jika tidak diganti
        ]);

        // Cek jika admin mengupload gambar baru
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama dari folder public/img agar tidak penuh
            $pathLama = public_path('img/' . $layanan->gambar);
            if (File::exists($pathLama)) {
                try { File::delete($pathLama); } catch (\Exception $e) {}
            }

            // Upload gambar baru
            $namaGambar = time() . '.' . $request->gambar->extension();
            try {
                $request->gambar->move(public_path('img'), $namaGambar);
                $layanan->gambar = $namaGambar;
            } catch (\Exception $e) {
                // Ignore if on Vercel
                $layanan->gambar = $namaGambar; // It will be broken, but won't crash
            }
        }

        // Update data text
        $layanan->nama_item = $request->nama_item;
        $layanan->deskripsi = $request->deskripsi;
        $layanan->kategori  = $request->kategori;
        $layanan->save();

        return redirect()->route('admin.layanan.index')->with('success', 'Data Layanan berhasil diperbarui! (Catatan: Upload gambar di Vercel tidak tersimpan permanen)');
    }

    // 6. Memproses Penghapusan Data (Delete)
    public function destroy($id)
    {
        $layanan = Layanan::findOrFail($id);

        // Hapus file fisik gambar dari folder public
        $pathGambar = public_path('img/' . $layanan->gambar);
        if (File::exists($pathGambar)) {
            try { File::delete($pathGambar); } catch (\Exception $e) {}
        }

        // Hapus baris data di database
        $layanan->delete();

        return redirect()->route('admin.layanan.index')->with('success', 'Data Layanan berhasil dihapus dari sistem!');
    }

    public function cetakPdf()
{
    // Mengambil seluruh data layanan dari database
    $layanas = Layanan::all();

    // Menyiapkan layout cetak menggunakan file blade khusus pdf
    $pdf = Pdf::loadView('admin.layanan.pdf', compact('layanas'));

    // Otomatis download file PDF dengan nama berikut saat tombol diklik
    return $pdf->download('Laporan_Data_Layanan_Alfamart.pdf');
}
}