<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Profile\ProfileUpdateRequest;

class ProfileController extends Controller
{
    public function show()
    {
        return view('features.profile.Profile');
    }

    public function update(ProfileUpdateRequest $request)
    {
        if ($request->password) {
            auth()->user()->update(['password' => Hash::make($request->password)]);
        }

        auth()->user()->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        if ($request->hasFile('profile_image')){
            $profile_image = Storage::disk('public')->put('/profile' . '/' . auth()->user()->id, $request->file('profile_image'));
            auth()->user()->update(['profile_image' => $profile_image]);
        } 

        return redirect()->back()->with('success', 'Your profile has been updated');
    }
}
