<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // 1. Menampilkan Halaman Form Login
    public function showLogin()
    {
        // Jika admin sudah terlanjur login, langsung lempar ke dashboard
        if (Session::has('admin_logged_in')) {
            return redirect()->route('admin.dashboard');
        }
        return view('auth.login');
    }

    // 2. Proses Pengecekan Login (Manual)
    public function login(Request $request)
    {
        // Validasi Form Input sesuai ketentuan UAS
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Email wajib diisi!',
            'email.email' => 'Format email tidak valid!',
            'password.required' => 'Password wajib diisi!',
        ]);

        // Cari user berdasarkan email di database
        $user = User::where('email', $request->email)->first();

        // Cek apakah user ada dan password-nya cocok (didekrip dari Hash)
        if ($user && Hash::check($request->password, $user->password)) {
            // Buat Session Manual bawaan Laravel jika sukses
            Session::put('admin_logged_in', true);
            Session::put('admin_id', $user->id);
            Session::put('admin_name', $user->name);

            return redirect()->route('admin.dashboard')->with('success', 'Selamat Datang Kembali, ' . $user->name);
        }

        // Jika salah, balikkan ke halaman login dengan pesan error
        return back()->withErrors(['login_error' => 'Email atau Password salah!'])->withInput();
    }

    // 3. Proses Logout Manual (Hapus Session)
    public function logout()
    {
        // Hapus semua session login
        Session::forget('admin_logged_in');
        Session::forget('admin_id');
        Session::forget('admin_name');
        
        // Atau bisa juga pakai Session::flush(); untuk bersihkan semua
        
        return redirect()->route('login')->with('success', 'Anda telah berhasil logout.');
    }
}