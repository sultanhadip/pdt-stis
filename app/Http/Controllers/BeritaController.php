<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Category;

class BeritaController extends Controller
{
    public function index() {
        $title = '';
        $activeCategory = null;

        if(request('category')) {
            $activeCategory = Category::firstWhere('slug', request('category'));
            $title = ": " . $activeCategory->name;
        }
        return view('berita', [
            "title" => "Berita" . $title,
            "berita" => Berita::latest()->filter(request(['search', 'category']))->paginate(5)->withQueryString(),
            "categories" => Category::all(),
            "activeCategory" => $activeCategory,      
            "recentPost" => Berita::latest()->take(5)->get()
        ]);
    }

    public function show($slug) {
        $berita = Berita::where('slug', $slug)->firstOrFail();
    
        return view('berita-single', [
            "title" => $berita->title,
            "berita" => $berita,
            "categories" => Category::all(),
            "activeCategory" => null,
            "recentPost" => Berita::latest()->take(5)->get()
        ]);
    }
}

