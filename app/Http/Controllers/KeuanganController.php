<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaporanKeuangan;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;

class KeuanganController extends Controller
{
    //delete data
    public function destroy(LaporanKeuangan $id)
    {
        $id->delete();
        notify()->success('Data berhasil dihapus!');
        return redirect('/admin/keuangan/laporan');
    }

    //edit data

}
