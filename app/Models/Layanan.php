<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    // Tambahkan properti $fillable ini untuk memberikan izin input data manual
    protected $fillable = [
        'nama_item',
        'deskripsi',
        'kategori',
        'gambar'
    ];
}