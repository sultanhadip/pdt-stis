<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemasukan;
use Carbon\Carbon;
use App\Models\LaporanKeuangan;

class PemasukanController extends Controller
{
    public function create()
    {
        return view('keuangan.pemasukan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jenisPemasukan' => 'required|string',
            'deskripsiPemasukan' => 'required|string',
            'nominal' => 'required|numeric',
        ]);

        $tanggalPemasukan = Carbon::parse($request->input('tanggal'));

        $laporan = LaporanKeuangan::create([
            'name' => $request->input('jenisPemasukan'),
            'tipe' => 'Pemasukan',
            'debit' => $request->input('nominal'),
            'tanggal' => $tanggalPemasukan,
        ]);

        Pemasukan::create([
            'id_lap' => $laporan->id,
            'tanggal_pemasukan' => $tanggalPemasukan,
            'ket_pendanaan' => $request->input('deskripsiPemasukan'),
            'total' => $request->input('nominal'),
        ]);

        notify()->success('Pemasukan berhasil dibuat');
        return redirect()->to('/admin/keuangan/pemasukan');
    }

    public function edit($id)
    {
        try {
            $pemasukan = Pemasukan::where('id_lap', $id)->firstOrFail();
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->route('laporan.viewLaporan')->with('error', 'Record not found.');
        }
        return view('keuangan.edit_pemasukan', compact('pemasukan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jenisPemasukan' => 'required|string',
            'deskripsiPemasukan' => 'required|string',
            'nominal' => 'required|numeric',
        ]);

        $tanggalPemasukan = Carbon::parse($request->input('tanggal'));
        $pemasukan = Pemasukan::findOrFail($id);
        $laporan = LaporanKeuangan::findOrFail($pemasukan->id_lap);

        $pemasukan->update([
            'tanggal_pemasukan' => $request->input('tanggal'),
            'ket_pendanaan' => $request->input('deskripsiPemasukan'),
            'total' => $request->input('nominal'),
        ]);

        $name = $request->input('deskripsiPemasukan');
        $tanggal = $request->input('tanggal');
        $debit = $request->input('nominal');

        $laporan->update([
            'name' => $name,
            'tanggal' => $tanggal,
            'debit' => $debit,
        ]);

        notify()->success('Pemasukan berhasil diupdate');
        return redirect()->to('/admin/keuangan');
    }

    public function destroy($id)
    {
        $laporan = LaporanKeuangan::findOrFail($id);
        $pemasukan = Pemasukan::where('id_lap', $id)->firstOrFail();

        $pemasukan->delete();
        $laporan->delete();

        notify()->success('Pemasukan berhasil dihapus');
        return redirect()->to('/admin/keuangan');
    }
}
