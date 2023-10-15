<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    //
    public function index()
    {
        $users = User::where('user_role', 3)->get();
        // $users = User::all();
        return view('features.membership.Membership')->with('users', $users);
    }
}
