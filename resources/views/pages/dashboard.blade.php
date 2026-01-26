@extends('layouts.app')

@section('body')

<div class="space-y-8 p-6" x-data="dashboardData()" x-init="init()">

    <!-- JUDUL -->
    <h4 class="text-2xl font-bold text-blue-800 tracking-wide border-l-4 border-blue-600 pl-3">
        Dashboard Buku Tamu
    </h4>


    <!-- STATISTIK -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

    <!-- KEMARIN -->
    <div
        x-data="{ bounce:false }"
        @click="bounce = true; setTimeout(() => bounce = false, 250)"
        :class="bounce ? 'scale-105' : ''"
        class="bg-gray-200 rounded-2xl p-6 shadow-sm
               cursor-pointer
               transition-all duration-300
               hover:shadow-xl hover:-translate-y-1
               active:scale-95">

        <p class="text-sm font-semibold text-gray-600 uppercase">
            Kunjungan Kemarin
        </p>

        <div class="mt-4">
            <span class="text-5xl font-extrabold text-gray-900">
                {{ $kemarin ?? 20 }}
            </span>
            <span class="text-lg font-medium text-gray-700"> Orang</span>
        </div>
    </div>

    <!-- HARI INI -->
    <div
        x-data="{ bounce:false }"
        @click="bounce = true; setTimeout(() => bounce = false, 250)"
        :class="bounce ? 'scale-105' : ''"
        class="bg-yellow-50 rounded-2xl p-6 shadow-sm
               cursor-pointer
               transition-all duration-300
               hover:shadow-xl hover:-translate-y-1
               active:scale-95">

        <p class="text-sm font-semibold text-gray-600 uppercase">
            Kunjungan Hari Ini
        </p>

        <div class="mt-4">
            <span class="text-5xl font-extrabold text-gray-900" x-text="hari"></span>
            <span class="text-lg font-medium text-gray-700"> Orang</span>
        </div>
    </div>

    <!-- MINGGU INI -->
    <div
        x-data="{ bounce:false }"
        @click="bounce = true; setTimeout(() => bounce = false, 250)"
        :class="bounce ? 'scale-105' : ''"
        class="bg-gray-200 rounded-2xl p-6 shadow-sm
               cursor-pointer
               transition-all duration-300
               hover:shadow-xl hover:-translate-y-1
               active:scale-95">

        <p class="text-sm font-semibold text-gray-600 uppercase">
            Kunjungan Minggu Ini
        </p>

        <div class="mt-4">
            <span class="text-5xl font-extrabold text-gray-900" x-text="minggu"></span>
            <span class="text-lg font-medium text-gray-700"> Orang</span>
        </div>
    </div>

    <!-- BULAN INI -->
    <div
        x-data="{ bounce:false }"
        @click="bounce = true; setTimeout(() => bounce = false, 250)"
        :class="bounce ? 'scale-105' : ''"
        class="bg-pink-50 rounded-2xl p-6 shadow-sm
               cursor-pointer
               transition-all duration-300
               hover:shadow-xl hover:-translate-y-1
               active:scale-95">

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
            @foreach ($keperluan as $item)
                @php
                    $persen = $totalKeperluan > 0
                        ? round(($item->total / $totalKeperluan) * 100, 1)
                        : 0;
                @endphp

                <div class="p-3 rounded-xl transition-all duration-300
                            hover:bg-gray-50 hover:-translate-y-1 hover:shadow-sm">

                    <div class="flex justify-between text-sm font-medium">
                        <span>{{ $item->keperluan }}</span>
                        <span>{{ $persen }}%</span>
                    </div>

                    <div class="w-full bg-gray-200 rounded-full h-2 mt-2 overflow-hidden">
                        <div class="h-2 rounded-full transition-all duration-500
                                    hover:scale-x-105 origin-left"
                            style="width: {{ $persen }}%;
                                    background-color: {{ collect([
                                        '#ef4444','#3b82f6','#facc15',
                                        '#22c55e','#a855f7','#14b8a6'
                                    ])->random() }}">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

{{-- CHART --}}
<script>
const pieCtx = document.getElementById('pieChart');

const labels = @json($keperluan->pluck('keperluan'));
const values = @json($keperluan->pluck('total'));

new Chart(pieCtx, {
    type: 'doughnut',
    data: {
        labels: labels,
        datasets: [{
            data: values,
            backgroundColor: [
                '#ef4444',
                '#3b82f6',
                '#facc15',
                '#22c55e',
                '#a855f7',
                '#14b8a6'
            ],
            hoverOffset: 18
        }]
    },
    options: {
        responsive: true,
        cutout: '65%',
        plugins: {
            legend: {
                position: 'bottom'
            },
            tooltip: {
                callbacks: {
                    label: function(context) {
                        const total = values.reduce((a,b)=>a+b,0);
                        const persen = ((context.raw / total) * 100).toFixed(1);
                        return context.label + ': ' + persen + '% (' + context.raw + ')';
                    }
                }
            }
        },
        animation: {
            animateRotate: true,
            animateScale: true
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
