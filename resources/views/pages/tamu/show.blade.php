@extends('layouts.app')

@section('body')

<h1 class="text-3xl font-bold text-blue-700 text-left mb-8">
    Detail Daftar Tamu
</h1>

<hr class="mb-6 border-gray-200" />

<!-- CARD -->
<div class="max-w-3xl bg-white rounded-xl shadow-sm p-6">

    <!-- Nama -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
        <input type="text" readonly value="{{ $tamu->nama }}"
            class="w-full rounded-lg border bg-gray-100 px-4 py-2">
    </div>

    <!-- Instansi -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Instansi</label>
        <input type="text" readonly value="{{ $tamu->instansi }}"
            class="w-full rounded-lg border bg-gray-100 px-4 py-2">
    </div>

    <!-- Nomor Telepon -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Nomor Telepon</label>
        <input type="text" readonly value="{{ $tamu->notelp }}"
            class="w-full rounded-lg border bg-gray-100 px-4 py-2">
    </div>

    <!-- Keperluan -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Keperluan</label>
        <input type="text" readonly value="{{ $tamu->keperluan }}"
            class="w-full rounded-lg border bg-gray-100 px-4 py-2">
    </div>

    <!-- Tanggal -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal</label>
        <input type="text" readonly value="{{ $tamu->tanggal }}"
            class="w-full rounded-lg border bg-gray-100 px-4 py-2">
    </div>

    <!-- Jam Kunjungan -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Jam Kunjungan</label>
        <input type="text" readonly value="{{ $tamu->jam_kunjungan }}"
            class="w-full rounded-lg border bg-gray-100 px-4 py-2">
    </div>

    <!-- Jam Kepulangan -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Jam Kepulangan</label>
        <input type="text" readonly value="{{ $tamu->jam_kepulangan }}"
            class="w-full rounded-lg border bg-gray-100 px-4 py-2">
    </div>

    <!-- Jumlah Orang -->
    <div class="mb-6">
        <label class="block text-sm font-medium text-gray-700 mb-1">Jumlah Orang</label>
        <input type="text" readonly value="{{ $tamu->jumlah_orang }}"
            class="w-full rounded-lg border bg-gray-100 px-4 py-2">
    </div>

    <!-- Foto -->
    <div class="mt-6">
    <label class="block text-sm font-medium text-gray-700 mb-2">
        Foto KTP
    </label>

    @if($tamu->foto)
    <img src="{{ asset('storage/'.$tamu->foto) }}"
         class="img-thumbnail"
         alt="Foto KTP">
    @else
        <span class="text-gray-500"></span>
    @endif

    </div>


    <!-- ===== ANGGOTA YANG IKUT ===== -->
    <h3 class="font-semibold mt-6">Anggota yang Ikut</h3>

    @if($tamu->anggota->count() > 0)
        <table class="w-full mt-2 border">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-3 py-2">No</th>
                    <th class="border px-3 py-2">Nama</th>
                    <th class="border px-3 py-2">NIK</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tamu->anggota as $item)
                <tr>
                    <td class="border px-3 py-2">{{ $loop->iteration }}</td>
                    <td class="border px-3 py-2">{{ $item->nama }}</td>
                    <td class="border px-3 py-2">{{ $item->nik }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-sm text-gray-500 italic mt-2">
            Tidak ada anggota yang ikut
        </p>
    @endif

    <!-- BUTTON -->
    <div class="flex gap-3 mt-6">
        <a href="{{ route('data-tamu') }}"
           class="px-5 py-2.5 bg-slate-700 text-white rounded-lg hover:bg-slate-800">
            Kembali
        </a>
    </div>
</div>

@endsection
