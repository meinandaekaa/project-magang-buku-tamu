<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tamu extends Model
{
    protected $fillable = [
        'nama', 
        'instansi', 
        'notelp', 
        'keperluan', 
        'tanggal', 
        'jam_kunjungan', 
        'jumlah_orang', 
        'foto'
    ];
}