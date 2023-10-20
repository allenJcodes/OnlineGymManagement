<?php

namespace App\Http\Controllers\modules;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function index()
    {
        $users = DB::table('users')
            ->get();
        return view('features.users.Users', [
            'users' => $users
        ]);
    }

    public function addUsers()
    {
        return view('features.users.addUsers');
    }

    public function registerUser(Request $request)
    {

        DB::table('users')->insert([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => $request['password'],
            'user_role' => $request['user_role'],
        ]);


        return redirect('/users');
    }
}