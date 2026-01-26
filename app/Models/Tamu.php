<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\AnggotaTamu;

class Tamu extends Model
{
    protected $fillable = [
        'nama', 
        'instansi', 
        'notelp', 
        'keperluan', 
        'tanggal', 
        'jam_kunjungan', 
        'jam_kepulangan',
        'jumlah_orang', 
        'foto'
    ];

    protected $casts = [
        'foto' => 'array',
    ];
    
        public function anggota()
    {
        return $this->hasMany(AnggotaTamu::class, 'tamu_id');
    }
}