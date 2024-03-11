<?php

namespace App\Http\Controllers\modules;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Users\UserStoreRequest;
use App\Http\Requests\Users\UserUpdateRequest;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::with('role')->paginate(10);
        return view('features.users.Users', compact('users'));
    }

    public function create() {
        return view('features.users.addUsers');
    }

    public function store(UserStoreRequest $request) {
        User::create($request->validated());
        return redirect()->route('users');
    }

    public function edit(User $user) {
        return view('features.users.editUsers', compact('user'));
    }

    public function update(UserUpdateRequest $request, User $user) {
        if ($request->password) {
            $user->update(['password' => Hash::make($request->password)]);
        }

        $user->update([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name ?? '',
            'last_name' => $request->last_name,
            'email' => $request->email,
            // 'profile_image' => $newImage ?? '',
            'user_role' => $request->user_role,
        ]);

        return redirect()->route('users');
    }

    public function destroy(User $user) {
        $user->delete();
        return redirect()->route('users');
    }

    // end

}