<?php

namespace App\Http\Controllers;

use App\Models\Tamu;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // STATISTIK
        $hari = Tamu::whereDate('created_at', Carbon::today())->count();

        $minggu = Tamu::whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()
        ])->count();

        $bulan = Tamu::whereMonth('created_at', Carbon::now()->month)
                     ->whereYear('created_at', Carbon::now()->year)
                     ->count();

        $tahun = Tamu::whereYear('created_at', Carbon::now()->year)->count();

        // DATA PERIHAL
        $keperluan = Tamu::select('keperluan', DB::raw('COUNT(*) as total'))
            ->groupBy('keperluan')
            ->orderByDesc('total')
            ->get();

        // 👉 INI YANG TADI KURANG (PENTING)
        $totalKeperluan = $keperluan->sum('total');

        return view('pages.dashboard', compact(
            'hari',
            'minggu',
            'bulan',
            'tahun',
            'keperluan',
            'totalKeperluan'
        ));
    }
}
