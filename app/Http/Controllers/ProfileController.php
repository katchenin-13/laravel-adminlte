<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    public function index()
    {
        return view('auth.profile');
    }

    public function update(ProfileUpdateRequest $request)
    {
        $user = auth()->user();
        $input = $request->only(['name', 'email','pseudo']);

        // Mise à jour du mot de passe
        if ($request->filled('password')) {
            $input['password'] = Hash::make($request->password);
        }

        // Gestion de l'avatar
        if ($request->hasFile('avatar')) {
            $avatarName = time() . '.' . $request->avatar->getClientOriginalExtension();
            $request->avatar->move(public_path('images'), $avatarName);
            $input['avatar'] = $avatarName;
        }

        // Mise à jour de l'utilisateur
        $user->update($input);

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully.');
    }
}
