<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventPdt extends Model
{
    use HasFactory;
    
    protected $table = 'event_pdt';
    protected $casts = [
        'waktu_mulai' => 'datetime',
        'waktu_akhir' => 'datetime',
    ];
    protected $fillable = [
        'title',
        'description',
        'quota',
        'lokasi',
        'waktu_mulai',
        'waktu_akhir',
    ];


    public function approvedDonationsSum()
    {
        $donations = $this->donations()
            ->where('status', 'disetujui')
            ->whereBetween('created_at', [$this->waktu_mulai, $this->waktu_akhir])
            ->get();

        return $donations->sum('nominal');
    }

}
