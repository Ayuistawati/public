<?php
// app/Models/Kontak.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'alamat',
        'telepon',
        'gender',
    ];

    protected $casts = [
        'gender' => 'ENUM', // Jika 'gender' menggunakan ENUM, ubah sesuai kebutuhan
    ];
}
