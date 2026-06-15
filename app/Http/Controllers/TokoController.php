<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Layanan;
use App\Models\KabarToko;

class TokoController extends Controller
{
    // 1. Halaman Utama (Isinya Profile Perusahaan, Berita, & Promo di paling bawah)
    public function index()
    {
        // Ambil Pilar Bisnis (yang kategori-nya BUKAN 'Promo')
        $semuaPilar = Layanan::where('kategori', '!=', 'Promo')->paginate(3, ['*'], 'pilarPage'); 
        
        // Ambil Berita Terbaru
        $semuaBerita = KabarToko::paginate(3, ['*'], 'beritaPage');

        // Ambil Katalog Promo (Khusus yang kategori-nya 'Promo')
        $semuaPromo = Layanan::where('kategori', 'Promo')->paginate(3, ['*'], 'promoPage');

        // Kirim ketiga data tersebut ke view home
        return view('home', compact('semuaPilar', 'semuaBerita', 'semuaPromo'));
    }

    // 2. Halaman Project (Daftar Pilar Bisnis dengan Pagination 1, 2, 3)
    public function projects()
    {
        $projects = Layanan::paginate(3); 
        return view('project', compact('projects'));
    }

    // 3. Detail untuk Pilar Bisnis & Promo (Sama-sama menggunakan tabel Layanan)
    public function showProject($id)
    {
        $project = Layanan::findOrFail($id);
        return view('project-detail', compact('project'));
    }

    // 4. Detail Khusus untuk Berita
    public function showBerita($id)
    {
        $berita = KabarToko::findOrFail($id);
        return view('berita-detail', compact('berita'));
    }

    // 5. Halaman About
    public function about()
    {
        return view('about');
    }

    // 6. Halaman Contact
    public function contact()
    {
        return view('contact');
    }
}