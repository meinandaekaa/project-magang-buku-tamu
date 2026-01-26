<?php

namespace App\Http\Controllers;

use App\Models\Tamu;
use App\Models\AnggotaTamu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BukuTamuController extends Controller
{
    public function create()
    {
        // Panggil view yang sama dengan admin
        return view('pages.tamu.create'); // sama seperti admin
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'instansi' => 'nullable|string|max:255',
            'notelp' => 'required|string|max:20',
            'keperluan' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'anggota.*.nama' => 'required|string|max:255',
            'anggota.*.nik' => 'nullable|string|max:50',
        ]);

        $dataTamu = $request->only(['nama','instansi','notelp','keperluan']);

        if ($request->hasFile('foto')) {
            $dataTamu['foto'] = $request->file('foto')->store('foto-ktp','public');
        }

        $tamu = Tamu::create($dataTamu);

        if($request->has('anggota')){
            foreach($request->anggota as $anggota){
                if(!empty($anggota['nama'])){
                    AnggotaTamu::create([
                        'tamu_id' => $tamu->id,
                        'nama' => $anggota['nama'],
                        'nik' => $anggota['nik'] ?? null,
                    ]);
                }
            }
        }

        return redirect('/buku-tamu')->with('success','Terima kasih, data kunjungan Anda berhasil dikirim!');
    }
}