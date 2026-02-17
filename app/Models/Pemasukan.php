<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    use HasFactory;

    protected $table = 'pemasukan';
    protected $fillable = ['donation_id', 'id_lap', 'ket_pendanaan', 'total', 'tanggal_pemasukan'];

    public function donation()
    {
        return $this->belongsTo(Donations::class, 'donation_id');
    }

    public function lapKeuangan()
    {
        return $this->belongsTo(laporan_keuangan::class, 'id_lap');
    }
}
