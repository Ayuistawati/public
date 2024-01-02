<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggotakks extends Model
{
    use HasFactory;

    protected $fillable = ['kk_id', 'penduduk_id', 'hubungankk_id', 'statusaktif'];

    public function kk()
    {
        return $this->belongsTo(Kks::class);
    }

    public function penduduk()
    {
        return $this->belongsTo(Penduduks::class);
    }

    public function hubungankk()
    {
        return $this->belongsTo(Hubungankks::class);
    }
}
