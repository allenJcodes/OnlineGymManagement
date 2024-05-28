<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\ClassName;
use App\Models\Schedules;
use App\Models\Attendance;
use App\Models\Instructor;
use Illuminate\Http\Request;
use App\Http\Requests\Scheduling\SchedulingStoreRequest;

class SchedulingController extends Controller
{
    public function __construct()
    {
        // $this->authorizeResource(Schedules::class, 'schedules');
    }
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
        $classNames = ClassName::get();
        $instructors = Instructor::with('user')->get();
        return view('features.scheduling.AddSchedule', compact('instructors', 'classNames'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SchedulingStoreRequest $request)
    {
        // Check Schedule Conflicts
        $time_start = Carbon::parse($request->date_time_start)->toDateTimeString();
        $time_end = Carbon::parse($request->date_time_end)->toDateTimeString();

        if(Carbon::parse($request->date_time_end)->lt(Carbon::parse($request->date_time_start)->addHour())) {
            return back()->with('toast', [
                'status' => 'error',
                'message' => 'Schedules should be at least 1 hour.',
            ]);
        }

        $checkConflicts = Schedules::where('instructor_id', $request->instructor_id)
        ->where(function($q) use ($time_start, $time_end) {
            $q->where(function($subQ) use ($time_start, $time_end) {
                $subQ->where('date_time_start', '<=', $time_start)
                ->where('date_time_end', '>=', $time_end);
            })
            ->orWhere(function($subQ) use ($time_start, $time_end) {
                $subQ->whereBetween('date_time_start', [$time_start, $time_end])
                ->orWhereBetween('date_time_end', [$time_start, $time_end]);
            });
        }) 
        ->get();

        if(count($checkConflicts)) {
            return back()->with('toast', [
                'status' => 'error',
                'message' => 'Adding of schedule failed. Please check for schedule conflicts.',
            ]);
        }
        
        // Create Schedule and Attendance record
        $schedule = Schedules::create([...$request->validated(), 'max_clients' =>  $request->number_of_attendees]);
        
        Attendance::create(['schedule_id' => $schedule->id]);

        return redirect()->route('scheduling.index')->with('toast', [
            'status' => 'success',
            'message' => 'Schedule added successfully.',
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
        $classNames = ClassName::get();
        $schedule = Schedules::find($id);
        $instructors = Instructor::with('user')->get();
        return view('features.scheduling.EditSchedule', compact('instructors', 'schedule', 'classNames'));
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
        $checkConflicts = Schedules::where('instructor_id', $request->instructor_id)
        ->where('id', '!=', $scheduling->id)
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
            return back()->with('toast', [
                'status' => 'error',
                'message' => 'Updating of schedule failed. Please check for conflicts.',
            ]);;
        }

        $scheduling->update([...$request->validated(), 'max_clients' =>  $request->number_of_attendees]);
        return redirect()->route('scheduling.index')->with('toast', [
            'status' => 'success',
            'message' => 'Schedule updated successfully.',
        ]);
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
        return Schedules::with('instructor.user')->get();
    }

    public function getSpecificSchedule(Request $request)
    {
        return Schedules::with('instructor.user')->find($request->id);
    }

    public function deleteSchedule(Request $request)
    {
        Schedules::find($request->id)->delete();
    }
}
