<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class testimoni_feedback extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'testimoni',
        'feedback',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
