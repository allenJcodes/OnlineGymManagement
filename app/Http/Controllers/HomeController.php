<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\Membership;
use App\Models\Payments;
use App\Models\Schedules;
use App\Models\Subscription;
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
        if (Auth::check()) {
            if (Auth::user()->user_role == '1') {
                return $this->adminIndex();
            } else if (Auth::user()->user_role == '2') {
                return $this->instructorIndex();
            } else {
                return $this->customerIndex();
            }
        }
    }

    private function customerIndex(){
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
    }

    private function instructorIndex(){}

    private function adminIndex()
    {
        $today = Carbon::today();
        $this_month = Carbon::now()->month;

        // Total Active Members
        $active_users = User::join('subscriptions', 'users.id', '=', 'subscriptions.user_id')
            ->where('subscriptions.status', 2)
            ->count();

        // Total Instructors
        $instructors = User::where('user_role', 2)->count();        

        // Total Today Sales
        $payment_price = DB::table('payments')
            ->whereDate('created_at', $today)
            ->sum('amount_paid');

        // Total Today Customers
        $payment = DB::table('payments')
            ->whereDate('created_at', $today)
            ->count('amount_paid');

        // Total Monthly Sales
        $payment_price_month = DB::table('payments')
            ->whereMonth('created_at', $this_month)
            ->sum('amount_paid');

        // Total Monthly Customers
        $payment_month  = DB::table('payments')
            ->whereMonth('created_at', $this_month)
            ->count('amount_paid');

        $recentPayments = Payments::with('subscriptions.user')->orderBy('payments.created_at', 'desc')->take(3)->get();

        $equipments = Equipment::all();
        $availableEquipments = $equipments->filter(fn($val) => $val->status == 'available');
        $notAvailableEquipments = $equipments->filter(fn($val) => $val->status == 'not_available');
        $underMaintenanceEquipments = $equipments->filter(fn($val) => $val->status == 'under_maintenance');


        return view('home-admin', compact(
            'active_users',
            'instructors',
            'payment',
            'payment_price',
            'payment_month',
            'payment_price_month',
            'recentPayments', 'availableEquipments', 'notAvailableEquipments', 'underMaintenanceEquipments',
        ));
    }
}
