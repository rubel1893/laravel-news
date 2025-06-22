<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function submit(Request $request)
    {
        $data = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'message' => 'required|string',
        ]);

        // Optionally send email or store in DB

        // Example: send mail (you must configure mail settings in .env)
        /*
        Mail::to('admin@example.com')->send(new \App\Mail\ContactMessage($data));
        */

        return back()->with('success', 'Thank you for your message!');
    }
}
