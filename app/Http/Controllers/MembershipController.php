<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Membership;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MembershipController extends Controller
{
    //
    public function index()
    {
        $users = User::where('user_role', 3)->get();
        // $users = User::all();
        return view('features.membership.Membership')
            ->with('users', $users);
    }

    public function createMembership(Request $request)
    {
        // $dates = json_decode($request->dates);
        // $lastDate = end($dates);

        // foreach ($dates as $date) {
        // Membership::create([
        //     'user_id' => $request->user_id,
        //     'date_started' => $request->date,
        //     'date_ended' => $lastDate
        // ]);
        // }

        // foreach (json_decode($request->dates) as $date) {
        //     Membership::create([
        //         'user_id' => $request->user_id,
        //         'date_started' => $date,
        //         'date_ended' => end(json_decode($request->dates))
        //     ]);
        // }

        // ELOQUENT WAY
        Membership::create([
            'user_id' => $request->user_id,
            'date_started' => $request->date_started,
            'date_ended' => $request->date_ended,
        ]);

        // query builder way

        // DB::table('memberships')->insert([

        // ]);
    }
}
