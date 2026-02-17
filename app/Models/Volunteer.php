<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    use HasFactory;
    protected $table = 'volunteers';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'nim',
        'devisi',
        'no_wa',
        'link',
        'status_pendaftaran',
        'created_at',
        'update_at',
    ];
}