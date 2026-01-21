@extends('layouts.app')

@section('body')

<h1 class="text-2xl font-semibold text-gray-800 mb-1">
    Edit Data Tamu
</h1>
<hr class="mb-6 border-gray-200">

<form action="{{ route('tamu.update', $tamu->id) }}"
      method="POST"
      x-data="{ loading: false }"
      @submit="loading = true"
      class="max-w-3xl bg-white rounded-xl shadow-sm p-6">

    @csrf
    @method('PUT')

    <!-- Nama -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">
            Nama
        </label>
        <input type="text" name="nama"
               value="{{ old('nama', $tamu->nama) }}"
               required
               class="w-full rounded-lg border border-gray-300
                      px-4 py-2 text-gray-800
                      focus:ring-2 focus:ring-blue-500
                      focus:border-blue-500 outline-none">
    </div>

    <!-- Instansi -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">
            Instansi
        </label>
        <input type="text" name="instansi"
               value="{{ old('instansi', $tamu->instansi) }}"
               required
               class="w-full rounded-lg border border-gray-300
                      px-4 py-2 text-gray-800
                      focus:ring-2 focus:ring-blue-500
                      focus:border-blue-500 outline-none">
    </div>

    <!-- No Telepon -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">
            No. Telepon
        </label>
        <input type="text" name="notelp"
               value="{{ old('notelp', $tamu->notelp) }}"
               required
               class="w-full rounded-lg border border-gray-300
                      px-4 py-2 text-gray-800
                      focus:ring-2 focus:ring-blue-500
                      focus:border-blue-500 outline-none">
    </div>

    <!-- Keperluan -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">
            Keperluan
        </label>
        <textarea name="keperluan" rows="3" required
                  class="w-full rounded-lg border border-gray-300
                         px-4 py-2 text-gray-800
                         focus:ring-2 focus:ring-blue-500
                         focus:border-blue-500 outline-none">{{ old('keperluan', $tamu->keperluan) }}</textarea>
    </div>

    <!-- Tanggal -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">
            Tanggal
        </label>
        <input type="date" name="tanggal"
               value="{{ old('tanggal', $tamu->tanggal) }}"
               required
               class="w-full rounded-lg border border-gray-300
                      px-4 py-2 text-gray-800
                      focus:ring-2 focus:ring-blue-500
                      focus:border-blue-500 outline-none">
    </div>

    <!-- Jam Kunjungan -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">
            Jam Kunjungan
        </label>
        <input type="time" name="jam_kunjungan"
               value="{{ old('jam_kunjungan', $tamu->jam_kunjungan) }}"
               required
               class="w-full rounded-lg border border-gray-300
                      px-4 py-2 text-gray-800
                      focus:ring-2 focus:ring-blue-500
                      focus:border-blue-500 outline-none">
    </div>

    <!-- Jumlah Orang -->
    <div class="mb-6">
        <label class="block text-sm font-medium text-gray-700 mb-1">
            Jumlah Orang
        </label>
        <input type="number" name="jumlah_orang"
               value="{{ old('jumlah_orang', $tamu->jumlah_orang) }}"
               required
               class="w-full rounded-lg border border-gray-300
                      px-4 py-2 text-gray-800
                      focus:ring-2 focus:ring-blue-500
                      focus:border-blue-500 outline-none">
    </div>

    <!-- BUTTON -->
    <div class="flex gap-3">
        <button type="submit"
                :disabled="loading"
                class="inline-flex items-center gap-2
                       px-6 py-2.5
                       bg-gradient-to-r from-blue-600 to-blue-700
                       hover:from-blue-700 hover:to-blue-800
                       text-white text-sm font-medium
                       rounded-lg
                       shadow-sm hover:shadow
                       transition-all duration-200
                       disabled:opacity-60">
            <span x-show="!loading">Update</span>
            <span x-show="loading">⏳Menyimpan...</span>
        </button>

        <a href="{{ route('tamu.index') }}"
           class="inline-flex items-center
                  px-6 py-2.5
                  bg-gray-200 hover:bg-gray-300
                  text-gray-800 text-sm font-medium
                  rounded-lg
                  transition">
            ← Kembali
        </a>
    </div>

</form>

@endsection
