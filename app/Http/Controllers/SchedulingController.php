<?php

namespace App\Http\Controllers;

use App\Http\Requests\Scheduling\SchedulingStoreRequest;
use App\Models\Instructor;
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
        $instructors = Instructor::get();
        return view('features.scheduling.AddSchedule', compact('instructors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SchedulingStoreRequest $request)
    {
        // dd($request->date_time_start);
        $checkConflicts = Schedules::where(function($query) use ($request) {
            $query->where('date_time_start', '<=', $request->date_time_start)
            ->where('date_time_end', '>=', $request->date_time_end);
        })
        ->orWhere(function($query) use ($request) {
            $query->whereBetween('date_time_start', [$request->date_time_start, $request->date_time_end])
            ->orWhereBetween('date_time_end', [$request->date_time_start, $request->date_time_end]);
        })->get();

        if(count($checkConflicts)) {
            return back()->with('message', 'Overlapping Schedule');
        }
        
        Schedules::create([...$request->validated(), 'max_clients' =>  $request->number_of_attendees]);
        return redirect()->route('scheduling.index');
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
        $schedule = Schedules::find($id);
        $instructors = Instructor::get();
        return view('features.scheduling.EditSchedule', compact('instructors', 'schedule'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SchedulingStoreRequest $request, Schedules $scheduling)
    {
        $checkConflicts = Schedules::where('id', '!=', $scheduling->id)
        ->where(function($q) use ($request) {
            $q->where(function($query) use ($request) {
                $query->where('date_time_start', '<=', $request->date_time_start)
                ->where('date_time_end', '>=', $request->date_time_end);
            })
            ->orWhere(function($query) use ($request) {
                $query->whereBetween('date_time_start', [$request->date_time_start, $request->date_time_end])
                ->orWhereBetween('date_time_end', [$request->date_time_start, $request->date_time_end]);
            });
        }) 
        ->get();

        if(count($checkConflicts)) {
            return back()->with('message', 'Overlapping Schedule');
        }

        $scheduling->update([...$request->validated(), 'max_clients' =>  $request->number_of_attendees]);
        return redirect()->route('scheduling.index');
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
