@extends('layouts.app')

@section('body')

<!-- HEADER -->
<div class="flex items-center justify-between mb-4">
    <h1 class="text-2xl font-semibold text-slate-800">
        Data Daftar Tamu
    </h1>

    <div class="flex gap-2">
        <a href="{{ route('tamu.create') }}"
           class="px-4 py-2 text-sm font-medium
                  bg-blue-600 hover:bg-blue-700
                  text-white rounded-lg
                  shadow-sm transition">
            + Tambah Data
        </a>

        <a href="{{ route('cetak-tamu') }}" target="_blank"
           class="px-4 py-2 text-sm font-medium
                  bg-slate-600 hover:bg-slate-700
                  text-white rounded-lg
                  shadow-sm transition">
            Cetak Data
        </a>
    </div>
</div>

<hr class="mb-4 border-slate-200">

<!-- ALERT -->
@if(session('success'))
<div class="mb-4 px-4 py-3 rounded-lg
            bg-green-100 text-green-800 text-sm">
    {{ session('success') }}
</div>
@endif

<!-- TABLE -->
<div class="overflow-x-auto bg-white rounded-xl shadow-sm">
    <table class="w-full text-sm text-left">
        <thead class="bg-slate-800 text-white">
            <tr>
                <th class="px-4 py-3">No</th>
                <th class="px-4 py-3">Nama</th>
                <th class="px-4 py-3">Instansi</th>
                <th class="px-4 py-3">No Telp / WA</th>
                <th class="px-4 py-3">Keperluan</th>
                <th class="px-4 py-3">Tanggal</th>
                <th class="px-4 py-3">Jam</th>
                <th class="px-4 py-3">Jumlah</th>
                <th class="px-4 py-3">Dibuat</th>
                <th class="px-4 py-3 text-center">Action</th>
            </tr>
        </thead>

        <tbody class="divide-y">
            @forelse ($tamus as $tamu)
            <tr class="hover:bg-slate-50">
                <td class="px-4 py-3">{{ $loop->iteration }}</td>
                <td class="px-4 py-3">{{ $tamu->nama }}</td>
                <td class="px-4 py-3">{{ $tamu->instansi }}</td>
                <td class="px-4 py-3">{{ $tamu->notelp }}</td>
                <td class="px-4 py-3">{{ $tamu->keperluan }}</td>
                <td class="px-4 py-3">{{ $tamu->tanggal }}</td>
                <td class="px-4 py-3">{{ $tamu->jam_kunjungan }}</td>
                <td class="px-4 py-3">{{ $tamu->jumlah_orang }}</td>
                <td class="px-4 py-3">
                    {{ $tamu->created_at->format('d-m-Y H:i') }}
                </td>

                <!-- ACTION -->
                <td class="px-4 py-3">
                    <div class="flex justify-center gap-2">

                        <a href="{{ route('tamu.show', $tamu->id) }}"
                           class="px-3 py-1.5 text-xs font-medium
                                  bg-blue-500 hover:bg-blue-600
                                  text-white rounded-md transition">
                            Detail
                        </a>

                        <a href="{{ route('tamu.edit', $tamu->id) }}"
                           class="px-3 py-1.5 text-xs font-medium
                                  bg-yellow-500 hover:bg-yellow-600
                                  text-white rounded-md transition">
                            Edit
                        </a>

                        <form action="{{ route('tamu.destroy', $tamu->id) }}"
                              method="POST"
                              onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="px-3 py-1.5 text-xs font-medium
                                           bg-red-500 hover:bg-red-600
                                           text-white rounded-md transition">
                                Hapus
                            </button>
                        </form>

                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="11"
                    class="px-4 py-6 text-center text-slate-500 italic">
                    Data tamu tidak ditemukan
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection