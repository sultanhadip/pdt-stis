<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{
    public function create()
    {
        return view('contact');
    }

    public function sendEmail(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'subject'=>'required',
            'content'=>'required',
        ]);

        $data = [
            'name'=> $request->name,
            'email'=> $request->email,
            'subject'=> $request->subject,
            'content'=> $request->content,
        ];

        // Mail::send('contact', $data, function($message) use ($data){
        //     $message->to($data['email'])->subject($data['subject']);
        // });
        
        Mail::to('contohlilis@gmail.com')->send(new ContactMail($data));

        return back()->with(['message'=> 'Email succesfully sent!']);
    }

    public function contact()
    {
        return view('contact');
    }
}
