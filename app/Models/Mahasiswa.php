<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    // Menentukan nama tabel yang digunakan
    protected $table = 'mahasiswas';  // Pastikan nama tabel sesuai

    // Kolom yang bisa diisi (fillable)
    protected $fillable = ['npm', 'nama', 'prodi'];
}
