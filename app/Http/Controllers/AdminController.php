<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Layanan;
use App\Models\KabarToko; // Sesuaikan dengan model Berita/KabarToko kamu
use App\Models\User;

class AdminController extends Controller
{
    // Menampilkan halaman utama Dashboard Admin beserta ringkasan data
    public function dashboard()
    {
        // Fitur Wajib 4: Menghitung ringkasan jumlah data dari database
        $jumlahLayanan = Layanan::count();
        $jumlahBerita = class_exists(\App\Models\KabarToko::class) ? KabarToko::count() : 0;
        $jumlahAdmin = User::count();

        return view('admin.dashboard', compact('jumlahLayanan', 'jumlahBerita', 'jumlahAdmin'));
    }
}