@extends('layouts.app')

@section('body')
<div class="max-w-4xl mx-auto mt-10 p-6 bg-gray-100 rounded-2xl shadow-lg">

    <h1 class="text-3xl font-bold text-blue-700 text-center mb-8">
        Tentang Sistem Buku Tamu
    </h1>

    {{-- LOGO --}}
    <div class="flex justify-center mb-8">
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-10 text-center">

            <!-- Fakultas Teknik -->
            <div class="flex flex-col items-center gap-3">
                <img src="{{ asset('img/ft_logo.png') }}"
                     alt="Logo Fakultas Teknik"
                     class="w-24 h-24 object-contain rounded-full
                            bg-white p-3
                            shadow-md shadow-black/20">
                <p class="text-sm text-gray-600"></p>
            </div>

            <!-- UMPO -->
            <div class="flex flex-col items-center gap-3">
                <img src="{{ asset('img/logo_umpo.png') }}"
                     alt="Logo Universitas Muhammadiyah Ponorogo"
                     class="w-24 h-24 object-contain rounded-full
                            bg-white p-3
                            shadow-md shadow-black/20">
                <p class="text-sm text-gray-600"></p>
            </div>

            <!-- Kominfo -->
            <div class="flex flex-col items-center gap-3">
                <img src="{{ asset('img/logo-kominfo.png') }}"
                     alt="Logo Dinas Kominfo"
                     class="w-24 h-24 object-contain rounded-full
                            bg-white p-3
                            shadow-md shadow-black/20">
                <p class="text-sm text-gray-600"></p>
            </div>

        </div>
    </div>

    {{-- DESKRIPSI --}}
    <div class="bg-white p-6 rounded-xl shadow-md">
        <p class="text-gray-700 text-justify mb-4">
            Sistem Buku Tamu ini dibuat untuk
            <strong>Dinas Kominfo Kabupaten Ponorogo</strong>
           sebagai media digital untuk mencatat kunjungan tamu dengan lebih efisien, menggantikan sistem manual yang lama. 
           Website ini mempermudah petugas dalam mencatat data tamu, memantau statistik kunjungan harian, mingguan, bulanan, maupun tahunan, dan menghasilkan laporan yang lebih cepat dan akurat.

        </p>

        <p class="text-gray-700 text-justify mb-4">
            Website ini merupakan <strong>project magang</strong>
            yang dibuat oleh mahasiswa dari
            <strong>Fakultas Teknik, Universitas Muhammadiyah Ponorogo,</strong>
            dengan tujuan praktik dan penerapan ilmu di bidang Teknologi Informasi dan Sistem Informasi.
        </p>

        <p class="text-gray-700 mb-2">Dibuat oleh:</p>

        <ul class="list-disc list-inside text-gray-700 mb-4">
            <li>Meinanda Eka Cahyaningrum – NIM 22633698</li>
            <li>Silviana Puspaningrum – NIM 22533703</li>
        </ul>

        <p class="text-gray-700 text-justify">
            Semoga sistem ini dapat membantu Dinas Kominfo Kabupaten Ponorogo
            dalam pengelolaan buku tamu dan meningkatkan efisiensi administrasi kunjungan.
        </p>
    </div>

</div>
@endsection
