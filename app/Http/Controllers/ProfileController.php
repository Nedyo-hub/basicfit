<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Toon publieke profielpagina.
     */
    public function show(User $user)
    {
        return view('profile.show', ['user' => $user]);
    }

    /**
     * Toon profiel bewerken pagina voor ingelogde gebruiker.
     */
    public function edit()
    {
        $user = auth()->user(); 
        return view('profile.edit', ['user' => $user]); 
        dd(auth()->user());

    }

    /**
     * Update het profiel van de ingelogde gebruiker.
     */
    public function update(Request $request)
    {
        $user = auth()->user();

        // Validatie van input
        $validated = $request->validate([
            'username' => 'nullable|string|max:255',
            'birthday' => 'nullable|date',
            'profile_picture' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'about_me' => 'nullable|string|max:500',
        ]);

        // Profielfoto uploaden
        if ($request->hasFile('profile_picture')) {
            // Oude profielfoto verwijderen als er een is
            if ($user->profile_picture) {
                Storage::delete($user->profile_picture);
            }

            // Nieuwe profielfoto opslaan
            $validated['profile_picture'] = $request->file('profile_picture')->store('profile_pictures');
        }

        // Gebruikersgegevens updaten
        $user->update($validated);

        // Redirect met succesbericht
        return redirect()->route('profile.edit')->with('success', 'Profiel succesvol bijgewerkt.');
    }
}
