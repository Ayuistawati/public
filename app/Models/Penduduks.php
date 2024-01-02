<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduks extends Model
{
    use HasFactory;

    protected $fillable = ['nik', 'nama', 'alamat', 'lahir', 'agama_id'];

    public function agama()
    {
        return $this->belongsTo(Agamas::class);
    }
}
