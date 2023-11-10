<?php

namespace App\Http\Controllers;

use App\Models\Membership;
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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $today = Carbon::today();
        $this_month = Carbon::now()->month;

        $membership = Membership::where('user_id', Auth::user()->id)->first();
        $users = DB::table('users')
            ->first();

        $payment_price = DB::table('payments')
            ->whereDate('created_at', $today)
            ->sum('payment_price');


        $payment = DB::table('payments')
            ->whereDate('created_at', $today)
            ->count('payment_price');

        $payment_price_month = DB::table('payments')
            ->whereMonth('created_at', $this_month)
            ->sum('payment_price');


        $payment_month  = DB::table('payments')
            ->whereMonth('created_at', $this_month)
            ->count('payment_price');

        return view('home', [
            'membership' => $membership,
            'users' => $users,
            'payment' => $payment,
            'payment_price' => $payment_price,
            'payment_month' => $payment_month,
            'payment_price_month' => $payment_price_month,

        ]);
    }
}
