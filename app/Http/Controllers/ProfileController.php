<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // Publieke profielpagina
    public function show(User $user)
    {
        // Geef de publieke profielpagina terug
        return view('profile.show', compact('user'));
    }

    // Profiel bewerken
    public function edit()
    {
        $user = Auth::user(); // Haal de ingelogde gebruiker op
        return view('profile.edit', compact('user')); // Return de edit view
    }

    // Profiel updaten
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'username' => 'nullable|string|max:255',
            'birthday' => 'nullable|date',
            'profile_picture' => 'nullable|image|max:2048', // Max grootte 2MB
            'about_me' => 'nullable|string|max:500',
        ]);

        // Velden updaten
        $user->username = $request->username;
        $user->birthday = $request->birthday;
        $user->about_me = $request->about_me;

        // Profielfoto uploaden
        if ($request->hasFile('profile_picture')) {
            if ($user->profile_picture) {
                Storage::delete($user->profile_picture);
            }

            // Upload de nieuwe profielfoto
            $path = $request->file('profile_picture')->store('profile_pictures');
            $user->profile_picture = $path;
        }

        $user->save();

        return redirect()->route('profile.edit')->with('success', 'Profiel bijgewerkt.');
    }

    // Profiel verwijderen
    public function destroy()
    {
        $user = Auth::user();

        // Profielfoto verwijderen van de server, als deze bestaat
        if ($user->profile_picture) {
            Storage::delete($user->profile_picture);
        }

        $user->delete(); // Gebruiker verwijderen

        return redirect('/')->with('success', 'Profiel verwijderd.');
    }
}
