<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Berita extends Model
{
    use HasFactory, Sluggable;

    //variabel yang boleh CRUD 
    // protected $fillable = [
    //     'title',
    //     'category_id',
    //     'slug',
    //     'excerpt',
    //     'body',
    // ];

    //variabel yang tidak boleh CRUD
    protected $guarded = ['id'];
    //setiap pemanggilan database akan sekalian disimpan data category dan authornya
    protected $with = ['category'];
    // properti untuk nilai default user_id
    // protected $attributes = [
    //     'user_id' => 1, 
    //     'author' => 'PDT STIS'// Gantilah nilai ini dengan nilai default yang diinginkan
    // ];

    //melakukan fungsi pencarian
    public function scopeFilter($query, array $filters) {
        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query->whereHas('category', function ($query) use ($category) {
                $query->where('slug', $category);
            });
        });
    
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('body', 'like', '%' . $search . '%')
                    ->orWhere('author', 'like', '%' . $search . '%');
            });
        });
    }

    //memakai category karena hubungannya hanya one to one
    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    } 
}
