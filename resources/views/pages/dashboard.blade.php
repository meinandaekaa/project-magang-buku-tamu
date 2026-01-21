@extends('layouts.app')

@section('body')

<div class="space-y-8 p-6" x-data="dashboardData()" x-init="init()">

    <!-- JUDUL -->
    <h4 class="text-2xl font-bold text-gray-800">
        Dashboard Buku Tamu
    </h4>

    <!-- STATISTIK -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

        <!-- KEMARIN -->
        <div class="bg-gray-200 rounded-2xl p-6 shadow-sm">
            <p class="text-sm font-semibold text-gray-600 uppercase">
                Kunjungan Kemarin
            </p>
            <div class="mt-4">
                <span class="text-5xl font-extrabold text-gray-900">{{ $kemarin ?? 20 }}</span>
                <span class="text-lg font-medium text-gray-700"> Orang</span>
            </div>
        </div>

        <!-- HARI INI -->
        <div class="bg-yellow-50 rounded-2xl p-6 shadow-sm">
            <p class="text-sm font-semibold text-gray-600 uppercase">
                Kunjungan Hari Ini
            </p>
            <div class="mt-4">
                <span class="text-5xl font-extrabold text-gray-900" x-text="hari"></span>
                <span class="text-lg font-medium text-gray-700"> Orang</span>
            </div>
        </div>

        <!-- MINGGU INI -->
        <div class="bg-gray-200 rounded-2xl p-6 shadow-sm">
            <p class="text-sm font-semibold text-gray-600 uppercase">
                Kunjungan Minggu Ini
            </p>
            <div class="mt-4">
                <span class="text-5xl font-extrabold text-gray-900" x-text="minggu"></span>
                <span class="text-lg font-medium text-gray-700"> Orang</span>
            </div>
        </div>

        <!-- BULAN INI -->
        <div class="bg-pink-50 rounded-2xl p-6 shadow-sm">
            <p class="text-sm font-semibold text-gray-600 uppercase">
                Kunjungan Bulan Ini
            </p>
            <div class="mt-4">
                <span class="text-5xl font-extrabold text-gray-900" x-text="bulan"></span>
                <span class="text-lg font-medium text-gray-700"> Orang</span>
            </div>
        </div>

    </div>

    <!-- PERIHAL + DIAGRAM -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-6">

        <!-- PERIHAL -->
        <div class="lg:col-span-2 bg-white rounded-2xl shadow p-6">
            <h5 class="text-xl font-bold mb-6">Perihal</h5>

            <div class="space-y-5">

                <div>
                    <div class="flex justify-between text-sm font-medium">
                        <span>Mengurus Perizinan</span>
                        <span>33%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2 mt-2">
                        <div class="bg-red-500 h-2 rounded-full" style="width:33%"></div>
                    </div>
                </div>

                <div>
                    <div class="flex justify-between text-sm font-medium">
                        <span>Konsultasi atau Pelatihan</span>
                        <span>15.8%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2 mt-2">
                        <div class="bg-blue-500 h-2 rounded-full" style="width:15.8%"></div>
                    </div>
                </div>

                <div>
                    <div class="flex justify-between text-sm font-medium">
                        <span>Mengakses Layanan Statistik</span>
                        <span>29.1%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2 mt-2">
                        <div class="bg-yellow-400 h-2 rounded-full" style="width:29.1%"></div>
                    </div>
                </div>

                <div>
                    <div class="flex justify-between text-sm font-medium">
                        <span>Melaporkan Konten Negatif</span>
                        <span>22.2%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2 mt-2">
                        <div class="bg-green-500 h-2 rounded-full" style="width:22.2%"></div>
                    </div>
                </div>

            </div>
        </div>

        <!-- DIAGRAM -->
        <div class="bg-white rounded-2xl shadow p-6">
            <h5 class="text-xl font-bold mb-4">Diagram Perihal</h5>
            <canvas id="pieChart"></canvas>
        </div>

    </div>

</div>

{{-- CHART --}}
<script>
const pieCtx = document.getElementById('pieChart');

new Chart(pieCtx, {
    type: 'doughnut',
    data: {
        labels: [
            'Mengurus Perizinan',
            'Konsultasi / Pelatihan',
            'Layanan Statistik',
            'Konten Negatif'
        ],
        datasets: [{
            data: [33, 15.8, 29.1, 22.2],
            backgroundColor: [
                '#ef4444',
                '#3b82f6',
                '#facc15',
                '#22c55e'
            ]
        }]
    },
    options: {
        plugins: {
            legend: {
                position: 'bottom'
            }
        }
    }
});
</script>

{{-- COUNT UP --}}
<script>
function dashboardData() {
    return {
        hari: 0,
        minggu: 0,
        bulan: 0,
        init() {
            this.animate('hari', {{ $hari }});
            this.animate('minggu', {{ $minggu }});
            this.animate('bulan', {{ $bulan }});
        },
        animate(field, end) {
            let start = 0;
            const interval = setInterval(() => {
                start++;
                this[field] = start;
                if (start >= end) clearInterval(interval);
            }, 30);
        }
    }
}
</script>

@endsection
