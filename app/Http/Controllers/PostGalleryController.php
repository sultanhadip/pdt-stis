<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostGallery;

class PostGalleryController extends Controller
{
    /**
     * index
     * 
     * @return void
     */
    public function index()
    {
        //get post
        $galleries = PostGallery::all();

        //render view with posts
        return view('gallery', compact('galleries'));
    }

    public function filterByYear($year)
    {
        $galleries = PostGallery::where('tahun', $year)->get();
        return view('galeri-filter', compact('galleries'));
    }
}
