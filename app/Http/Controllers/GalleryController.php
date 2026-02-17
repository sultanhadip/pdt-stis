<?php

namespace App\Http\Controllers;

use App\Models\PostGallery;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function create()
    {
        return view('upload-galeri');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'filename.*' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'title' => 'required',
            'caption' => 'required',
            'tahun' => 'required',
        ]);
        
        $title = $request->input('title');
        $caption = $request->input('caption');
        $tahun = $request->input('tahun');


        if ($request->hasFile('filename')) {
            foreach ($request->file('filename') as $gallery) {
                $gallery->storeAs('public/posts', $gallery->hashName());
    
                PostGallery::create([
                    'filename' =>  $gallery->hashName(),
                    'tahun' => $tahun,
                    'title' => $title,
                    'caption' => $caption,
                ]);
            }
            return redirect('/admin/upload-galeri')->with(['succes'=> 'Foto berhasil ditambahkan!']);
        }
        return redirect('/admin/upload-galeri')->with(['error' => 'Tidak ada file yang diunggah.']);
    }
}
