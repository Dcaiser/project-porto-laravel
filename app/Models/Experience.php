<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Experience extends Model
{
    use HasFactory;

    // Jika nama tabel bukan 'posts', tentukan:
    // protected $table = 'nama_tabel_lain';

    // Kolom yang boleh diisi secara massal
    protected $fillable = [
        'judul',
        'foto',
        'deskripsi',
    ];
}
