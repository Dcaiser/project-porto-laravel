<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    // Jika nama tabel bukan 'posts', tentukan:
    // protected $table = 'nama_tabel_lain';

    // Kolom yang boleh diisi secara massal
    protected $fillable = [
        'descript',
        'poto',
    ];
}
