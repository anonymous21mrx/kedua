<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KabarToko; // Memanggil model KabarToko

class KabarTokoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
    KabarToko::truncate();

    KabarToko::create([
        'headline' => 'Alfamart Perkuat Intervensi Gizi Anak',
        'isi_kabar' => 'Alfamart berkontribusi dalam pencegahan stunting...',
        'penulis' => 'Agun Saiful Fajar',
        'gambar' => 'berita1.png' // Pastikan file ada di public/img
    ]);

    KabarToko::create([
        'headline' => 'Laporan Penyaluran Sedekah Konsumen',
        'isi_kabar' => 'Transparansi dana bantuan konsumen Alfamart...',
        'penulis' => 'Agun Saiful Fajar',
        'gambar' => 'berita2.png'
    ]);

    KabarToko::create([
        'headline' => 'Alfamart Kini Punya 100 UCollect Box',
        'isi_kabar' => 'Memudahkan masyarakat membuang sampah elektronik...',
        'penulis' => 'Agun Saiful Fajar',
        'gambar' => 'berita3.png'
    ]);

    KabarToko::create([
        'headline' => 'Percepat Bantuan untuk Sumatera, Alfamart Distribusikan Bantuan Senilai Rp 2 Miliar',
        'isi_kabar' => 'Alfamart menyalurkan bantuan logistik senilai 2 Miliar Rupiah untuk membantu masyarakat di wilayah Sumatera melalui jalur darat, laut, dan udara.',
        'penulis' => 'Agun Saiful Fajar',
        'gambar' => 'berita4.png' // Pastikan gambar kapalnya ada di public/img
    ]);
}
}