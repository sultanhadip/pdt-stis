<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donations extends Model
{
    use HasFactory;

    protected $table = 'donations';
    protected $fillable = [
        'user_id', 
        'nominal', 
        'link', 
        'pesan', 
        'nama',
        'metode',
        'event_pdt_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function eventPdt()
    {
        return $this->belongsTo(EventPdt::class);
    }

    public function pemasukan()
    {
        return $this->hasOne(Pemasukan::class, 'donation_id');
    }

}
