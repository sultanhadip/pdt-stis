<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades;

class Gallery extends Model
{
    use HasFactory;
    protected $fillable = ['filename', 'title', 'caption', 'tahun'];
}
