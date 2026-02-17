<?php

namespace App\Http\Controllers;

use App\Models\PostGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $activeCategory = null;

        // if(request('category')) {
        //     $activeCategory = Category::firstWhere('slug', request('category'));
        // }
        return view('dashboard.index', [
            "galleries" => PostGallery::orderBy('id', 'desc')->filter(request(['search']))->paginate(10)->withQueryString(),    
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.create');
    }

    /**
     * Store a newly created resource in storage.
     */
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
                $filenames = $gallery->hashName();
                $gallery->move('storage/posts', $filenames);
    
                PostGallery::create([
                    'filename' =>  $filenames,
                    'tahun' => $tahun,
                    'title' => $title,
                    'caption' => $caption,
                ]);
            }
            return redirect('/dashboard/galeri')->with(['succes'=> 'Foto berhasil ditambahkan!']);
        }
        return redirect('/dashboard/galeri')->with(['error' => 'Tidak ada file yang diunggah.']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $gallery = PostGallery::where('id', $id)->firstOrFail();

        return view('dashboard.show', [
            'gallery'=> $gallery,
            'title' => $gallery->title,
            'caption' => $gallery->caption,
            'tahun' => $gallery->tahun,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $gallery = PostGallery::where('id', $id)->firstOrFail();
        return view('dashboard.edit', [
            'gallery' => $gallery,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $gallery = PostGallery::where('id', $id)->firstOrFail();
        $rules = [
            'filename' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'title' => 'required',
            'caption' => 'required',
            'tahun' => 'required'
        ];


        $validatedData = $request->validate($rules);
        //$validatedData['excerpt'] = Str::limit(strip_tags($request->body), 100);

        if($request->file('filename')) {
            if($request->oldFilename) {
                Storage::delete($request->oldFilename);
            }
            $validatedData['filename'] = $request->file('filename')->store();
        }

        PostGallery::where('id', $gallery->id)
                    ->update($validatedData);

        return redirect('/dashboard/galeri')->with('success', 'Foto berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $gallery = PostGallery::where('id', $id)->firstOrFail();
        if($gallery->filename) {
            Storage::delete($gallery->filename);
        }
        PostGallery::destroy($gallery->id);
        return redirect('/dashboard/galeri')->with('error', 'Foto berhasil dihapus.');
    }
}