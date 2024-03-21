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
        $users = User::search()->with('role')->paginate(10);
        return view('features.users.Users', compact('users'));
    }

    public function create() {
        return view('features.users.addUsers');
    }

    public function store(UserStoreRequest $request) {
        User::create($request->validated());
        return redirect()->route('user.index')->with('toast', [
            'status' => 'success',
            'message' => 'User added successfully.',
        ]);;
    }

    public function edit(User $user) {
        return view('features.users.editUsers', compact('user'));
    }

    public function update(UserUpdateRequest $request, User $user) {
        if ($request->password) {
            $user->update(['password' => Hash::make($request->password)]);
        }

        if ($request->profile_image) {
            $newImage = time() . auth()->user()->first_name . '.' . $request->profile_image->extension();
            $request->profile_image->move(public_path('images/user'), $newImage);
            $user->update(['profile_image' => $newImage]);

        }

        $user->update([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name ?? '',
            'last_name' => $request->last_name,
            'email' => $request->email,
            'user_role' => $request->user_role,
        ]);

        return redirect()->route('user.index')->with('toast', [
            'status' => 'success',
            'message' => 'User updated successfully.',
        ]);;
    }

    public function destroy(User $user) {
        if($user->user_role == 1) {
            return back()->with('toast', [
                'status' => 'error',
                'message' => 'Cannot delete user with admin role.',
            ]);
        }

        $user->delete();
        return redirect()->route('user.index')->with('toast', [
            'status' => 'success',
            'message' => 'User deleted successfully.',
        ]);
    }

    // end

}