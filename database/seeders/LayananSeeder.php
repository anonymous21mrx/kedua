<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Layanan;

class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Menghapus data lama agar tidak duplikat saat menjalankan seeder ulang
        Layanan::truncate(); 
        
        // --- DATA PILAR BISNIS & PROGRAM ---
        Layanan::create([
            'nama_item' => 'Distribusi Retail',
            'deskripsi' => 'Jaringan minimarket penyedia kebutuhan pokok masyarakat.',
            'kategori' => 'Pilar Utama',
            'gambar' => 'distribusi.png'
        ]);

        Layanan::create([
            'nama_item' => 'Layanan Digital',
            'deskripsi' => 'Kemudahan transaksi elektronik dan layanan finansial.',
            'kategori' => 'Pilar Utama',
            'gambar' => 'digital.png'
        ]);

        Layanan::create([
            'nama_item' => 'Keanggotaan',
            'deskripsi' => 'Program loyalitas pelanggan melalui kartu Ponta.',
            'kategori' => 'Pilar Utama',
            'gambar' => 'member.png'
        ]);

        Layanan::create([
            'nama_item' => 'Program CSR',
            'deskripsi' => 'Kontribusi sosial Alfamart untuk kemajuan Indonesia.',
            'kategori' => 'Program',
            'gambar' => 'program.png'
        ]);

        // --- DATA KATALOG PROMO (TAMBAHAN UNTUK POIN 3) ---
        // Kategori WAJIB diisi 'Promo' agar muncul di bagian bawah home
        
        Layanan::create([
            'nama_item' => 'Promo JSM',
            'deskripsi' => 'Promo Jumat Sabtu Minggu hemat banget untuk kebutuhan dapur.',
            'kategori' => 'Promo', 
            'gambar' => 'jsm.png'
        ]);

        Layanan::create([
            'nama_item' => 'Promo PSM',
            'deskripsi' => 'Produk Spesial Mingguan dengan harga miring hanya di Alfamart.',
            'kategori' => 'Promo',
            'gambar' => 'psm.png'
        ]);

        Layanan::create([
            'nama_item' => 'Promo Gantung',
            'deskripsi' => 'Promo Gajian Untung untuk stok bulanan kamu lebih hemat.',
            'kategori' => 'Promo',
            'gambar' => 'gantung.png'
        ]);
    }
}