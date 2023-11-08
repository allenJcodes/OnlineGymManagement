<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Schedules;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        return view('features.reservation.Reservation');
    }
    public function reserve(Request $request)
    {
        $exist = Reservation::where('user_id', $request->user_id)->where('schedule_id', $request->schedule_id)->count();
        if ($exist == 0) {
            $schedule = Schedules::where('id', $request->schedule_id)->first();
            if ((int)$schedule->number_of_attendees < (int)$schedule->max_clients) {
                Reservation::create([
                    'user_id' => $request->user_id,
                    'schedule_id' => $request->schedule_id
                ]);
                Schedules::where('id', $request->schedule_id)->update([
                    'number_of_attendees' => (int)$schedule->number_of_attendees + 1
                ]);
            }
            return 'created';
        } else {
            return 'false';
        }
    }
    public function userReservations(Request $request)
    {
        return Reservation::where('user_id', $request->id)->with('schedule')->with('ownedBy')->get();
    }
}
