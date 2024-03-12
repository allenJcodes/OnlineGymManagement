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

        if ($request->profile_image) {
            $extension = $request->profile_image->extension();
            $newImage = $request->profile_image->storeAs('images/user/', auth()->user()->id . '.' . $extension, 'public');
        }

        auth()->user()->update([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name ?? '',
            'last_name' => $request->last_name,
            'email' => $request->email,
            'profile_image' => $newImage ?? ''
        ]);

        return redirect()->back()->with('toast', [
            'status' => 'success',
            'message' => 'Your profile has been updated.',
        ]);;
    }
}
