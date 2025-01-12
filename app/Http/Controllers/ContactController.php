<?php
namespace App\Http\Controllers;
use App\Mail\ContactMessage;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.contact'); 
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string|max:2000',
        ]);

        
        \Mail::to('admin@ehb.be')->send(new \App\Mail\ContactMessage($validated));

        return redirect()->route('contact')->with('success', 'Je bericht is succesvol verstuurd!');
    }
}
