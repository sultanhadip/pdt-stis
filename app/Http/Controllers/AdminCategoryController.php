<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.kategori.index', [
            "categories" => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.kategori.create', [
            "categories" => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'name' => 'required|max:255',
    //         'slug' => 'required|unique:categories'
    //     ]);

    //     Category::create($validatedData);
    //     return redirect('/dashboard/kategori')->with('success', 'Kategori baru berhasil ditambahkan.');
    // }

    public function store(Request $request)
    {
        // Validasi
        $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|unique:categories'
        ]);

        // Periksa apakah nama kategori sudah ada dalam database
        $existingCategory = Category::where('name', $request->name)->first();

        if ($existingCategory) {
            // Jika sudah ada, kembalikan pesan kesalahan
            return redirect('/dashboard/kategori')->with('error', 'Kategori sudah ada dalam database.');
        }

        // Jika tidak ada, tambahkan kategori ke database
        Category::create([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);

        return redirect('/dashboard/kategori')->with('success', 'Kategori baru berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        Category::destroy($category->id);
        return redirect('/dashboard/kategori')->with('success', 'Kategori berhasil dihapus.');
    }

    public function checkSlug(Request $request) {
        $slug = SlugService::createSlug(Category::class, 'slug', $request->name);
        return response() -> json(['slug' => $slug]);
    }
}
