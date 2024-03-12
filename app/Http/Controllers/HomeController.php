<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\Membership;
use App\Models\Payments;
use App\Models\Schedules;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $today = Carbon::today();
        // $this_month = Carbon::now()->month;

        // $membership = Membership::where('user_id', Auth::user()->id)->first();
        // $users = DB::table('users')
        //     ->first();

        // $payment_price = DB::table('payments')
        //     ->whereDate('created_at', $today)
        //     ->sum('payment_price');


        // $payment = DB::table('payments')
        //     ->whereDate('created_at', $today)
        //     ->count('payment_price');

        // $payment_price_month = DB::table('payments')
        //     ->whereMonth('created_at', $this_month)
        //     ->sum('payment_price');


        // $payment_month  = DB::table('payments')
        //     ->whereMonth('created_at', $this_month)
        //     ->count('payment_price');
        

        //FOR CUSTOMER HOME
        $user = User::where('id', auth()->user()->id)->with(['subscriptions' => function($q) {
            $q->where('subscriptions.status', 2);
        }])->first();

        $recentPayments = Payments::whereHas('subscriptions.user', function($q) {
            $q->where('users.id', auth()->user()->id);
        })->with('subscriptions.user')->orderBy('payments.created_at', 'desc')->take(3)->get();

        $equipments = Equipment::all();

        $availableEquipments = $equipments->filter(fn($val) => $val->status == 'available');
        $notAvailableEquipments = $equipments->filter(fn($val) => $val->status == 'not_available');
        $underMaintenanceEquipments = $equipments->filter(fn($val) => $val->status == 'under_maintenance');

        $schedulesThisWeek = Schedules::with('instructor.user')->where('date_time_start', '>=', now()->startOfWeek())
        ->where('date_time_start', '<=', now()->endOfWeek())->take(3)->get();

        return view('home', compact('user', 'recentPayments', 'availableEquipments', 'notAvailableEquipments', 'underMaintenanceEquipments', 'schedulesThisWeek'));

        // return view('home', [
        //     // 'membership' => $membership,
        //     // 'users' => $users,
        //     // 'payment' => $payment,
        //     // 'payment_price' => $payment_price,
        //     // 'payment_month' => $payment_month,
        //     // 'payment_price_month' => $payment_price_month,

        // ]);
    }
}
