<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Reservation;
use App\Models\Schedules;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::with(['schedule', 'userAttendances', 'schedule.instructor'])->get();
        return view('features.attendance.Attendance', compact('attendances'));
    }

    public function create() {

    }

    public function store(Request $request) {
    
    }

    public function show(Attendance $attendance) {
        $attendance = Attendance::with(['schedule', 'userAttendances.user', 'userAttendances' => function ($q) {
            $q->orderBy('user_attendances.time_in', 'desc');
        }])->first();
        return view('features.attendance.showAttendance', compact(['attendance']));
    }

    public function edit(Attendance $attendance) {
        
    }

    public function update(Request $request, Attendance $attendance) {

    }
    
    public function destroy(Attendance $attendance) {

    }
    
    // public function viewAttendance($id)
        // {
    //     $attendance = Schedules::with(['attendances.ownedBy' => function ($query) {
    //         $query->get();
    //     }])->with('instructor')->where('id', $id)->first();

    //     // dd($attendance);
    //     return view('features.attendance.ViewAttendance', [
    //         'attendance' => $attendance
    //     ]);
    // }

    // public function attended($id, $attendanceId)
    // {
    //     Reservation::where('id', $id)
    //         ->update([
    //             'attended' => '1'
    //         ]);

    //     return redirect('/attendance/' . $attendanceId);
    // }

    // public function userNotification($id)
    // {
    //     $reservations = Reservation::where('user_id', $id)->with("schedule")->get();
    //     $count = [];
    //     foreach ($reservations as $reservation) {
    //         array_push($count, $reservation->schedule->date_time_start);
    //     }
    //     return $count;
    // }
}
