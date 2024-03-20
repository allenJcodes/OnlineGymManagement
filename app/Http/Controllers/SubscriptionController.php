<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Payments;
use App\Models\Notification;
use App\Models\Subscription;
use App\Models\SubscriptionType;
use App\Http\Requests\Membership\MembershipStoreRequest;

class SubscriptionController extends Controller
{
    public function index()
    {
        $subs = Subscription::search()->where('user_id', auth()->user()->id)->with('subscriptionTypes')->paginate(10);
        $isActive = Subscription::where('user_id', auth()->user()->id)->where('status', 2)->orWhere('status', 1)->count() > 0 ? true : false;
        $subscriptions = SubscriptionType::all();


        return view('features.subscriptions.Subscription', compact('subs', 'isActive', 'subscriptions'));
    }

    public function store(MembershipStoreRequest $request)
    {
        $subscriptionType = SubscriptionType::find($request->subscription_type_id);
        
        $subscription = Subscription::create([
            ...$request->validated(),
            'status' => 1
        ]);

        Payments::create([
            'subscription_id' => $subscription->id,
            'amount_paid' => $subscriptionType->price,
            'mode_of_payment' => $request->mode_of_payment,
            'reference_number' => $request->reference_number,
            'status' => 'Verifying'
        ]);

        //notif
        $adminUsers = User::where('user_role', 1)->get()->map(fn($val) => $val->id)->toArray();

        Notification::create([
            'content' => '(TO VERIFY)' . auth()->user()->full_name . ' subscribed to ' . $subscriptionType->name . 'Membership for P' . $subscriptionType->price
        ])->users()->attach($adminUsers);

        return redirect()->route('subscription.index')->with('toast', [
            'status' => 'success',
            'message' => 'Subscribed successfully.',
        ]);
    }
}
