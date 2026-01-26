<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tamu;

class AnggotaTamu extends Model
{
    // Nama tabel (penting karena tidak plural default Laravel)
    protected $table = 'anggota_tamus';

    protected $fillable = [
        'tamu_id',
        'nama',
        'nik'
    ];

    public function tamu()
    {
        return $this->belongsTo(Tamu::class);
    }
}