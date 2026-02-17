<?php

namespace App\Http\Controllers;
use App\Models\LaporanKeuangan;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function viewLaporan()
    {
        return view('keuangan.keuangan');
    }

    public function totalDebitByTypeAndMonth()
    {
        $totalPemasukan = LaporanKeuangan::where('tipe', 'Pemasukan')
            ->whereNotNull('created_at')
            ->groupBy(DB::raw('YEAR(created_at)'), DB::raw('MONTH(created_at)'))
            ->orderBy(DB::raw('YEAR(created_at)'), 'desc')
            ->orderBy(DB::raw('MONTH(created_at)'), 'desc')
            ->select(
                DB::raw('YEAR(created_at) as year'),
                DB::raw('MONTH(created_at) as month'),
                DB::raw('SUM(debit) as total')
            )
            ->get();

        $totalPengeluaran = LaporanKeuangan::where('tipe', 'Pengeluaran')
            ->whereNotNull('created_at')
            ->groupBy(DB::raw('YEAR(created_at)'), DB::raw('MONTH(created_at)'))
            ->orderBy(DB::raw('YEAR(created_at)'), 'desc')
            ->orderBy(DB::raw('MONTH(created_at)'), 'desc')
            ->select(
                DB::raw('YEAR(created_at) as year'),
                DB::raw('MONTH(created_at) as month'),
                DB::raw('SUM(debit) as total')
            )
            ->get();

            $approvedSum = DB::table('donations')->where('status', 'disetujui')->sum('nominal');

        return view('keuangan.grap', compact('totalPemasukan', 'totalPengeluaran', 'approvedSum'));
    }

}
