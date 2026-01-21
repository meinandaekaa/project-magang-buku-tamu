@extends('layouts.app')

@section('body')
<div class="max-w-3xl mx-auto p-6 bg-white shadow rounded" x-data="{ success: '{{ session('success') }}', errors: {{ $errors->any() ? $errors->all() : '[]' }} }">

    <h1 class="text-2xl font-semibold mb-4">Form Buku Tamu</h1>
    <hr class="mb-6 border-gray-300">

    <!-- Pesan sukses -->
    <template x-if="success">
        <div class="mb-4 p-4 text-green-800 bg-green-100 rounded" x-text="success"></div>
    </template>

    <!-- Pesan error -->
    <template x-if="errors.length > 0">
        <div class="mb-4 p-4 text-red-800 bg-red-100 rounded">
            <ul>
                <template x-for="error in errors" :key="error">
                    <li x-text="error"></li>
                </template>
            </ul>
        </div>
    </template>

    <form action="{{ route('tamu.store') }}" method="POST" class="space-y-4">
        @csrf    

        <div>
            <label for="nama" class="block font-medium mb-1">Nama</label>
            <input type="text" id="nama" name="nama" value="{{ old('nama') }}"
                placeholder="Masukkan Nama Lengkap Anda"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <div>
            <label for="instansi" class="block font-medium mb-1">Instansi</label>
            <input type="text" id="instansi" name="instansi" value="{{ old('instansi') }}"
                placeholder="Masukkan Asal Instansi Anda"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <div>
            <label for="notelp" class="block font-medium mb-1">Nomor Telepon</label>
            <input type="text" id="notelp" name="notelp" value="{{ old('notelp') }}"
                placeholder="Masukkan Nomor Telepon/WA Anda"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <div>
            <label for="keperluan" class="block font-medium mb-1">Keperluan</label>
            <input type="text" id="keperluan" name="keperluan" value="{{ old('keperluan') }}"
                placeholder="Tuliskan Keperluan Anda"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <div>
            <label for="tanggal" class="block font-medium mb-1">Tanggal</label>
            <input type="date" id="tanggal" name="tanggal" value="{{ old('tanggal') }}"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <div>
            <label for="jam_kunjungan" class="block font-medium mb-1">Jam Kunjungan</label>
            <input type="time" id="jam_kunjungan" name="jam_kunjungan" value="{{ old('jam_kunjungan') }}"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <div>
            <label for="jumlah_orang" class="block font-medium mb-1">Jumlah Orang</label>
            <input type="number" id="jumlah_orang" name="jumlah_orang" value="{{ old('jumlah_orang') }}"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <div>
            <button type="submit"
                class="w-full bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition">Submit</button>
        </div>
    </form>
</div>
@endsection
