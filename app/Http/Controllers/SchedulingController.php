<?php

namespace App\Http\Controllers;

use App\Models\Schedules;
use App\Models\User;
use Illuminate\Http\Request;

class SchedulingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('features.scheduling.Schedules');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $trainers = User::where('user_role', 2)->get();
        return view('features.scheduling.AddSchedule', [
            'trainers' => $trainers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Schedules::create([
            'staff_id' => $request->staff_id,
            'class_name' => $request->class_name,
            'date_time_start' => $request->date_time_start,
            'date_time_end' => $request->date_time_end,
            'max_clients' => $request->number_of_attendees,
            'number_of_attendees' => $request->max_clients,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $trainers = User::where('user_role', 2)->get();
        return view('features.scheduling.AddSchedule', [
            'trainers' => $trainers,
            'isEdit' => $id
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getAllSchedules()
    {
        return Schedules::with('instructor')->get();
    }

    public function getSpecificSchedule(Request $request)
    {
        return Schedules::with('instructor')->find($request->id);
    }

    public function editSchedule($id)
    {
        $trainers = User::where('user_role', 2)->get();
        $editValues = Schedules::with('instructor')->where('id', $id);
        return view('features.scheduling.AddSchedule', [
            'isEdit' => $id,
            'trainers' => $trainers
        ]);
    }

    public function deleteSchedule(Request $request)
    {
        Schedules::find($request->id)->delete();
    }
}
