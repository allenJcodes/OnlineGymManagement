<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Membership\MembershipStoreRequest;
use App\Mail\SendQRMail;
use App\Models\Membership;
use App\Models\Notification;
use App\Models\PaymentMode;
use App\Models\Payments;
use App\Models\Subscription;
use App\Models\SubscriptionType;
use App\Models\User;
use App\Services\MembershipService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class MembershipController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Membership::class, 'membership');
    }

    public function index()
    {
        $users = User::search()->where('user_role', 3)->with('subscriptions')->paginate(10);

        $subscriptions = SubscriptionType::all();
        $paymentModes = PaymentMode::all();

        return view('features.membership.Membership', compact('users', 'subscriptions', 'paymentModes'));
    }

    public function store(MembershipStoreRequest $request, MembershipService $membershipService)
    {
        $user = User::find($request->user_id);
        $jsonRequest = json_encode([...$request->validated(), 'full_name' => $user->full_name]);
        $filePath = $membershipService->generateUserQR($jsonRequest, $user);

        $subscriptionType = SubscriptionType::find($request->subscription_type_id);
        
        if($subscriptionType->duration_type == 'day') {
            $endDate = Carbon::parse(now())->addDays($subscriptionType->duration);
        }else {
            $endDate = Carbon::parse(now())->addMonths($subscriptionType->duration);
        }

        $subscription = Subscription::create([
            ...$request->validated(),
            'start_date' => now(),
            'end_date' => $endDate,
            'qr_code' => $filePath,
        ]);

        Payments::create([
            'subscription_id' => $subscription->id,
            'amount_paid' => $subscriptionType->price,
            'mode_of_payment' => $request->mode_of_payment,
            'reference_number' => $request->reference_number,
            'status' => 'Paid'
        ]);

        //notif
        $adminUsers = User::where('user_role', 1)->get()->map(fn($val) => $val->id)->toArray();
        $subscribedUser = User::where('id', $request->user_id)->first();

        Notification::create([
            'content' => $subscribedUser->full_name . ' subscribed to ' . $subscriptionType->name . 'Membership for P' . $subscriptionType->price,
            'type' => 'New Subscription'
        ])->users()->attach($adminUsers);

        Mail::to($subscribedUser->email)->send(new SendQRMail($subscribedUser->full_name, $filePath));

        return redirect()->route('membership.index')->with('toast', [
            'status' => 'success',
            'message' => 'User subscribed successfully.',
        ]);
    }

    public function cancelMembership($id) {
        Subscription::where('id', $id)->update([
            'status' => 'Cancelled'
        ]);

        return redirect()->back()->with('toast', [
            'status' => 'success',
            'message' => 'Membership cancelled.',
        ]);
    }
}