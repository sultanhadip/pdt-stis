<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostGallery extends Model
{
    protected $table = 'galleries';
    protected $fillable = ['filename', 'title', 'caption', 'tahun'];

    //variabel yang tidak boleh CRUD
    protected $guarded = ['id'];

    //melakukan fungsi pencarian
    public function scopeFilter($query, array $filters) {
        // $query->when($filters['category'] ?? false, function ($query, $category) {
        //     return $query->whereHas('category', function ($query) use ($category) {
        //         $query->where('slug', $category);
        //     });
        // });
    
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('caption', 'like', '%' . $search . '%')
                    ->orWhere('tahun', 'like', '%' . $search . '%');
            });
        });
    }


    public function getRouteKeyName()
    {
        return 'id';
    }

    // public function sluggable(): array
    // {
    //     return [
    //         'slug' => [
    //             'source' => 'title'
    //         ]
    //     ];
    // } 
}
