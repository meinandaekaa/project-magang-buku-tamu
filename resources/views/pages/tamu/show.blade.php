@extends('layouts.app')

@section('body')

<h1 class="text-2xl font-semibold text-gray-800 mb-1">
    Detail Data Tamu
</h1>
<hr class="mb-6 border-gray-200" />

<!-- CARD -->
<div class="max-w-3xl bg-white rounded-xl shadow-sm p-6">

    <!-- Nama -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">
            Nama
        </label>
        <input type="text" readonly
               value="{{ $tamu->nama }}"
               class="w-full rounded-lg border border-gray-300 bg-gray-100
                      px-4 py-2 text-gray-800 focus:outline-none">
    </div>

    <!-- Instansi -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">
            Instansi
        </label>
        <input type="text" readonly
               value="{{ $tamu->instansi }}"
               class="w-full rounded-lg border border-gray-300 bg-gray-100
                      px-4 py-2 text-gray-800 focus:outline-none">
    </div>

    <!-- Nomor Telepon -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">
            Nomor Telepon
        </label>
        <input type="text" readonly
               value="{{ $tamu->notelp }}"
               class="w-full rounded-lg border border-gray-300 bg-gray-100
                      px-4 py-2 text-gray-800 focus:outline-none">
    </div>

    <!-- Keperluan -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">
            Keperluan
        </label>
        <input type="text" readonly
               value="{{ $tamu->keperluan }}"
               class="w-full rounded-lg border border-gray-300 bg-gray-100
                      px-4 py-2 text-gray-800 focus:outline-none">
    </div>

    <!-- Tanggal -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">
            Tanggal
        </label>
        <input type="text" readonly
               value="{{ $tamu->tanggal }}"
               class="w-full rounded-lg border border-gray-300 bg-gray-100
                      px-4 py-2 text-gray-800 focus:outline-none">
    </div>

    <!-- Jam Kunjungan -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">
            Jam Kunjungan
        </label>
        <input type="text" readonly
               value="{{ $tamu->jam_kunjungan }}"
               class="w-full rounded-lg border border-gray-300 bg-gray-100
                      px-4 py-2 text-gray-800 focus:outline-none">
    </div>

    <!-- Jumlah Orang -->
    <div class="mb-6">
        <label class="block text-sm font-medium text-gray-700 mb-1">
            Jumlah Orang
        </label>
        <input type="text" readonly
               value="{{ $tamu->jumlah_orang }}"
               class="w-full rounded-lg border border-gray-300 bg-gray-100
                      px-4 py-2 text-gray-800 focus:outline-none">
    </div>

   <!-- BUTTON -->
    <div class="flex gap-3">
        <a href="{{ route('data-tamu') }}"
        class="inline-flex items-center gap-2
                px-5 py-2.5
                bg-gradient-to-r from-slate-600 to-slate-700
                hover:from-slate-700 hover:to-slate-800
                text-white text-sm font-medium
                rounded-lg
                shadow-sm hover:shadow
                transition-all duration-200">
            ← Kembali
        </a>
    </div>
</div>

@endsection
