<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Bersihkan data user lama agar tidak duplikat
        User::truncate();

        // Membuat akun admin utama
        User::create([
            'name' => 'Agun Saiful Fajar',
            'email' => 'agunadmin@gmail.com',
            'password' => Hash::make('admin123'), // Password di-hash aman
        ]);
    }
}