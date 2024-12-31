<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    // Toon publieke profielpagina
    public function show(User $user)
    {
        return view('profile.show', ['user' => $user]);
    }

    // Formulier om profiel te bewerken
    public function edit()
    {
        $user = auth()->user();
        return view('profile.edit', ['user' => $user]);
    }

    // Profiel updaten
    public function update(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'username' => 'nullable|string|max:255',
            'birthday' => 'nullable|date',
            'profile_picture' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'about_me' => 'nullable|string|max:500',
        ]);

        // Profielfoto uploaden
        if ($request->hasFile('profile_picture')) {
            if ($user->profile_picture) {
                Storage::delete($user->profile_picture);
            }
            $validated['profile_picture'] = $request->file('profile_picture')->store('profile_pictures');
        }

        $user->update($validated);

        return redirect()->route('profile.edit')->with('success', 'Profiel succesvol bijgewerkt.');
    }
}