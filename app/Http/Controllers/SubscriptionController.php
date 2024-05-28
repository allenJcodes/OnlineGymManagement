<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Payments;
use App\Models\Notification;
use App\Models\Subscription;
use App\Models\SubscriptionType;
use App\Http\Requests\Membership\MembershipStoreRequest;
use App\Models\PaymentMode;

class SubscriptionController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Subscription::class, 'subscription');    
    }

    public function index()
    {
        $subs = Subscription::search()->where('user_id', auth()->user()->id)->with('subscriptionTypes')->orderBy('subscriptions.created_at', 'desc')->paginate(10);
        $isActive = Subscription::where('user_id', auth()->user()->id)->where('status', 'Active')->orWhere('status', 'Pending')->count() > 0 ? true : false;
        $subscriptions = SubscriptionType::all();
        $paymentModes = PaymentMode::all();

        return view('features.subscriptions.Subscription', compact('subs', 'isActive', 'subscriptions', 'paymentModes'));
    }

    public function store(MembershipStoreRequest $request)
    {
        
        $checkReferenceNumber = Payments::where('reference_number', $request->reference_number)->first();

        if($checkReferenceNumber) {
            return back()->with('toast', [
                'status' => 'error',
                'message' => 'The reference number is already used.',
            ]);
        }

        $subscriptionType = SubscriptionType::find($request->subscription_type_id);
        
        $subscription = Subscription::create([
            ...$request->validated(),
            'status' => 'Pending'
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
            'content' => '(TO VERIFY) ' . auth()->user()->full_name . ' subscribed to ' . $subscriptionType->name . 'Membership for P' . $subscriptionType->price,
            'type' => 'Pending Subscription'
        ])->users()->attach($adminUsers);

        return redirect()->route('subscription.index')->with('toast', [
            'status' => 'success',
            'message' => 'Subscribed successfully.',
        ]);
    }
}
