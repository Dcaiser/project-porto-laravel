<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sertif extends Model
{
    use HasFactory;
     protected $fillable = [
      'id',
        'name',
        'issued_at',
        'issued_by',
        'file',
        'desc',
     ];
}
