<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;
    protected $table = 'pengeluaran';
    protected $fillable = ['id_lap', 'ket_pendanaan','total', 'tanggal_pengeluaran'];

    public function lapKeuangan()
    {
        return $this->belongsTo(laporan_keuangan::class, 'id_lap');
    }
}
