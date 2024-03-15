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
            $newImage = time() . auth()->user()->first_name . '.' . $request->profile_image->extension();
            $request->profile_image->move(public_path('images/user'), $newImage);
            auth()->user()->update(['profile_image' => $newImage]);
        }

        auth()->user()->update([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name ?? '',
            'last_name' => $request->last_name,
            'email' => $request->email,
        ]);

        return redirect()->back()->with('toast', [
            'status' => 'success',
            'message' => 'Your profile has been updated.',
        ]);;
    }
}
