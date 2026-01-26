<?php

namespace App\Http\Controllers;

use App\Models\Tamu;
use App\Models\AnggotaTamu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TamuController extends Controller
{
    public function index()
    {
        $tamus = Tamu::orderBy('created_at', 'DESC')->get();
        return view('pages.tamu.index', compact('tamus'));
    }

    public function create()
    {
        return view('pages.tamu.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'instansi' => 'required|string|max:255',
            'notelp' => 'required|string|max:20',
            'keperluan' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'jam_kunjungan' => 'required',
            'jam_kepulangan' => 'required',
            'jumlah_orang' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

            'anggota.*.nama' => 'required|string|max:255',
            'anggota.*.nik'  => 'required|string|max:50',
        ]);

        // ambil data utama
        $data = $request->only([
            'nama',
            'instansi',
            'notelp',
            'keperluan',
            'tanggal',
            'jam_kunjungan',
            'jam_kepulangan',
            'jumlah_orang',
        ]);

        // upload foto KTP
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('foto-ktp', 'public');
        }

        // simpan tamu
        $tamu = Tamu::create($data);

        // simpan anggota
        if ($request->has('anggota')) {
            foreach ($request->anggota as $item) {
                AnggotaTamu::create([
                    'tamu_id' => $tamu->id,
                    'nama' => $item['nama'],
                    'nik' => $item['nik'],
                ]);
            }
        }

        return redirect()->route('tamu.index')
            ->with('success', 'Data tamu dan anggota berhasil ditambahkan!');
    }

    public function show($id)
    {
        $tamu = Tamu::with('anggota')->findOrFail($id);
        return view('pages.tamu.show', compact('tamu'));
    }

    public function edit($id)
    {
        $tamu = Tamu::findOrFail($id);
        return view('pages.tamu.edit', compact('tamu'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'instansi' => 'required|string|max:255',
            'notelp' => 'required|string|max:20',
            'keperluan' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'jam_kunjungan' => 'required',
            'jam_kepulangan' => 'required',
            'jumlah_orang' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $tamu = Tamu::findOrFail($id);

        $data = $request->only([
            'nama',
            'instansi',
            'notelp',
            'keperluan',
            'tanggal',
            'jam_kunjungan',
            'jam_kepulangan',
            'jumlah_orang',
        ]);

        // ganti foto jika upload baru
        if ($request->hasFile('foto')) {
            if ($tamu->foto && Storage::disk('public')->exists($tamu->foto)) {
                Storage::disk('public')->delete($tamu->foto);
            }

            $data['foto'] = $request->file('foto')->store('foto-ktp', 'public');
        }

        $tamu->update($data);

        return redirect()->route('tamu.index')
            ->with('success', 'Data tamu berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $tamu = Tamu::findOrFail($id);

        // hapus foto
        if ($tamu->foto && Storage::disk('public')->exists($tamu->foto)) {
            Storage::disk('public')->delete($tamu->foto);
        }

        // hapus anggota
        $tamu->anggota()->delete();

        // hapus tamu
        $tamu->delete();

        return redirect()->route('tamu.index')
            ->with('success', 'Data tamu berhasil dihapus!');
    }

    // CETAK DATA
    public function cetakTamu()
    {
        $tamus = Tamu::orderBy('created_at', 'DESC')->get();
        return view('pages.tamu.cetak', compact('tamus'));
    }

    // ABOUT
    public function about()
    {
        return view('pages.tamu.about');
    }
}