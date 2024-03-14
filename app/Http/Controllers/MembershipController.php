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
        $users = User::search()->where('user_role', 3)->with(['subscriptions' => function($q) {
            $q->where('subscriptions.status', 2);
        }])->paginate(10);

        $subscriptions = SubscriptionType::all();
        return view('features.membership.Membership', compact('users', 'subscriptions'));
    }

    public function store(MembershipStoreRequest $request)
    {
        $subscriptionType = SubscriptionType::find($request->subscription_type_id);
        
        $subscription = Subscription::create([
            ...$request->validated(),
            'start_date' => now(),
            'end_date' => Carbon::parse(now())->addMonths($subscriptionType->number_of_months)
        ]);

        Payments::create([
            'subscription_id' => $subscription->id,
            'amount_paid' => $subscriptionType->price,
            'mode_of_payment' => $request->mode_of_payment,
            'reference_number' => $request->reference_number
        ]);

        //notif
        $adminUsers = User::where('user_role', 1)->get()->map(fn($val) => $val->id)->toArray();
        $subscribedUser = User::where('id', $request->user_id)->first();

        Notification::create([
            'content' => $subscribedUser->full_name . ' subscribed to ' . $subscriptionType->name . 'Membership for P' . $subscriptionType->price
        ])->users()->attach($adminUsers);

        return redirect()->route('membership.index')->with('toast', [
            'status' => 'success',
            'message' => 'User subscribed successfully.',
        ]);
    }

    public function cancelMembership($id) {
        Subscription::where('id', $id)->update([
            'status' => 3
        ]);

        return redirect()->back()->with('toast', [
            'status' => 'success',
            'message' => 'Membership cancelled.',
        ]);
    }
}