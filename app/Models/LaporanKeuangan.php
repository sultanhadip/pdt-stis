<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanKeuangan extends Model
{
    use HasFactory;
    protected $table = 'lap_keuangan';
    protected $fillable = ['name', 'debit', 'created_at', 'donation_id', 'tipe', 'tanggal'];


    public function donation()
    {
        return $this->belongsTo(Donations::class, 'donation_id');
    }

    public function pengeluarans()
    {
        return $this->hasMany(Pengeluaran::class, 'id_lap');
    }

    public function pemasukans()
    {
        return $this->hasMany(Pemasukan::class, 'id_lap');
    }
}
