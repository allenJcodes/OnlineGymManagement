<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Membership\MembershipStoreRequest;
use App\Models\Membership;
use App\Models\Notification;
use App\Models\Payments;
use App\Models\Subscription;
use App\Models\SubscriptionType;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MembershipController extends Controller
{
    //
    public function index()
    {
        $users = User::where('user_role', 3)->with('subscription')->get();
        $subscriptions = SubscriptionType::all();
        return view('features.membership.Membership', compact('users', 'subscriptions'));
    }

    public function store(MembershipStoreRequest $request)
    {
        dd($request->post());
        $subscriptionType = SubscriptionType::find($request->subscription_type_id);

        Subscription::create([
            ...$request->validated(),
            'amount_paid' => $subscriptionType->price,
            'start_date' => now(),
            'end_date' => Carbon::parse(now())->addMonths($subscriptionType->number_of_months)
        ]);

        //notif
        
        $adminUsers = User::where('user_role', 1)->get()->map(fn($val) => $val->id)->toArray();
        
        $subscribedUser = User::where('id', $request->user_id)->first();

        Notification::create([
            'content' => $subscribedUser->full_name . ' subscribed to ' . $subscriptionType->name . 'Membership for P' . $subscriptionType->price
        ])->users()->attach($adminUsers);


        return redirect()->route('membership.index');
    }
}