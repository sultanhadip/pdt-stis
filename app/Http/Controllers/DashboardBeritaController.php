<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardBeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('dashboard.berita.index', [
        //     "berita" => Berita::latest()->paginate(10)->withQueryString(),
        // ]);
        $activeCategory = null;

        if(request('category')) {
            $activeCategory = Category::firstWhere('slug', request('category'));
        }
        return view('dashboard.berita.index', [
            "berita" => Berita::latest()->filter(request(['search', 'category']))->paginate(10)->withQueryString(),
            "categories" => Category::all(),
            "activeCategory" => $activeCategory     
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.berita.create', [
            "categories" => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->file('image')->store('berita-images');

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:beritas',
            'author' => 'required',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ]);

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('berita-images');
        }

        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 100);

        Berita::create($validatedData);

        return redirect('/dashboard/berita')->with('success', 'Berita baru berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    // public function show(Berita $berita)
    // {
    //     return $berita;
    //     // return view('dashboard.berita.show', [
    //     //     "berita" => $berita
    //     // ]);
    // }

    public function show($slug) {
        $berita = Berita::where('slug', $slug)->firstOrFail();
    
        return view('dashboard.berita.show', [
            "title" => $berita->title,
            "berita" => $berita,
            "categories" => Category::all(),
            "activeCategory" => null,
            "recentPost" => Berita::latest()->take(5)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Berita $berita)
    // {
    //     return view('dashboard.berita.edit', [
    //         "berita" => $berita,
    //         "categories" => Category::all()
    //     ]);
    // }

    public function edit($slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();
        return view('dashboard.berita.edit', [
            "berita" => $berita,
            "categories" => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();
        $rules = [
            'title' => 'required|max:255',
            'author' => 'required',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ];

        if($request->slug != $berita->slug) {
            $rules['slug'] = 'required|unique:beritas';
        }

        $validatedData = $request->validate($rules);
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 100);

        if($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('berita-images');
        }

        Berita::where('id', $berita->id)
                    ->update($validatedData);

        return redirect('/dashboard/berita')->with('success', 'Berita berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     * *
     * @param \App\Models\Berita $berita
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Berita $berita)
    // {
    //     Berita::destroy($berita->id);
    //     return redirect('/dashboard/berita')->with('success', 'Berita berhasil dihapus.');
    // }

    public function destroy($slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();
        if($berita->image) {
            Storage::delete($berita->image);
        }
        Berita::destroy($berita->id);
        return redirect('/dashboard/berita')->with('error', 'Berita berhasil dihapus.');
    }

    public function checkSlug(Request $request) {
        $slug = SlugService::createSlug(Berita::class, 'slug', $request->title);
        return response() -> json(['slug' => $slug]);
    }
}
