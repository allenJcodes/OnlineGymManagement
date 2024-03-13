<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Schedules;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
    public function index()
    {
        // $allAttendances = Schedules::with(['attendances.ownedBy' => function ($query) {
        //     $query->get();
        // }])->with('instructor')->get();
        $allAttendances = Schedules::with('instructor')->get();
        return view('features.attendance.Attendance', compact('allAttendances'));
    }

    public function viewAttendance($id)
    {
        $attendance = Schedules::with(['attendances.ownedBy' => function ($query) {
            $query->get();
        }])->with('instructor')->where('id', $id)->first();

        // dd($attendance);
        return view('features.attendance.ViewAttendance', [
            'attendance' => $attendance
        ]);
    }

    // public function attended($id, $attendanceId)
    // {
    //     Reservation::where('id', $id)
    //         ->update([
    //             'attended' => '1'
    //         ]);

    //     return redirect('/attendance/' . $attendanceId);
    // }

    public function userNotification($id)
    {
        $reservations = Reservation::where('user_id', $id)->with("schedule")->get();
        $count = [];
        foreach ($reservations as $reservation) {
            array_push($count, $reservation->schedule->date_time_start);
        }
        return $count;
    }
}
