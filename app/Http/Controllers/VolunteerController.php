<?php

namespace App\Http\Controllers;
use App\Models\Volunteer;
use Illuminate\View\View;
use Illuminate\Http\Request;

class VolunteerController extends Controller
{
    public function index(): View
    {
        $volunteers = Volunteer::latest()->paginate(5);
        return view('volunteer.index',compact('volunteers'));
    }

    public function create(){
        return view('volunteer.add');
    }

    public function daftarVolunteer(){
        return view('volunteerHome');
    }
    public function store(Request $request)
{
    // Validate the form data
    $request->validate([
        'user_id' => 'required',
        'nim' => 'required',
        'devisi' => 'required',
        'no_wa' => 'required',
        'link' => 'required|mimes:pdf|max:10240',
    ]);

    // Save the data to the database
    Volunteer::create($request->all());

    // Redirect or return a response as needed
    return redirect()->route('volunteers.index')->with('success', 'Volunteer created successfully');
}

}