<?php

namespace App\Http\Controllers;

use App\Models\UserAttendance;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::where('id', $request->user_id)->with(['subscriptions' => function($q) {
            $q->where('subscriptions.status', 2);
        }, 'subscriptions.subscriptionTypes'])->first();

        if ($user->subscriptions->count() == 0) {
            return redirect()->back()->with('toast', [
                'status' => 'error',
                'message' => "$user->full_name has no active subscription."
            ]);
        }

        if ($user->subscriptions[0]->status != 2) {
            return redirect()->back()->with('toast', [
                'status' => 'error',
                'message' => "$user->full_name's subscription has expired."
            ]);
        }

        UserAttendance::insert([
            'user_id' => $request->user_id,
            'attendance_id' => $request->attendance_id,
            'time_in' => now(),
        ]);
        return redirect()->back()->with('toast', [
            'status' => 'success',
            'message' => "$user->full_name has timed in successfully."
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserAttendance  $userAttendance
     * @return \Illuminate\Http\Response
     */
    public function show(UserAttendance $userAttendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserAttendance  $userAttendance
     * @return \Illuminate\Http\Response
     */
    public function edit(UserAttendance $userAttendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserAttendance  $userAttendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserAttendance $userAttendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserAttendance  $userAttendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserAttendance $userAttendance)
    {
        //
    }
}
