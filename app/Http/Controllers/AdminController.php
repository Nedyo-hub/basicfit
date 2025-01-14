<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        $users = User::all(); // Haal alle gebruikers op
        return view('admin.dashboard', compact('users'));
    }

    public function promote($id)
    {   $user = User::findOrFail($id);
        if ($user->is_admin) {
            return redirect()->route('admin.dashboard')->with('info', 'Deze gebruiker is al een admin.');
        }

        $user->is_admin = true;
        $user->save();

        return redirect()->route('admin.dashboard')->with('success', 'De gebruiker is succesvol gepromoveerd tot admin.');
    }

    public function demote($id)
    {   $user = User::findOrFail($id);
        //  admin  kan zichzelf niet demoten
        if (auth()->id() === $user->id) {
            return redirect()->route('admin.dashboard')->with('error', 'Je kunt jezelf niet demoten.');
        }

        // Controleert of de gebruiker geen admin is
        if (!$user->is_admin) {
            return redirect()->route('admin.dashboard')->with('info', 'Deze gebruiker is geen admin.');
        }

        $user->is_admin = false;
        $user->save();

        return redirect()->route('admin.dashboard')->with('success', 'Adminrechten zijn succesvol verwijderd.');
    }


    public function create()
    {
        // Toon het formulier om een nieuwe gebruiker aan te maken
        return view('admin.users.create');
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'is_admin' => 'required|boolean',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'is_admin' => $validated['is_admin'],
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Nieuwe gebruiker succesvol aangemaakt.');
    }

}
