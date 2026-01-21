<?php

namespace App\Http\Controllers;

use App\Models\Tamu;
use Illuminate\Http\Request;

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
            'jumlah_orang' => 'required|integer',
        ]);

        Tamu::create($request->all());

        return redirect()
            ->route('tamu.index')
            ->with('success', 'Data tamu berhasil ditambahkan!');
    }

    public function show($id)
    {
        $tamu = Tamu::findOrFail($id);
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
            'jumlah_orang' => 'required|integer',
        ]);

        $tamu = Tamu::findOrFail($id);
        $tamu->update($request->all());

        return redirect()
            ->route('tamu.index')
            ->with('success', 'Data tamu berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $tamu = Tamu::findOrFail($id);
        $tamu->delete();

        return redirect()
            ->route('tamu.index')
            ->with('success', 'Data tamu berhasil dihapus!');
    }

    // CETAK DATA
    public function cetakTamu()
    {
    $tamus = Tamu::orderBy('created_at', 'DESC')->get();
    return view('pages.tamu.cetak', compact('tamus'));
    }

    //ABOUT
    public function about()
    {
    return view('pages.tamu.about');
    }


}