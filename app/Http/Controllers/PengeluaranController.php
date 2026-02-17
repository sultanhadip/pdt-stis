<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengeluaran;
use Carbon\Carbon;
use App\Models\LaporanKeuangan;

class PengeluaranController extends Controller
{
    public function create()
    {
        return view('keuangan.pengeluaran');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jenisPengeluaran' => 'required|string',
            'deskripsiPengeluaran' => 'required|string',
            'nominal' => 'required|numeric',
        ]);

        $laporan = LaporanKeuangan::create([
            'name' => $request->input('jenisPengeluaran'),
            'tipe' => 'Pengeluaran',
            'debit' => $request->input('nominal'),
            'tanggal' => $request->input('tanggal'),
        ]);

        $tanggalPengeluaran = Carbon::parse($request->input('tanggal'));
        Pengeluaran::create([
            'id_lap' => $laporan->id,
            'tanggal_pengeluaran' => $request->input('tanggal'),
            'ket_pendanaan' => $request->input('deskripsiPengeluaran'),
            'total' => $request->input('nominal'),
        ]);

        notify()->success('Pengeluaran berhasil dibuat');
        return redirect()->to('/admin/keuangan/pengeluaran');
    }

    public function edit($id)
    {
        try {
            $pengeluaran = Pengeluaran::where('id_lap', $id)->firstOrFail();
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->route('laporan.viewLaporan')->with('error', 'Record not found.');
        }

        return view('keuangan.edit_pengeluaran', compact('pengeluaran'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jenisPengeluaran' => 'required|string',
            'deskripsiPengeluaran' => 'required|string',
            'nominal' => 'required|numeric',
        ]);

        $tanggalPengeluaran = Carbon::parse($request->input('tanggal'));
        $pengeluaran = Pengeluaran::findOrFail($id);
        $laporan = LaporanKeuangan::findOrFail($pengeluaran->id_lap);

        $pengeluaran->update([
            'tanggal_pengeluaran' => $request->input('tanggal'),
            'ket_pendanaan' => $request->input('deskripsiPengeluaran'),
            'total' => $request->input('nominal'),
        ]);

        $name = $request->input('deskripsiPengeluaran');
        $tanggal = $request->input('tanggal');
        $debit = $request->input('nominal');

        $laporan->update([
            'name' => $name,
            'tanggal' => $tanggal,
            'debit' => $debit,
        ]);

        notify()->success('Pengeluaran berhasil diupdate');
        return redirect()->to('/admin/keuangan');
    }

    public function destroy($id)
    {
        $laporan = LaporanKeuangan::findOrFail($id);
        $pengeluaran = Pengeluaran::where('id_lap', $id)->firstOrFail();

        $pengeluaran->delete();

        $laporan->delete();

        notify()->success('Pengeluaran berhasil dihapus');
        return redirect()->to('/admin/keuangan');
    }
}
